<?php

return [

    // ...

    /*
    |--------------------------------------------------------------------------
    | Fortify Configuration
    |--------------------------------------------------------------------------
    |
    | This option allows you to specify the Fortify configuration to use for
    | your package. By default, the configuration will be loaded from the
    | config/fortify.php file in your application. If you want to override
    | any of the default configuration options, you can do so here.
    |
    */

    'fortify' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    // ...

];
