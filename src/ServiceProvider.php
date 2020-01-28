<?php

namespace AB\Laravel\TranslationManager;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;


/**
 * @author Slave of God <iamtheslaveofgod@gmail.com>
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
        // Views
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'abtmViews');
        
        // Routes
        $this->loadRoutesFrom(__DIR__.'/Resources/routes/web.php');
        
        // Public Assets
        // php artisan vendor:publish --tag=abtmPublishes --force
        $this->publishes([
            __DIR__.'/Resources/public' => public_path('vendor/abtm'),
            __DIR__.'/Resources/config/translation_manager.php' => config_path('translation_manager.php'),
        ], 'abtmPublishes');
        
        // Translations
        $this->loadTranslationsFrom(__DIR__.'/Resources/lang', 'abtmLang');
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