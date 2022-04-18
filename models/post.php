<?php

include_once 'model.php';
include_once 'db.php';

class Post extends Model
{
    public $text;
    public $date;
    public $user;
    public $categories_ids;

    public function __construct($id, $text, $date, $user, $categories_ids)
    {
        $this->id = $id;
        $this->text = $text;
        $this->date = $date;
        $this->user = $user;
        $this->categories_ids = $categories_ids;
    }

    static public function create_post($text_new, $user_new, $categories_new)
    {
        $db = new Db;
        $date = date('y-m-d');
        $db->query("INSERT INTO posts (text, date, user) VALUES (:text, :date, :user)", array('text' => $text_new, 'date' => $date, 'user' => $user_new));
        $id_new = $db->conn->lastInsertId();
        foreach ($categories_new as $category) {
            $db->query("INSERT INTO post_categories (post_id, category_id) VALUES (:post_id, :category_id)", array('post_id' => $id_new, 'category_id' => $category));
        }
        return new Post($id_new, $text_new, $date, $user_new, $categories_new);
    }

    static public function return_all_posts()
    {
        $all_posts = array();
        $db = new Db;
        foreach ($db->query("SELECT
        p.id AS postID,
        p.text AS postText,
        p.date AS postDate,
        p.user AS userID,
        u.name AS userName
        
        FROM
        posts p
        JOIN users u ON u.id = p.user") as $row) {
            $list_categorys = array();
            foreach ($db->query("SELECT * FROM post_categories") as $row_pc) {

                if ($row["postID"] == $row_pc["post_id"]) {
                    array_push($list_categorys, $row_pc["category_id"]);
                }
            }
            array_push($all_posts, new Post($row["postID"], $row["postText"], $row["postDate"], $row["userName"], $list_categorys));
        }



        return $all_posts;
    }

    static public function delete_post($id_post)
    {
        $db = new Db;
        $db->query("DELETE FROM posts WHERE id = :id", array("id" => $id_post));
        $db->query("DELETE FROM post_categories WHERE post_id = :post_id", array("post_id" => $id_post));
    }

    public function edit($newText)
    {
        $this->text = $newText;
        $db = new Db;
        $db->query("UPDATE posts SET text = :newtext WHERE id = $this->id", array("newtext" => strip_tags($newText)));
    }

    public function get_information()
    {
        return array($this->id, $this->text, $this->date, $this->user, $this->categories_ids);
    }

    public function get_category()
    {
        $db = new Db;
        $categories = array();
        if (is_array($this->categories_ids)) {
            
            foreach ($this->categories_ids as $category) {
                $c_search = $db->query("SELECT * FROM `categrories` WHERE id = $category");
                array_push($categories, new Category($c_search[0]["id"], $c_search[0]["name"]));
            }
            return $categories;
        } else {
            $c_search = $db->query("SELECT * FROM `categrories` WHERE id = $this->categories_ids");
            array_push($categories, $c_search[0]);
            return $categories;
        }
    }
}
