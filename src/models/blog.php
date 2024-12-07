<?php

namespace app\models;

use app\Database;
use app\helper\Utils;

class Blog
{
    public ?int $id = null;
    public string $title;
    public string $text;
    public string $category_id;
    public array $image_file;
    public ?string $image_path = null;

    public function load($data)
    {
        $this->title = $data["title"];
        $this->text = $data["text"];
        $this->category_id = $data["category_id"];
        $this->image_file = $data["image_file"];
        $this->image_path = $data["image_path"] ?? null;
    }

    public function save()
    {
        $error = [];

        if (!is_dir(__DIR__ . "/../../public/images")) {
            mkdir(__DIR__ . "/../../public/images");
        }

        if (!$this->title) {
            $error["title"] = "یک عنوان برای مقاله انتخاب کنید.";
        }

        if (!$this->text) {
            $error["text"] = "متنی برای مقاله وارد کنید.";
        }

        if (!$this->category_id) {
            $error["category_id"] = "دسته بندی مقاله را انتخاب کنید.";
        }

        if (empty($error)) {
            if ($this->image_file && $this->image_file['tmp_name']) {
                if ($this->image_path) {
                    unlink(__DIR__ . '/../../public/' . $this->image_path);
                }
                $this->image_path = 'images/' . Utils::randomString(8) . '/' . $this->image_file['name'];
                mkdir(dirname(__DIR__ . '/../../public/' . $this->image_path));
                move_uploaded_file($this->image_file['tmp_name'], __DIR__ . '/../../public/' . $this->image_path);
            }
        }

        $db = Database::$db;
        if (!$this->id) $db->create_blog($this);
        else $db->update_blog($this);
    }
}
