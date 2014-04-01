<?php
require_once '../Database.php';
require_once 'msgCode.php';
$database = new Database();
session_start();
if(isset($_POST['addgroup'])){
    
    $name = isset($_POST['groupname'])?$_POST['groupname']:'';
    $name = trim(str_replace("_", "", $name));
    if($name == ''){
        $_SESSION['negmsg']=$msgcode['emptyfield'];
        header("Location: /My-CMS/groups/groupslist");  
        exit;
    }
    $database->fetchOne("insert into groups (name) value (?)", array($name));
    header("Location: /My-CMS/groups/groupslist"); 
}
if(isset($_GET['action']) && $_GET['action']=='del'){
    $id = $_GET['id'];
    if($id == 1 || $id == 2){
        $_SESSION['negmsg']=$msgcode['cannotdeletegroup'];
        header("Location: /My-CMS/groups/groupslist");  
        exit;
    }
    $database->fetchOne("delete from groups where id=?", array($id));
    $_SESSION['posmsg']=$msgcodepositive['groupdeleted'];
    header("Location: /My-CMS/groups/groupslist");  
}
?>
