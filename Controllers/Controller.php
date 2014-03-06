<?php
require_once 'ri.class/Database.php';
class Controller{
    protected $database;
    protected $users;
    public function __construct() {
        $this->database = new Database();
        $this->users = new Users();
    }
    public function isAdmin(){
        if(!isset($_SESSION['userdata']['role']['_superadministrator'])){
            header("Location:".$_SERVER['DOCUMENT_ROOT']);
        }
    }
    public function isId(){
        $this->isAdmin();
        if(!isset($_REQUEST['id'])){
            header("Location: /My-CMS/admin/userslist");
        }
    }
};
?>
