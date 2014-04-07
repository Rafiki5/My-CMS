<?php
require_once '../Database.php';
$database = new Database();
$resp = $database->fetchAll("select u.username as user, m.message as mess from users u right join messages m on u.id=m.id_sender order by m.id desc limit 3");
if($resp!=false){
    foreach ($resp as $r){
        echo '<p>'.$r['user'].' : '.  nl2br($r['mess']).'</p><br>';
    }
}

