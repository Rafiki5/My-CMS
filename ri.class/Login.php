<?php
require_once 'Database.php';
require_once 'sendmail.php';
require_once 'msgCode.php';
session_start();
$database = new Database();
if(isset($_POST['login'])){
    $user = isset($_POST['username'])?$_POST['username']:'';
    $pass = isset($_POST['password'])?$_POST['password']:'';
    $pass = md5($pass);
    $resp = $database->fetchOne("select * from users where username=? and password=? and active", array($user, $pass));
    if(isset($resp)&&$resp!=false){
        $_SESSION['userdata']=$resp;
        
        $groups = json_decode($resp['role']);
        if(!empty($groups)){
            
            $_SESSION['userdata']['role']=array();
            foreach ($groups as $g)
                $_SESSION['userdata']['role'][$g]=true;
        }      
        if(isset($_SESSION['userdata'])){
                header ("Location: /My-CMS/");
        }          
    }
     else {
        header ("Location: /My-CMS/admin/login?negmsg=".  htmlspecialchars($msgcode['notlogin']));
    }
}
if(isset($_POST['reset'])){
    $pass="";             
    do{
        $c = chr(rand(48, 122));
        if(preg_match("/^[0-9a-zA-Z]/", $c))
            $pass .= $c;
    }while (strlen($pass)<8);
    $passmd5 = md5($pass);
    $codeidtmp="";
    $codeidtmp.= (string)rand(1, 9);
    for ($i=0; $i<7; $i++){
        $codeidtmp.= (string)rand(0, 9);
    }
    $codeid = $codeidtmp;
    $database->fetchOne("update users set acceskey=? where email=? ", array($codeid, $_POST['email'])); 
    sendmail($_POST['email'], $pass, $codeid);
    header('Location: /My-CMS/admin/login?posmsg='.htmlspecialchars($msgcodepositive['sendemailpass']));
}
if(isset($_GET['action']) && $_GET['action']=="logout"){
    unset($_SESSION['userdata']);
    header("Location: /My-CMS/");   
}
if(isset($_GET['action']) && $_GET['action']=='verification'){
    $pass=  md5($_GET['change']);
    $database->fetchOne("update users set password=?  where acceskey=?", array($pass, $_GET['codeid'])); 
    header("Location: /My-CMS/admin/login?posmsg=".htmlspecialchars($msgcodepositive['resetpass']));
}

?>
