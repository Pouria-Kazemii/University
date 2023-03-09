<?php

use Src\Boot\Kernel;
use Src\Core\Providers\RequestServiceProvider;
use Src\Core\Providers\RouteServiceProvider;
use Src\Core\Providers\ValidationRuleServiceProvider;
use Src\Core\Router\Router;

require_once __DIR__ . '/vendor/autoload.php';

Kernel::boot();


Router::find($_SERVER['PATH_INFO'], $_SERVER['REQUEST_METHOD']);