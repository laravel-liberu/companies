<?php

namespace LaravelLiberu\Companies\Http\Controllers\Company;

use Illuminate\Routing\Controller;
use LaravelLiberu\Companies\Tables\Builders\Company;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = Company::class;
}
