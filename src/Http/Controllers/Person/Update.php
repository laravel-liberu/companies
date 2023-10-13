<?php

namespace LaravelLiberu\Companies\Http\Controllers\Person;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelLiberu\Companies\Http\Requests\ValidatePersonUpdate;
use LaravelLiberu\Companies\Models\Company;
use LaravelLiberu\People\Models\Person;

class Update extends Controller
{
    use AuthorizesRequests;

    public function __invoke(ValidatePersonUpdate $request, Person $person)
    {
        $company = Company::find($request->get('company_id'));

        $this->authorize('manage-people', $company);

        $person->companies()->updateExistingPivot(
            $company->id,
            $request->only('position')
        );

        return ['message' => __('The person has been successfully updated')];
    }
}
