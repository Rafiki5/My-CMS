<?php
require_once 'Database.php';
require_once 'msgCode.php';
session_start();
$database = new Database();
$id = isset($_POST['id'])?$_POST['id']:'';
    if(isset($_POST['delete'])){  
        $resp = $database->fetchOne("select role from users where id=?", array($id));
        if($resp['role']!='_superadministrator'){      
            $database->fetchOne("delete from users where id=? and role<>'_superadministrator'", array($id));
            header("Location: /My-CMS/admin/userslist?posmsg=".  htmlspecialchars($msgcodepositive['userdeleted']));     
        }else
            header ("Location: /My-CMS/admin/userslist?negmsg=".htmlspecialchars ($msgcode['cannotdeleteuser']));       
    }
    if(isset($_POST['changepass'])){
        $newpass=trim($_POST['newpassword']);
        $repeatpass = trim($_POST['repeatpassword']);
        if($newpass=='' || $repeatpass==''){
            header ("Location: /My-CMS/admin/changepass/".$id."?negmsg=".htmlspecialchars ($msgcode['emptypass']));
            exit;
            
        }
        $resp = $database->fetchOne("select password from users where id=?", array($id));
        if($resp!=false){
            global $newpass, $repeatpass;
            if($newpass===$repeatpass){
                if($resp['password']==md5($_POST['oldpassword'])){
                    $database->fetchOne("update users set password=? where id=?", array(md5($newpass), $id));
                    header("Location:/My-CMS/admin/userslist?posmsg=".  htmlspecialchars($msgcodepositive['resetpass']));
                }else{
                        header("Location: /My-CMS/admin/changepass/".$id."?negmsg=".htmlspecialchars($msgcode['wrongoldpass']));
                    //echo $msgcode['wrongoldpass'];
                }
                
            }else{
                //echo $newpass." i ".$repeatpass;
                header("Location: /My-CMS/admin/changepass/".$id."?negmsg=".htmlspecialchars($msgcode['differentpass']));
            }
               
        }else{
            header("Location: /My-CMS/admin/changepass/".$id."?negmsg=".htmlspecialchars($msgcode['notchangedpass']));
        }
    }
    if(isset($_POST['edit'])){
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $groups=array();
        if(isset($_POST['role'])){
            foreach ($_POST['role'] as $r)
                $groups[] = $r;
        }
        $groups = json_encode($groups);
        if($username=='' || $email==''){
            header("Location: /My-CMS/admin/user/".$id."?negmsg=".htmlspecialchars($msgcode['emptyfield'])); 
            exit;        
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: /My-CMS/admin/user/".$id."?negmsg=".htmlspecialchars($msgcode['wrongemail']));           
            exit;
        }
        $database->fetchOne("update users set username=?, email=?, role=? where id=?", array($username, $email,$groups, $id));
        header("Location: /My-CMS/admin/userslist?posmsg=".  htmlspecialchars($msgcodepositive['updated']));
    }

?>
