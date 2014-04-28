<?php
require_once 'ri.class/Database.php';
require_once 'ri.class/Groups.php';
class Controller{
    protected $database;
    protected $users;
    protected $pages;
    protected $groups;


    public function __construct() {
        $this->database = new Database();
        $this->users = new Users();
        $this->pages = new Pages();
        $this->groups = new Groups();
    }
    public function isAdmin(){
        if(!isset($_SESSION['userdata']['role']['_superadministrator'])){
            header("Location:".$_SERVER['DOCUMENT_ROOT']);
        }
    }
    public function isId(){
        $this->isAdmin();
        if(!isset($_REQUEST['id'])){
            header("Location: /My-CMS");
        }
    }
};
?>
