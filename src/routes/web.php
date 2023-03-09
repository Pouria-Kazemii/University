<?php

use Src\Http\Controllers\StudentsController;
use Src\Core\Router\Router;

Router::get('/students', [StudentsController::class, 'index']);
Router::get('/students/create', [StudentsController::class, 'create']);
Router::post('/students', [StudentsController::class, 'store']);