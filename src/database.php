<?php

namespace app;

use app\models\Blog;
use PDO;

class Database
{
    public ?PDO $pdo = null;
    public static ?Database $db = null;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=cms', 'cms_admin', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$db = $this;
    }

    // blogs table
    public function get_blogs()
    {
        $query = $this->pdo->prepare("SELECT article.*, categories.category_name
                                         FROM article
                                         JOIN categories ON article.category_id = categories.id");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_blog_by_id($id)
    {
        $query = $this->pdo->prepare("SELECT article.*, categories.category_name, users.first_name, users.last_name
                                         FROM article
                                         JOIN categories ON article.category_id = categories.id
                                         JOIN users ON article.user_id = users.id WHERE article.id=:id");
        $query->bindValue(":id", $id);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create_blog(Blog $blog)
    {
        $query = $this->pdo->prepare("INSERT INTO article
                                    (title, user_id, text, category_id, image_path)
                                    VALUES 
                                    (:title, :user_id, :text, :category_id, :image_path)");
        $query->bindValue(":title", $blog->title);
        $query->bindValue(":user_id", 1);
        $query->bindValue(":text", $blog->text);
        $query->bindValue(":category_id", $blog->category_id);
        $query->bindValue(":image_path", $blog->image_path);

        $query->execute();
    }

    public function update_blog(Blog $blog)
    {
        $query = $this->pdo->prepare("UPDATE article SET
                                         title=:title, text=:text, category_id=:category_id,
                                         image_path=:image_path WHERE id=:id");
        $query->bindValue(":title", $blog->title);
        $query->bindValue(":text", $blog->text);
        $query->bindValue(":category_id", $blog->category_id);
        $query->bindValue(":image_path", $blog->image_path);
        $query->bindValue(":id", $blog->id);

        $query->execute();
    }

    public function delete_blog(Blog $blog)
    {
        $query = $this->pdo->prepare("DELETE FROM article WHERE id=:id");
        $query->bindValue(":id", $blog->id);
        $query->execute();
    }

    // categories table
    public function get_categories()
    {
        $query = $this->pdo->prepare("SELECT * FROM categories");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
