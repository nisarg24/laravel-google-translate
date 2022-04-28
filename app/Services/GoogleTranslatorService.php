<?php

namespace App\Services;

use App\Contracts\TranslatorServiceContract;

class GoogleTranslatorService implements TranslatorServiceContract
{
    const BASE_URL = "https://google-translate1.p.rapidapi.com/";
    const RAPID_HOST = "google-translate1.p.rapidapi.com";
    const RAPID_KEY = "2a86a9c54dmshf9eceebf0639fedp1fd03djsn0b8f20578beb";

    /**
     * translate
     *
     * @param  mixed $text
     * @param  mixed $language
     * @return void
     */
    public function translate($text, $language)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => self::BASE_URL."language/translate/v2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "q=".$text."&target=".$language."&source=en",
            CURLOPT_HTTPHEADER => [
                "Accept-Encoding: application/gzip",
                "X-RapidAPI-Host: ". self::RAPID_HOST,
                "X-RapidAPI-Key: ". self::RAPID_KEY,
                "content-type: application/x-www-form-urlencoded"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "Error:" . $err;
        } else {
            return json_decode($response, true);
        }
    }
}