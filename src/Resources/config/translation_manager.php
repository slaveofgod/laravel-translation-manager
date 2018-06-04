<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Translation manager route middleware
    |--------------------------------------------------------------------------
    */

    'ab_translation_manager_route_middleware' => ['web', 'auth'],
    
    /*
    |--------------------------------------------------------------------------
    | Translation manager route prefix
    |--------------------------------------------------------------------------
    */

    'ab_translation_manager_route_prefix' => 'admin/translator',
    
    /*
    |--------------------------------------------------------------------------
    | Translation manager controller
    |--------------------------------------------------------------------------
    */

    'ab_translation_manager_controller' => 'AB\Laravel\TranslationManager\Controllers\DefaultController',
];