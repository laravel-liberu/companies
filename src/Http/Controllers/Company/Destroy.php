<?php

namespace LaravelLiberu\Companies\Http\Controllers\Company;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelLiberu\Companies\Models\Company;

class Destroy extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Company $company)
    {
        $this->authorize('destroy', $company);

        $company->delete();

        return [
            'message' => __('The company was successfully deleted'),
            'redirect' => 'administration.companies.index',
        ];
    }
}
