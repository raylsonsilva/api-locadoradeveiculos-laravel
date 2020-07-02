<?php

namespace BitzenTecnologia\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        // 'BitzenTecnologia\Model' => 'BitzenTecnologia\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
    }
}
