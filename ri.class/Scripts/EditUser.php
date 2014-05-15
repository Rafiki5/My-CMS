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
            header("Location: /admin/userslist");     
        }else{
            $_SESSION['negmsg']=htmlspecialchars ($msgcode['cannotdeleteuser']);
            header ("Location: /admin/userslist");       
        }
             }
    if(isset($_POST['changepass'])){
        $newpass=trim($_POST['newpassword']);
        $repeatpass = trim($_POST['repeatpassword']);
        if($newpass=='' || $repeatpass==''){
            $_SESSION['negmsg']=htmlspecialchars ($msgcode['emptypass']);
            header ("Location: /admin/changepass/".$id);
            exit;          
        }
        if(strlen($newpass)<8 || strlen($repeatpass)){
            $_SESSION['negmsg']=htmlspecialchars ($msgcode['shortpass']);
            header ("Location: /admin/changepass/".$id);
            exit;          
        }
        $resp = $database->fetchOne("select password from users where id=?", array($id));
        if($resp!=false){
            global $newpass, $repeatpass;
            if($newpass===$repeatpass){
                if($resp['password']==md5($_POST['oldpassword'])){
                    $database->fetchOne("update users set password=? where id=?", array(md5($newpass), $id));
                    $_SESSION['posmsg']= htmlspecialchars($msgcodepositive['resetpass']);
                    header("Location: /admin/userslist");
                }else{
                    $_SESSION['negmsg']=htmlspecialchars($msgcode['wrongoldpass']);
                    header("Location: /admin/changepass/".$id);
                    //echo $msgcode['wrongoldpass'];
                }
                
            }else{
                //echo $newpass." i ".$repeatpass;
                $_SESSION['negmsg']=htmlspecialchars($msgcode['differentpass']);
                header("Location: /admin/changepass/".$id);
            }              
        }else{
            $_SESSION['negmsg']=htmlspecialchars($msgcode['notchangedpass']);
            header("Location: /admin/changepass/".$id);
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
            header("Location: /admin/user/".$id); 
            exit;        
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['negmsg']=htmlspecialchars($msgcode['wrongemail']);
            header("Location: /admin/user/".$id);           
            exit;
        }
        $database->fetchOne("update users set username=?, email=?, role=? where id=?", array($username, $email,$groups, $id));
        $_SESSION['posmsg']= htmlspecialchars($msgcodepositive['updated']);
        header("Location: /admin/userslist");
    }
    if(isset($_POST['register'])){
        $user=@$_POST['user'];
        $pass=@$_POST['pass'];
        $pass2=@$_POST['pass2'];
        $email=@$_POST['email'];
        $user=  trim($user);
        $pass=  trim($pass);
        $pass2=  trim($pass2);
        $email= trim($email);
        $errors='';
        $emailexist=$database->fetchOne("select * from users where email=?", array($email));
        $userexist=$database->fetchOne("select * from users where username=?", array($user));
        if($userexist!=false)
            $errors.="Urzytkownik o podanej nazwie już istnieje.<br>";
        if($emailexist!=false)
            $errors.="Adres e-mail już jest zajęty.<br>";
        if($user=='' || $pass=='' || $pass2=='' || $email=='')
            $errors.="Pola z danymi urzytkownika nie mogą być puste.<br>";
        if(strlen($user)<5)
            $errors.="Nazwa urzytkownika musi zawierać minimum 5 znaków.<br>";
        if(strlen($pass)<8)
            $errors.="Hasło urzytkownika musi zawierać minimum 8 znaków.<br>";
        if($pass!=$pass2)
            $errors.="Hasła nie są identyczne.<br>"; 
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            $errors.="Nieprawidłowy adres e-mail.";    
        if($errors!=''){
            $_SESSION['negmsg']=$errors;
            header("Location: /admin/registeruser");
            exit;
    }else{
       $pass=  md5($pass);
       $groups = json_encode(array('Gość'));
       $database->fetchOne("INSERT INTO users(`username`, `email`, `password`, `active`, `role`)
        VALUES (?, ?, ?, ?, ?)", array($user, $email, $pass, 1, $groups));
       $_SESSION['posmsg']=$msgcodepositive['usercreated'];
       header("Location: /admin/login");
    }
        
    }

?>
