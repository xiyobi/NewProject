<?php
    class DB{
        public $pdo;

        public function __construct(){
            $dns = "mysql:host=127.0.0.1;dbname=register";
            $user = "root";
            $password = "root";
            $this->pdo = new PDO($dns, $user, $password);
            return $this->pdo;
        }
    } 

?>