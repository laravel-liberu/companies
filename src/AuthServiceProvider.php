<?php

namespace LaravelLiberu\Companies;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use LaravelLiberu\Companies\Models\Company;
use LaravelLiberu\Companies\Policies\Company as Policy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Company::class => Policy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
