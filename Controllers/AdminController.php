<?php
require_once 'Controller.php';
class AdminController extends Controller{
    public function login(){
           $result = file_get_contents("./Views/Admin/login.php");
           echo $result;
    }
    public function reset(){
           $result = file_get_contents("./Views/Admin/reset.html");
           echo $result;
    }
}
?>

