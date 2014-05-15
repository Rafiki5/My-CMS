<?php
if(file_exists("../.private/config.php"))
    exit;
session_start();
$namedb=@$_POST['namedb'];
$hostdb=@$_POST['hostdb'];
$userdb=@$_POST['userdb'];
$passdb=@$_POST['passdb'];
$adminname=@$_POST['adminname'];
$adminpass=@$_POST['adminpass'];
$adminpass2=@$_POST['adminpass2'];
$adminemail=@$_POST['adminemail'];
$adminname=  trim($adminname);
$adminpass= trim($adminpass);
$adminpass2= trim($adminpass2);
$adminemail= trim($adminemail);
$errors='';
    if($namedb=='' || $hostdb=='' || $userdb=='')
        $errors.='<p>Nazwa bazy danych, Host i Nazwa urzytkownika nie mogą być puste. </p>';
    else{
        $dbconnect=  mysql_connect($hostdb, $userdb, $passdb);
        if(!$dbconnect)
            $errors.="<p>Połączenie z bazą danych nie powiodło się. Podaj poprawne dane.</p>";
        else if(!mysql_select_db($namedb, $dbconnect))
                $errors.="<p>Nazwa bazy danych ".$namedb." jest nieprawidłowa.</p>";
    }
    if($adminname=='' || $adminpass=='' || $adminpass2=='' || $adminemail=='')
        $errors.="<p>Pola z danymi administratora nie mogą być puste</p>";
    if(strlen($adminname)<5)
        $errors.="<p>Nazwa administratora musi zawierać minimum 5 znaków.</p>";
    if(strlen($adminpass)<8)
        $errors.="<p>Hasło administratora musi zawierać minimum 8 znaków.</p>";
    if($adminpass!=$adminpass2)
        $errors.="<p>Hasła nie są identyczne.</p>"; 
    if(!filter_var($adminemail, FILTER_VALIDATE_EMAIL))
        $errors.="<p>Nieprawidłowy adres e-mail.</p>";    
    if($errors!=''){
        $_SESSION['negmsg']=$errors;
        header("Location: step2.php");
    }else{
        $config='<?php $DBVARIABLE = array(
        "dbusername"=>\''.addslashes($userdb).'\',
        "dbpassword"=>\''.addslashes($passdb).'\',
        "dbhost"=>\''.addslashes($hostdb).'\',
        "dbname"=>\''.addslashes($namedb).'\'
    ); ?>';
        file_put_contents("../.private/config.php", $config);
//-----------------------------------------------------------
        
        
        $query = "CREATE TABLE pages (
       id int(11) not null auto_increment,
       title varchar(50) not null,
       name varchar(50),
       body text,
       active bool not null default 0,
       createdate datetime default null,
       editdate datetime default null,
       primary key (id)) ";
       mysql_query($query);
       mysql_query("INSERT INTO pages(`title`, `name`, `body`, `active`)
       VALUES ('Strona Glowna','Strona domowa','<h1>Witaj !!!!!</h1>',1)");
    
       $query = "CREATE TABLE users (
       id int(11) not null auto_increment,
       username varchar(50) not null,
       email text not null,
       password varchar(50) not null,
       active bool not null default 0,
       acceskey varchar(32) default null,
       role text,
       primary key(id)) ";
       mysql_query($query);
       $adminpass=  md5($adminpass);
       $groups = json_encode(array('_superadministrator'));
       mysql_query("INSERT INTO users(`username`, `email`, `password`, `active`, `role`)
       VALUES ('$adminname','$adminemail','$adminpass', 1, '$groups')");
       
       $query = "create table groups (
       id int(11) not null auto_increment,
       name text,
       primary key(id))";
        mysql_query($query);
        mysql_query("insert into groups (name) value ('_superadministrator')");
        mysql_query("insert into groups (name) value ('_administrator')");
        mysql_query("insert into groups (name) value ('Edytor strom')");
        mysql_query("insert into groups (name) value ('Gość')");
        
        $query = "create table menu (
       id int(11) not null auto_increment,
       active bool not null default 0,
       path text not null ,
       pages_id int(11) not null,
       primary key(id));";
        mysql_query($query);
        mysql_query("insert into menu (`path`, `pages_id`) value ('Strona domowa', 1)");
        echo mysql_error();
//---------------------------------------------------------
        header("Location: step3.php");
    }

    ?>
