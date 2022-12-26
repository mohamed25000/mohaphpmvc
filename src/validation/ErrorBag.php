<?php

namespace Sectheater\validation;

class ErrorBag
{
    protected array $errors = [];

    public function add($field, $message)
    {
        $this->errors[$field][] = $message;
    }

    public function __get(string $key)
    {
        if(property_exists($this, $key)) {
            return $this->$key;
        }
    }


}