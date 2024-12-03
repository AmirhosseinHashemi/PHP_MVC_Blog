<?php

namespace app\controllers;

use app\Router;

class BlogsController
{
    public static function index(Router $router)
    {
        $blogs = $router->db->get_blogs();
        $router->render_views('blogs/blogs', [
            'blogs' => $blogs,
            "title" => "بلاگ ها"
        ]);
    }
}
