<?php

use Dotenv\Dotenv;
use Sectheater\Application;
use Sectheater\http\Request;
use Sectheater\http\Response;
use Sectheater\http\Router;
use Sectheater\support\Arr;

require_once __DIR__ . "/../src/support/helpers.php";
require_once base_path() . "/vendor/autoload.php";
require_once base_path() . "/routes/web.php";

$env = Dotenv::createImmutable(base_path());
$env->load();

app()->run();

//var_dump(Arr::only(['username' => 'mohamed', 'email' => 'mohamed'], ['email', 'username']));
//var_dump(Arr::has(['db' => ['connection' => ['default' => 'nosql']]], 'db.connection.default'));
/*var_dump(Arr::last(["one", "two", "three"], function ($item) {
    return (strlen($item) > 3);
}));*/

