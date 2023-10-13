<?php

namespace LaravelLiberu\Companies\Exceptions;

use LaravelLiberu\Helpers\Exceptions\EnsoException;

class Company extends EnsoException
{
    public static function dissociateMandatary()
    {
        return new static(__(
            'You cannot dissociate the mandatary unless is the only one attached on this company'
        ));
    }
}
