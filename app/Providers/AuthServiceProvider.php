<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\DataUsers;
use App\Models\Peserta;
use App\Policies\PesertaPolicy;
use App\Policies\updatedPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Peserta::class => updatedPolicy::class,
        DataUsers::class => updatedPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
