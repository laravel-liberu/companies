<?php

namespace LaravelLiberu\Companies;

use LaravelLiberu\Companies\Enums\Statuses;
use LaravelLiberu\Enums\EnumServiceProvider as ServiceProvider;

class EnumServiceProvider extends ServiceProvider
{
    public $register = [
        'companyStatuses' => Statuses::class,
    ];
}
