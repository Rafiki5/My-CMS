<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ri.class/Scripts/msgCode.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ri.class/Database.php';

if(isset($_POST['edit'])){
    $database = new Database();
    $id = $_POST['id'];
    $commentactive = isset($_POST['commentactive'])?1:0;   
    $database->fetchOne("update pages set commentactive=? where id=?", array($commentactive, $id));
    header("Location: /pages/pageslist");
}
if(isset($_POST['savecomment'])){
    $database = new Database();
    session_start();
    $username= $_POST['username'];
    $comment= $_POST['comment'];
    $username=  trim($username);
    $comment=  trim($comment);
    if($username=='' || $comment==''){
        $_SESSION['negmsg']=$msgcode['fieldisempty'];
        header("Location:".$_SERVER['HTTP_REFERER']);
        exit;
    }
    $comment=  htmlspecialchars($comment);
    $id=$_POST['id'];
    $database->fetchOne("insert into comments (author, text, page_id)value(?, ?, ?)", array($username, $comment, $id));
    header("Location:".$_SERVER['HTTP_REFERER']);
    
}
if(isset($_GET['action']) && $_GET['action']=='delete'){
    $database = new Database();
    session_start();
    if(!isset($_SESSION['userdata']['role']['_superadministrator'])){
        $_SESSION['negmsg']=$msgcode['accessblocked'];
        header("Location:".$_SERVER['HTTP_REFERER']);
        exit;
    }
    $database->fetchOne("delete from comments where id=?", array($_GET['id']));
    $_SESSION['posmsg']=$msgcodepositive['commentdeleted'];
    header("Location:".$_SERVER['HTTP_REFERER']);
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
function get_data (Smarty &$smarty, $id){
$database = new Database();
global $PLUGINS;
    $commentactive = $database ->fetchOne("select commentactive from pages where id=?", array($id));  
    $comments = $database ->fetchAll("select * from comments where page_id=? order by id", array($id));   
    $smarty->assign("commentactive", $commentactive['commentactive']);
    $smarty->assign("comments", $comments);
    $smarty->assign("title", $PLUGINS['CommentPlugin']['title']);
    $smarty->assign ("path",$PLUGINS['CommentPlugin']['tplname'] );   
}

function save_plugin_config($pluginconfig, $active){
    $config='<?php 
            $plugin=array(
            \'title\'=>\''.$pluginconfig['title'].'\',
            \'name\'=>\''.$pluginconfig['name'].'\',  
            \'description\'=>\''.$pluginconfig['description'].'\',
            \'active\'=>\''.$active.'\',
            \'tplname\'=>\''.$pluginconfig['tplname'].'\',
            \'commentpagetpl\'=>\''.$pluginconfig['commentpagetpl'].'\',
            \'createdtable\'=>\''.$pluginconfig['createdtable'].'\'
        );';
        file_put_contents( $_SERVER['DOCUMENT_ROOT'].'/ri.plugins/CommentPlugin/config.php', $config);
}
function get_data_to_pages (Smarty &$smarty, $id){
$database = new Database();
global $PLUGINS;
session_start();
    $comments = $database ->fetchAll("select * from comments where page_id=? order by id", array($id));   
    $smarty->assign("comments", $comments);
    $smarty->assign("path",$PLUGINS['CommentPlugin']['commentpagetpl'] );   
    $smarty->assign("username", $_SESSION['userdata']['username'] );
}

