<?php

namespace LaravelLiberu\Companies\Http\Resources;

use LaravelLiberu\People\Http\Resources\Person as Resource;

class Person extends Resource
{
    public function toArray($request)
    {
        return parent::toArray($request) + [
            'position' => $this->pivot->position,
            'createdAt' => $this->created_at->toDatetimeString(),
        ];
    }
}
