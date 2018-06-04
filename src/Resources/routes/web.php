<?php

Route::group([
    'middleware' => \Config::get('translation_manager.ab_translation_manager_route_middleware', ['web', 'auth']),
    'prefix' => \Config::get('translation_manager.ab_translation_manager_route_prefix', 'admin/translator')
], function () {

    $controller = \Config::get('translation_manager.ab_translation_manager_controller', 'AB\Laravel\TranslationManager\Controllers\DefaultController');
    
    Route::get('/', $controller . '@index')->name('translator_index');
    Route::get('/language/{language}', $controller . '@language')->name('translator_language');
    Route::post('/language/{language}/edit', $controller . '@edit')->name('translator_edit');
});