<?php

use System\Router;

use App\Controllers\HomeController;

$router = new Router();

$router->get("/change-photo", [HomeController::class, 'change_photo']);

$router->any([HomeController::class, 'index']);

$router->run();
