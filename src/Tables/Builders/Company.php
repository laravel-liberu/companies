<?php

namespace LaravelLiberu\Companies\Tables\Builders;

use Illuminate\Database\Eloquent\Builder;
use LaravelLiberu\Companies\Models\Company as Model;
use LaravelLiberu\Tables\Contracts\Table;

class Company implements Table
{
    private const TemplatePath = __DIR__.'/../Templates/companies.json';

    public function query(): Builder
    {
        return Model::selectRaw('
            companies.id, companies.name,  companies.fiscal_code,  people.name as mandatary,
            companies.email, companies.website, companies.bank,  companies.pays_vat, 
            companies.phone, companies.status, companies.is_tenant, companies.created_at
        ')->leftJoin('company_person', fn ($join) => $join
            ->on('companies.id', '=', 'company_person.company_id')
            ->where('company_person.is_mandatary', true))
            ->leftJoin('people', 'company_person.person_id', '=', 'people.id');
    }

    public function templatePath(): string
    {
        return self::TemplatePath;
    }
}
