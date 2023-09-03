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

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [
        'admin_foto' => [
            'driver' => 'local',
            'root' => storage_path('app/public/admin/foto'),
            'url' => env('APP_URL') . '/storage/admin/foto',
            'visibility' => 'public',
        ],
        'admin_foto_ktp' => [
            'driver' => 'local',
            'root' => storage_path('app/public/admin/foto_ktp'),
            'url' => env('APP_URL') . '/storage/admin/foto_ktp',
            'visibility' => 'public',
        ],
        'peserta_foto' => [
            'driver' => 'local',
            'root' => storage_path('app/public/peserta/foto'),
            'url' => env('APP_URL') . '/storage/peserta/foto',
            'visibility' => 'public',
        ],
        'peserta_foto_ktp' => [
            'driver' => 'local',
            'root' => storage_path('app/public/peserta/foto_ktp'),
            'url' => env('APP_URL') . '/storage/peserta/foto_ktp',
            'visibility' => 'public',
        ],
        'karyawan_foto' => [
            'driver' => 'local',
            'root' => storage_path('app/public/karyawan/foto'),
            'url' => env('APP_URL') . '/storage/karyawan/foto',
            'visibility' => 'public',
        ],
        'karyawan_fotoKTP' => [
            'driver' => 'local',
            'root' => storage_path('app/public/karyawan/fotoKTP'),
            'url' => env('APP_URL') . '/storage/karyawan/fotoKTP',
            'visibility' => 'public',
        ],
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
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
