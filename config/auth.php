<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    |   This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.

        Opsi ini mengontrol "penjaga" otentikasi default dan kata sandi
    | mengatur ulang opsi untuk aplikasi Anda. Anda dapat mengubah default ini
    | sesuai kebutuhan, tetapi ini adalah awal yang sempurna untuk sebagian besar aplikasi.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session"
    |
        Selanjutnya, Anda dapat menentukan setiap penjaga autentikasi untuk aplikasi Anda.
    | Tentu saja, konfigurasi default yang bagus telah ditentukan untuk Anda
    | di sini yang menggunakan penyimpanan sesi dan penyedia pengguna Eloquent.
    |
    | Semua driver autentikasi memiliki penyedia pengguna. Ini mendefinisikan bagaimana
    | pengguna sebenarnya diambil dari database Anda atau penyimpanan lain
    | mekanisme yang digunakan oleh aplikasi ini untuk mempertahankan data pengguna Anda.
    |
    | Didukung: "sesi"
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    |   All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    |   Semua driver autentikasi memiliki penyedia pengguna. Ini mendefinisikan bagaimana
    | pengguna sebenarnya diambil dari database Anda atau penyimpanan lain
    | mekanisme yang digunakan oleh aplikasi ini untuk mempertahankan data pengguna Anda.
    |
    | Jika Anda memiliki banyak tabel atau model pengguna, Anda dapat mengonfigurasi banyak
    | sumber yang mewakili masing-masing model/tabel. Sumber-sumber ini mungkin kemudian
    | ditugaskan ke penjaga autentikasi tambahan yang telah Anda tetapkan.
    |
    | Didukung: "database", "fasih"
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expiry time is the number of minutes that each reset token will be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    | The throttle setting is the number of seconds a user must wait before
    | generating more password reset tokens. This prevents the user from
    | quickly generating a very large amount of password reset tokens.
    |
    | Anda dapat menentukan beberapa konfigurasi pengaturan ulang kata sandi jika Anda memiliki lebih banyak
    | dari satu tabel atau model pengguna dalam aplikasi dan Anda ingin memilikinya
    | pisahkan pengaturan pengaturan ulang kata sandi berdasarkan jenis pengguna tertentu.
    |
    | Waktu kedaluwarsa adalah jumlah menit setiap token reset
    | dianggap sah. Fitur keamanan ini membuat token berumur pendek
    | mereka memiliki lebih sedikit waktu untuk ditebak. Anda dapat mengubah ini sesuai kebutuhan.
    |
    | Pengaturan throttle adalah jumlah detik yang harus ditunggu pengguna sebelumnya
    | menghasilkan lebih banyak token pengaturan ulang kata sandi. Ini mencegah pengguna dari
    | dengan cepat menghasilkan token pengaturan ulang kata sandi dalam jumlah yang sangat besar.
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    | Di sini Anda dapat menentukan jumlah detik sebelum konfirmasi kata sandi
    | waktu habis dan pengguna diminta untuk memasukkan kembali kata sandi mereka melalui
    | layar konfirmasi. Secara default, batas waktu berlangsung selama tiga jam.
    */

    'password_timeout' => 10800,

];
