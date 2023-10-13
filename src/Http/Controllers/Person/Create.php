<?php

namespace LaravelLiberu\Companies\Http\Controllers\Person;

use Illuminate\Routing\Controller;
use LaravelLiberu\Companies\Forms\Builders\Person;
use LaravelLiberu\Companies\Models\Company;

class Create extends Controller
{
    public function __invoke(Company $company, Person $form)
    {
        return ['form' => $form->create($company)];
    }
}
