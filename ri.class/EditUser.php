<?php
require_once 'Database.php';
$database = new Database();
    if(isset($_POST['delete'])){
        $id = isset($_POST['id'])?$_POST['id']:'';
        $resp =  $database->fetchOne("delete from users where id=?", array($id));
        header("Location: /My-CMS/admin/userslist");
    }


?>
