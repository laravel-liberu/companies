<?php

namespace LaravelEnso\Companies\App\Http\Controllers\Person;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelEnso\Companies\App\Http\Requests\ValidatePersonStore;
use LaravelEnso\Companies\App\Models\Company;

class Store extends Controller
{
    use AuthorizesRequests;

    public function __invoke(ValidatePersonStore $request)
    {
        $company = Company::find($request->get('company_id'));
        $personId = $request->get('id');

        $this->authorize('manage-people', $company);

        $company->attachPerson($personId, $request->get('position'));

        return ['message' => __('The person was successfully assigned')];
    }
}
