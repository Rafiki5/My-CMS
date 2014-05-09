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
        header("Location: /groups/groupslist");  
        exit;
    }
    $database->fetchOne("insert into groups (name) value (?)", array($name));
    header("Location: /groups/groupslist"); 
}
if(isset($_GET['action']) && $_GET['action']=='del'){
    $id = $_GET['id'];
    if($id == 1 || $id == 2){
        $_SESSION['negmsg']=$msgcode['cannotdeletegroup'];
        header("Location: /groups/groupslist");  
        exit;
    }
    $database->fetchOne("delete from groups where id=?", array($id));
    $_SESSION['posmsg']=$msgcodepositive['groupdeleted'];
    header("Location: /groups/groupslist");  
}
if(isset($_POST['editaction'])){
    $action=array();
    if(isset($_POST['action']))
        $action = $_POST['action'];
    $action = json_encode($action);
    $id = $_POST['id'];
    $database->fetchOne("update groups set action=? where id=?", array($action, $id));
    $_SESSION['posmsg']=$msgcodepositive['groupwaschange'];
    header("Location: /groups/groupslist"); 
}
?>
