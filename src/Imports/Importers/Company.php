<?php

namespace LaravelLiberu\Companies\Imports\Importers;

use LaravelLiberu\Companies\Models\Company as Model;
use LaravelLiberu\DataImport\Contracts\Importable;
use LaravelLiberu\DataImport\Models\Import;
use LaravelLiberu\Helpers\Services\Obj;

class Company implements Importable
{
    public function run(Obj $row, Import $import)
    {
        $this->import($row);
    }

    private function import($row)
    {
        (Model::class)::factory()->create($row->toArray());
    }
}
