<?php

Route::group([
    'middleware' => \Config::get('translation_manager.ab_translation_manager_route_middleware', ['web', 'auth']),
    'prefix' => \Config::get('translation_manager.ab_translation_manager_route_prefix', 'admin/translator')
], function () {

    $controller = \Config::get('translation_manager.ab_translation_manager_controller', 'AB\Laravel\TranslationManager\Controllers\DefaultController');
    
    Route::get('/', $controller . '@dashboard')->name('translator_dashboard');
    Route::get('/language/{language}', $controller . '@language')->name('translator_language');
    Route::post('/language/{language}/edit', $controller . '@languageEdit')->name('translator_language_edit');
});