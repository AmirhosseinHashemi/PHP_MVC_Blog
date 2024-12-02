<?php

require_once "../vendor/autoload.php";

use app\Router;
use app\Database;
use app\controllers\BlogsController;

$db = new Database();
$router = new Router($db);


$router->get("/", [BlogsController::class, "index"]);


$router->resolve();
