<?php
include_once 'db.php';
include_once 'models/post.php';

class Category
{
    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    static public function get_all()
    {
        $all_categories = array();
        $db = new Db;
        foreach ($db->query("SELECT * FROM `categrories`") as $row) {
            array_push($all_categories, new Category($row["id"], $row["name"]));
        }

        return $all_categories;
    }

    static public function search($category_id)
    {
        $results = array();
        $db = new Db;
        foreach ($db->query("SELECT post_id FROM post_categories WHERE category_id = $category_id") as $post_id) {
            foreach (Post::return_all_posts() as $post) {
                if ($post->id == $post_id[0]) {
                    array_push($results, $post);
                }
            }
        }

        return $results;
    }
}
