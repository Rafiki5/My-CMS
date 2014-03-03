<?php
require_once 'Database.php';
require_once 'smarty/Smarty.class.php';
class Users {
    private $database;
    private $smarty;
    public function __construct(){
        $this->database = new Database();
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir("./Views/Admin/");
        $this->smarty->setCompileDir("./Views/Compile/");
    }
    public function usersList(){
        
        $users = $this->database->fetchAll("select id, username, email, role from users");       
        $this->smarty->assign("user", $users);      
        $this->smarty->display("userslist.tpl");
    }
    public function userID($id){
        $user = $this->database->fetchOne("select * from users where id=?", array($id));
        if(!$user)
            header ("Location: ".$_SERVER['DOCUMENT_ROOT']);
        $this->smarty->assign("user", $user);
        $this->smarty->display("user.tpl");
    }
    public function changePass($id){
        $this->smarty->assign("id", $id);
        $this->smarty->display("changepass.tpl");
    }
}

?>
