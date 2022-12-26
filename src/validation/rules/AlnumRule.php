<?php

namespace Sectheater\validation\rules;

use Sectheater\validation\rules\contract\Rule;

class AlnumRule implements Rule
{

    public function apply($field, $value, $data)
    {
        return preg_match('/^[a-zA-Z0-9]+/', $value);
    }

    public function __toString(): string
    {
        return "%s must be characters and numbers only";
    }
}