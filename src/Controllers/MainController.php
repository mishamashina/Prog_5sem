<?php

namespace src\Controllers;
use Services\Db;

class MainController{
    private $db;

    public function __construct(){
        $this->db = new Db;
    }

    public function main(){
        echo 'Hello, World</br>';
        $sql = 'SELECT * FROM `articles`';
        $articles = $this->db->query($sql);
        var_dump($articles);

    }
    public function sayHello(string $name){
        echo 'Hello, '.$name;
    }
}