<?php

require_once "../vendor/autoload.php";

use app\Router;
use app\Database;
use app\controllers\BlogsController;

$db = new Database();
$router = new Router($db);


$router->get("/", [BlogsController::class, "index"]);
$router->get("/blogs", [BlogsController::class, "index"]);

$router->get("/blogs/create", [BlogsController::class, "create"]);
$router->post("/blogs/create", [BlogsController::class, "create"]);

$router->get("/blogs/update", [BlogsController::class, "update"]);
$router->post("/blogs/update", [BlogsController::class, "update"]);

$router->post("/blogs/delete", [BlogsController::class, "delete"]);

$router->resolve();
