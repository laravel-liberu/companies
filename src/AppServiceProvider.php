<?php

namespace LaravelLiberu\Companies;

use Illuminate\Support\ServiceProvider;
use LaravelLiberu\Companies\Models\Company;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->load()
            ->publish()
            ->mapMorphs();
    }

    private function load()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        return $this;
    }

    private function publish()
    {
        $this->publishes([
            __DIR__.'/../database/factories' => database_path('factories'),
        ], ['companies-factory', 'liberu-factories']);

        $this->publishes([
            __DIR__.'/../database/seeders' => database_path('seeders'),
        ], ['companies-seeder', 'liberu-seeders']);

        return $this;
    }

    private function mapMorphs()
    {
        Company::morphMap();
    }
}
