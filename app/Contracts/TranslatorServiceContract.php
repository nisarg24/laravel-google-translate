<?php

namespace App\Contracts;

interface TranslatorServiceContract
{
    public function translate($text, $language);
}