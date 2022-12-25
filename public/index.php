<?php

use Dotenv\Dotenv;
use Sectheater\Application;
use Sectheater\http\Request;
use Sectheater\http\Response;
use Sectheater\http\Router;
use Sectheater\support\Arr;
use Sectheater\support\Config;
use Sectheater\support\Hash;

require_once __DIR__ . "/../src/support/helpers.php";
require_once base_path() . "/vendor/autoload.php";
require_once base_path() . "/routes/web.php";

$env = Dotenv::createImmutable(base_path());
$env->load();

app()->run();


