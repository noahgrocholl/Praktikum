<?php
include_once 'db.php';
include_once 'model.php';

class User extends Model
{
    public $name;
    public $created_at;

    public function __construct($id, $name, $created_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->created_at = $created_at;
    }

    static function create_user($nameNew)
    {
        $db = new Db;
        $date = date('y-m-d');
        $db->query("INSERT INTO users (name, created_at) VALUES (:name, :created_at)", array('name' => $nameNew, 'created_at' => $date));
        $id_new = $db->conn->lastInsertId();

        $user = new User($id_new, $nameNew, $date);
        return $user;
    }

    static function get_all_users()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=noah_grocholl', 'root', '');
        $list_users = $pdo->query("SELECT * FROM users");
        return $list_users;
    }
}
