<?php
session_start();
require_once 'Controllers/DefaultController.php';
    $page = isset($_REQUEST['page'])?$_REQUEST['page']:'';
    if(!$page){
        $dc = new DefaultController();
        echo $dc->getPage($page);
    }else{
        $dc = new DefaultController();
        echo $dc->$page($page);
    }
?>
