<?php

namespace LaravelLiberu\Companies\Database\Seeders;

use LaravelLiberu\DataImport\Services\ExcelSeeder;

class CompanyExcelSeeder extends ExcelSeeder
{
    protected string $type = 'companies';
    protected string $filename = 'companies.xlsx';
}
