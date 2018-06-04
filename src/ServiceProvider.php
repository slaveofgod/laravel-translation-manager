<?php

namespace AB\Laravel\TranslationManager;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;



/**
 * @author Alexey Bob <alexey.bob@gmail.com>
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        foreach(glob(app_path('Helpers/').'*.php') as $filename){
            require_once($filename);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}