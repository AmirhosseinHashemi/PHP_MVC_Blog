<?php

require_once "../vendor/autoload.php";

use app\Router;
use app\Database;
use app\controllers\ProductsController;

$db = new Database();
$router = new Router($db);


$router->get("/", [ProductsController::class, "index"]);


$router->resolve();
