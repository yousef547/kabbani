<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'mainCategories'=> [
            'driver' => 'local',
            'root' => base_path() . '/assets/images/mainCategories/',
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],

        'categories'=> [
            'driver' => 'local',
            'root' => base_path() . '/assets/images/categories/',
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],

        'subCategories'=> [
            'driver' => 'local',
            'root' => base_path() . '/assets/images/subCategories/',
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],

        'subSubCategories'=> [
            'driver' => 'local',
            'root' => base_path() . '/assets/images/subSubCategories/',
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],

        'products'=> [
            'driver' => 'local',
            'root' => base_path() . '/assets/images/products/',
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],

        'sellers'=> [
            'driver' => 'local',
            'root' => base_path() . '/assets/images/sellers/',
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],

        'slider'=> [
            'driver' => 'local',
            'root' => base_path() . '/assets/images/slider/',
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],

        'variants'=> [
            'driver' => 'local',
            'root' => base_path() . '/assets/images/variants/',
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],
        

        'chats'=> [
            'driver' => 'local',
            'root' => base_path() . '/assets/images/chats/',
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],

        'notifications'=> [
            'driver' => 'local',
            'root' => base_path() . '/assets/images/notifications/',
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],
        
        'deals'=> [
            'driver' => 'local',
            'root' => base_path() . '/assets/images/deals/',
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],
        
        'categoryImages'=> [
            'driver' => 'local',
            'root' => base_path() . '/assets/images/categoryImages/',
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],        
        
        'splashScreen'=> [
            'driver' => 'local',
            'root' => base_path() . '/assets/images/splashScreen/',
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],
        
        'installments'=> [
            'driver' => 'local',
            'root' => base_path() . '/assets/images/installments/',
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],      
        
        'PromoCategories'=> [
            'driver' => 'local',
            'root' => base_path() . '/assets/images/PromoCategories/',
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ], 
        
        'popup'=> [
            'driver' => 'local',
            'root' => base_path() . '/assets/images/popup/',
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],   
        
        
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
