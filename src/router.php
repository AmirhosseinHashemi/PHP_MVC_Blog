<?php

namespace app;

class Router

{
    public array $get_routes = [];
    public array $post_routes = [];
    public ?Database $db = null;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function get($path, $callback)
    {
        $this->get_routes[$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->post_routes[$path] = $callback;
    }

    public function resolve()
    {
        $method = strtolower($_SERVER["REQUEST_METHOD"]);
        $path = $_SERVER["PATH_INFO"] ?? '/';

        if ($method === 'get') {
            $fn = $this->get_routes[$path] ?? null;
        }

        if ($method === 'post') {
            $fn = $this->post_routes[$path] ?? null;
        }

        if (!$fn) {
            exit("404 - Page Not Found - :(");
        }

        call_user_func($fn, $this);
    }
}
