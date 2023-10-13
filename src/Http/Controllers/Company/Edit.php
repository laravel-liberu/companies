<?php

namespace LaravelLiberu\Companies\Http\Controllers\Company;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelLiberu\Companies\Forms\Builders\Company as Form;
use LaravelLiberu\Companies\Models\Company;

class Edit extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Company $company, Form $form)
    {
        $this->authorize('update', $company);

        return ['form' => $form->edit($company)];
    }
}
