<?php
// Database configurations
class Database {
    private $host = "localhost";
    private $db_name = "task_manager";
    private $user = "root";
    private $password = "Uditha@321";
    public $conn;

    public function getConnection(){
        $this -> conn = null;
        try{
            $this -> conn = new PDO(
                "mysql:host".$this->host . ";dbname=".$this->db_name,
                $this->user,
                $this->password
            );
            $this->conn->exec("set names utf8");
        } catch(PDOException $e){
            echo "Connection Error: " . $e->getMessage();
        }
        return $this->conn;
    }
}