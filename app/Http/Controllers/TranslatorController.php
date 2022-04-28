<?php

namespace App\Http\Controllers;

use App\Contracts\TranslatorServiceContract;
use App\Http\Requests\TranslatorFormRequest;
use Illuminate\Support\Facades\Log;
use ErrorException;

class TranslatorController extends Controller
{    
    /**
     * __construct
     *
     * @param  mixed $translator
     * @return void
     */
    public function __construct(TranslatorServiceContract $translator)
    {
        $this->translator = $translator;
    }    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        try {
            return view('welcome');
        } catch(\Exception $e) {
            Log::info('Something wrong!', ['message' => $e]);
        }
    }
    
    /**
     * translate
     *
     * @param  mixed $request
     * @return void
     */
    public function translate(TranslatorFormRequest $request)
    {
        try {
            $data = $this->translator->translate($request->text, $request->toLang);
            if(!is_array($data)) {
                throw new ErrorException($data);
            }
            return response()->json([
                'success' => true,
                'error' => null,
                'translation' => $data['data']['translations'][0]['translatedText']
            ]);
        } catch(\Exception $e) {
            Log::info('Something wrong!', ['message' => $e]);
        }
    }
}
