<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ri.class/Database.php';
if(isset($_POST['edit'])){

    $database = new Database();
    $id = $_POST['id'];
    $commentactive = isset($_POST['commentactive'])?1:0;   
    $database->fetchOne("update pages set commentactive=? where id=?", array($commentactive, $id));
    header("Location: /pages/pageslist");
}
function create_table(){
    
    $database = new Database();
    $database->fetchAll("create table comments(
            id int(11) not null auto_increment,
            author varchar(50) not null,
            text text not null,
            page_id int(11) not null,
            primary key(id)
    );");
    $database->fetchAll("alter table pages add commentactive bool default 0");
}
function get_data (Smarty &$smarty, &$id){
global $plugin;
global $PLUGINS;
$database = new Database();
    $commentactive = $database ->fetchOne("select commentactive from pages where id=?", array(1));  
    $comments = $database ->fetchAll("select * from comments");   
    $smarty->assign("commentactive", $commentactive['commentactive']);
    $smarty->assign("comments", $comments);
    $smarty->assign("title", $PLUGINS['CommentPlugin']['title']);
    $smarty->assign ("path",$PLUGINS['CommentPlugin']['tplname'] );
    
}

