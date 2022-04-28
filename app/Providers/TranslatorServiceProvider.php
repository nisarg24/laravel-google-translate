<?php

namespace App\Providers;

use App\Contracts\TranslatorServiceContract;
use App\Services\GoogleTranslatorService;
use Illuminate\Support\ServiceProvider;

class TranslatorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TranslatorServiceContract::class, function($app) {
            return $this->app->make(config('translator.service_class'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
