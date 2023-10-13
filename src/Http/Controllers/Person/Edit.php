<?php

namespace LaravelLiberu\Companies\Http\Controllers\Person;

use Illuminate\Routing\Controller;
use LaravelLiberu\Companies\Forms\Builders\Person as Form;
use LaravelLiberu\Companies\Models\Company;
use LaravelLiberu\People\Models\Person;

class Edit extends Controller
{
    public function __invoke(Company $company, Person $person, Form $form)
    {
        return ['form' => $form->company($company)->edit($person)];
    }
}
