<?php

namespace app\controllers;

use app\Router;
use app\models\Blog;

class BlogsController
{
    public static function index(Router $router)
    {
        $blogs = $router->db->get_blogs();
        $router->render_views('blogs/blogs', [
            'blogs' => $blogs,
            "route" => "/"
        ]);
    }

    public static function create(Router $router)
    {
        $blog_data = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $blog_data["title"] = $_POST["title"];
            $blog_data["text"] = $_POST["text"];
            $blog_data["category"] = $_POST["category"];
            $blog_data["image_file"] = $_FILES["image"];

            $blog = new Blog();
            $blog->load($blog_data);
            $blog->save();

            header("location: /blogs");
            exit;
        }

        $router->render_views('blogs/create', [
            "route" => "/blogs/create"
        ]);
    }
}
