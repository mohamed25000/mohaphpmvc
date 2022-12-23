<?php

use App\controllers\HomeController;
use Sectheater\http\Router;

Router::get("/",[HomeController::class, 'home']);