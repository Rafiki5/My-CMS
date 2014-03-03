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
        $this->isAdmin();
        $this->users->userslist();
    }
    public function user($id){
        $this->isAdmin();
        $this->idId();
        $this->users->userId($id);
    }
    public function changepass($id){
        $this->isAdmin();
        $this->idId();
        $this->users->changePass($id);
    }
}
?>

