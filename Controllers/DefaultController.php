<?php
require_once 'ri.class/Database.php';

   class DefaultController {
       private $database;
       public function __construct() {
           $this->database = new Database();
       }
       public function getPage($name){
           return $this->database->execute('SELECT body FROM pages WHERE name=:name',array('name' => $name));
       }
       public function login(){
           $result = file_get_contents("./Views/Default/login.php");
           echo $result;
       }
   };
