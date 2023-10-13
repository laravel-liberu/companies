<?php

namespace LaravelLiberu\Companies\Http\Controllers\Person;

use Illuminate\Routing\Controller;
use LaravelLiberu\Companies\Http\Resources\Person as Resource;
use LaravelLiberu\Companies\Models\Company;

class Index extends Controller
{
    public function __invoke(Company $company)
    {
        return Resource::collection($company->people);
    }
}
