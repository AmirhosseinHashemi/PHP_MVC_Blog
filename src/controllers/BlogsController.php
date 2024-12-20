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

    public static function blog(Router $router)
    {
        $id = $_GET["id"];
        $blog = $router->db->get_blog_by_id($id);

        $router->render_views('blogs/blog', [
            'blog' => $blog[0],
            "route" => "/blog"
        ]);
    }

    public static function create(Router $router)
    {
        $blog_data = [];
        $categories = $router->db->get_categories();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $blog_data["title"] = $_POST["title"];
            $blog_data["text"] = $_POST["text"];
            $blog_data["category_id"] = $_POST["category"];
            $blog_data["image_file"] = $_FILES["image"];

            $blog = new Blog();
            $blog->load($blog_data);
            $blog->save();

            header("location: /blogs");
            exit;
        }

        $router->render_views('blogs/create', [
            "categories" => $categories,
            "route" => "/blogs/create"
        ]);
    }
}
