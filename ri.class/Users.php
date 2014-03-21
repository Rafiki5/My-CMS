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
        $userstmp=array();
        foreach ($users as  $k=>$u){
            $u['role']=  json_decode ($u['role']);
            $userstmp[]=$u;
        }
        $users=$userstmp;
        $this->smarty->assign("user", $users);      
        $this->smarty->display("userslist.tpl");
    }
    public function userID($id){
        $groups = $this->database->fetchAll("select name from groups");
        $groupstmp = array();
        foreach ($groups as $g)
            $groupstmp[]=$g['name'];
        $groups= $groupstmp;
        $user = $this->database->fetchOne("select * from users where id=?", array($id));
        if(!$user){
            header ("Location: ".$_SERVER['DOCUMENT_ROOT']);
        }
            
        $user['role']=  json_decode($user['role']);     
        $this->smarty->assign("user", $user);
        $this->smarty->assign("group", $groups);
        $this->smarty->display("user.tpl");
    }
    public function changePass($id){
        $user = $this->database->fetchOne("select * from users where id=?", array($id));
        if(!$user){
            header ("Location: ".$_SERVER['DOCUMENT_ROOT']);
        }
        $this->smarty->assign("id", $id);
        $this->smarty->display("changepass.tpl");
    }
}

?>
