<?php

namespace LaravelLiberu\Companies\Http\Controllers\Company;

use Illuminate\Routing\Controller;
use LaravelLiberu\Companies\Forms\Builders\Company;

class Create extends Controller
{
    public function __invoke(Company $form)
    {
        return ['form' => $form->create()];
    }
}
