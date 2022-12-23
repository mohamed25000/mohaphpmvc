<?php

namespace Sectheater\http;

class Request
{
    public function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function path(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        return str_contains($path,'?') ? explode('?', $path)[0] : $path;
    }
}