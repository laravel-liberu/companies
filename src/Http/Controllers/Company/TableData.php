<?php

namespace LaravelLiberu\Companies\Http\Controllers\Company;

use Illuminate\Routing\Controller;
use LaravelLiberu\Companies\Tables\Builders\Company;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = Company::class;
}
