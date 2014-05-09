<?php
require_once 'ri.class/Database.php';
require_once 'ri.class/Groups.php';
require_once 'ri.class/Plugins.php';
require_once 'ri.class/Users.php';
require_once 'ri.class/Pages.php';
class Controller{
    protected $database;
    protected $users;
    protected $pages;
    protected $groups;
    protected $plugins;


    public function __construct() {
        $this->database = new Database();
        $this->users = new Users();
        $this->pages = new Pages();
        $this->groups = new Groups();
        $this->plugins = new Plugins();
    }
    public function isAdmin(){
        if(!isset($_SESSION['userdata']['role']['_superadministrator'])){
            header("Location:".$_SERVER['DOCUMENT_ROOT']);
        }
    }
    public function isId(){
        $this->isAdmin();
        if(!isset($_REQUEST['id'])){
            header("Location:".$_SERVER['DOCUMENT_ROOT']);
        }
    }
};
?>
