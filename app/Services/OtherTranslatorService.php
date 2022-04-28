<?php

namespace App\Services;

use App\Contracts\TranslatorServiceContract;

class OtherTranslatorService implements TranslatorServiceContract
{
    /**
     * translate
     *
     * @param  mixed $text
     * @param  mixed $language
     * @return void
     */
    public function translate($text, $language)
    {
        return "TO DO";
    }
}