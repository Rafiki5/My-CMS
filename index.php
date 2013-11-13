<?php
session_start();
require_once 'Controller/DefaultController.php';
    $page = isset($_REQUEST['page'])?$_REQUEST['page']:'';
    if($page){
        $dc = new DefaultController();
        echo $dc->getPage($page);
    }
?>
