<?php
require_once 'Controller.php';
require_once '/ri.class/Users.php';
class AdminController extends Controller{
    public function login(){
           $result = file_get_contents("./Views/Admin/login.html");
           echo $result;
    }
    public function reset(){
           $result = file_get_contents("./Views/Admin/reset.html");
           echo $result;
    }
    public function userslist(){
        $this->isSuperAdmin();
        $this->users->userslist();
    }
    public function user($id){
        $this->isId();
        $this->users->userId($id);
    }
    public function changepass($id){
        $this->isId();
        $this->users->changePass($id);
    }
    public function registeruser(){
        $result = file_get_contents("./Views/Admin/registeruser.html");
        echo $result;
    }
}
?>

