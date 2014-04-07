<?php
require_once '../Database.php';
require_once 'msgCode.php';
session_start();
$database = new Database();
$id = isset($_POST['id'])?$_POST['id']:'';
    if(isset($_POST['delete'])){  
        $resp = $database->fetchOne("select role from users where id=?", array($id));
        if($resp['role']!='_superadministrator'){      
            $database->fetchOne("delete from users where id=? and role<>'_superadministrator'", array($id));
            $_SESSION['posmsg']= htmlspecialchars($msgcodepositive['userdeleted']);
            header("Location: /My-CMS/admin/userslist");     
        }else{
            $_SESSION['negmsg']=htmlspecialchars ($msgcode['cannotdeleteuser']);
            header ("Location: /My-CMS/admin/userslist");       
        }
             }
    if(isset($_POST['changepass'])){
        $newpass=trim($_POST['newpassword']);
        $repeatpass = trim($_POST['repeatpassword']);
        if($newpass=='' || $repeatpass==''){
            $_SESSION['negmsg']=htmlspecialchars ($msgcode['emptypass']);
            header ("Location: /My-CMS/admin/changepass/".$id);
            exit;
            
        }
        $resp = $database->fetchOne("select password from users where id=?", array($id));
        if($resp!=false){
            global $newpass, $repeatpass;
            if($newpass===$repeatpass){
                if($resp['password']==md5($_POST['oldpassword'])){
                    $database->fetchOne("update users set password=? where id=?", array(md5($newpass), $id));
                    $_SESSION['posmsg']= htmlspecialchars($msgcodepositive['resetpass']);
                    header("Location:/My-CMS/admin/userslist");
                }else{
                    $_SESSION['negmsg']=htmlspecialchars($msgcode['wrongoldpass']);
                    header("Location: /My-CMS/admin/changepass/".$id);
                    //echo $msgcode['wrongoldpass'];
                }
                
            }else{
                //echo $newpass." i ".$repeatpass;
                $_SESSION['negmsg']=htmlspecialchars($msgcode['differentpass']);
                header("Location: /My-CMS/admin/changepass/".$id);
            }              
        }else{
            $_SESSION['negmsg']=htmlspecialchars($msgcode['notchangedpass']);
            header("Location: /My-CMS/admin/changepass/".$id);
        }
    }
    if(isset($_POST['edit'])){
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $groups=array();
        if(isset($_POST['role'])){
            foreach ($_POST['role'] as $r){
                $groups[] = $r;
            }             
        }
        $groups = json_encode($groups);
        if($username=='' || $email==''){
            $_SESSION['negmsg']=htmlspecialchars($msgcode['emptyfield']);
            header("Location: /My-CMS/admin/user/".$id); 
            exit;        
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['negmsg']=htmlspecialchars($msgcode['wrongemail']);
            header("Location: /My-CMS/admin/user/".$id);           
            exit;
        }
        $database->fetchOne("update users set username=?, email=?, role=? where id=?", array($username, $email,$groups, $id));
        $_SESSION['posmsg']= htmlspecialchars($msgcodepositive['updated']);
        header("Location: /My-CMS/admin/userslist");
    }

?>
