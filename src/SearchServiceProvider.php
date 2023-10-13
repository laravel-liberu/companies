<?php

namespace LaravelLiberu\Companies;

use LaravelLiberu\Companies\Models\Company;
use LaravelLiberu\Searchable\SearchServiceProvider as ServiceProvider;

class SearchServiceProvider extends ServiceProvider
{
    public $register = [
        Company::class => [
            'group' => 'Company',
            'attributes' => ['name'],
            'label' => 'name',
            'permissionGroup' => 'administration.companies',
        ],
    ];
}
