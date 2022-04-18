<?php

class Db
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database_db = "noah_grocholl";
    public $conn;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database_db", $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query(string $query, $params = [])
    {
        if (!strpos($query, "DELETE") && !strpos($query, "UPDATE")) {
            try {
                $stn = $this->conn->prepare($query);
                $stn->execute($params);

                if (empty($params)) return $stn->fetchAll();
            } catch (Exception $e) {
                die('DB Fehler' . $e);
            }
        } else {
            try {
                $stn = $this->conn->prepare($query);
                if (empty($params)) {
                    $stn->execute();
                } else {
                    $stn->execute($params);
                }
            } catch (Exception $e) {
                die('DB Fehler ' . $e);
            }
        }

        return true;
    }
}
