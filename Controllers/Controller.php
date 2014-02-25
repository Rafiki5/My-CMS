<?php
require_once 'ri.class/Database.php';
class Controller{
    protected $database;
    public function __construct() {
        $this->database = new Database();
    }
};
?>
