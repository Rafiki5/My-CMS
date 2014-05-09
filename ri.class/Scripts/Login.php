<?php
require_once '../Database.php';
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
                header ("Location: http://".$_SERVER['HTTP_HOST']);
        }          
    }
     else {
        $_SESSION['negmsg']= htmlspecialchars($msgcode['notlogin']);
        header ("Location: /admin/login");
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
    $email = isset($_POST['email'])?$_POST['email']:'';
    $email = trim($email);
    if($email==''){
        $_SESSION['negmsg']=htmlspecialchars($msgcode['emptyfield']);
        header("Location: /admin/reset".$id); 
        exit;  
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['negmsg']=htmlspecialchars($msgcode['wrongemail']);
            header("Location: /admin/reset".$id);           
            exit;
        }
    $database->fetchOne("update users set acceskey=? where email=? ", array($codeid, $_POST['email'])); 
    sendmail($_POST['email'], $pass, $codeid);
    $_SESSION['posmsg']=htmlspecialchars($msgcodepositive['sendemailpass']);
    header('Location: /admin/login');
}
if(isset($_GET['action']) && $_GET['action']=="logout"){
    unset($_SESSION['userdata']);
    header("Location: http://".$_SERVER['HTTP_HOST']);   
}
if(isset($_GET['action']) && $_GET['action']=='verification'){
    $pass=  md5($_GET['change']);
    $database->fetchOne("update users set password=?  where acceskey=?", array($pass, $_GET['codeid'])); 
    $_SESSION['posmsg']=htmlspecialchars($msgcodepositive['resetpass']);
    header("Location: /admin/login");
}

?>
