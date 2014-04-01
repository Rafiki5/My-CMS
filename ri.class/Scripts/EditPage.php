<?php
require_once '../Database.php';
require_once 'msgCode.php';
$database = new Database();
session_start();
if(isset($_POST['editpage'])){
    $title = isset($_POST['title'])?$_POST['title']:'';
    $name = isset($_POST['name'])?$_POST['name']:'';
    $body = isset($_POST['body'])?$_POST['body']:'';
    if(is_numeric($name) || is_numeric($title)){
        $_SESSION['negmsg']=$msgcode['notnumeric'];
        header("Location: /My-CMS/pages/pageslist");  
        exit;
    }
    if($_POST['id']!=1)
        $active = isset($_POST['activepage'])?1:0;
    else
        $active=1;
    $activemenu = isset($_POST['activemenu'])?1:0;
    $title=  trim($title);
    $name=  trim($name);
    $body=  trim($body);
    if($title=='' || $name=='' || $body==''){
        $_SESSION['negmsg']=$msgcode['fieldisempty'];
        header("Location: /My-CMS/pages/pageslist");  
        exit;
    }
    $database->fetchOne("update pages set title=?, name=?, body=?, active=? where id=?", array($title, $name, $body, $active, $_POST['id']));
    $database->fetchOne("update menu set active=?, path=? where pages_id=?", array($activemenu, '/My-CMS/'.$name, $_POST['id']));
    $_SESSION['posmsg'] = $msgcodepositive['pagechanged'];
    header("Location: /My-CMS/pages/pageslist");
    
}
if(isset($_POST['deletepage'])){
    if($_POST['id']==1){
        $_SESSION['negmsg'] = $msgcode['cannotdeletepage'];
        header("Location: /My-CMS/pages/pageslist");  
        exit;
    }
    $database->fetchOne("delete from pages where id=?", array($_POST['id']));
    $_SESSION['posmsg'] = $msgcodepositive['pagedeleted'];
    header("Location: /My-CMS/pages/pageslist");   
}
if(isset($_POST['addpage'])){
    $title = isset($_POST['title'])?$_POST['title']:'';
    $name = isset($_POST['name'])?$_POST['name']:'';
    if(is_numeric($name) || is_numeric($title)){
        $_SESSION['negmsg']=$msgcode['notnumeric'];
        header("Location: /My-CMS/pages/pageslist");  
        exit;
    }
    $body = isset($_POST['body'])?$_POST['body']:'';
    $active = isset($_POST['activepage'])?1:0;
    $activemenu = isset($_POST['activemenu'])?1:0;
    $title=  trim($title);
    $name=  trim($name);
    $body=  trim($body);
    if($title=='' || $name=='' || $body==''){
        $_SESSION['negmsg']=$msgcode['fieldisempty'];
        header("Location: /My-CMS/pages/pageslist");  
        exit;
    }
    $database->fetchOne("insert into pages (`title`,`name`,`body`, `active`)values (?, ?, ?, ?)", array($title, $name, $body, $active));
    $lastId = $database->lastInsertId();
    $database->fetchOne("insert into menu (`active`, `path`, `pages_id`)values(?, ?, ?)", array($activemenu, '/My-CMS/'.$name, $lastId));
    $_SESSION['posmsg']=$msgcodepositive['pagewasadd'];
    header("Location: /My-CMS/pages/pageslist");  
    
}
?>
