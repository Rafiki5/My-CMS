<?php
require_once ("../.private/config.php");
   if(!mysql_connect($DBVARIABLE['dbhost'], $DBVARIABLE['dbusername'], $DBVARIABLE['dbpassword']))
           die("nie polaczono");
   $del = mysql_query("DROP DATABASE my_cms");
   if(!$del)
       echo 'nie usunieto';
   $newdb = mysql_query("CREATE DATABASE IF NOT EXISTS  my_cms 
       default character set utf8 collate utf8_polish_ci");

   if(!$newdb)
       die("nie utworzono");
   mysql_select_db($DBVARIABLE['dbname']); 
   $gran = mysql_query("grant all on my_cms.* to rafiki5@localhost identified by ''");
   if(!$gran)
       die("nie utworzono urzytkownika");
   $flush = mysql_query("flush privileges");
    if(!$flush)
       die("nie nadano przywilejow");
 //-------------------------------------------
    $query = "CREATE TABLE pages (
       id int(11) not null auto_increment,
       title varchar(50) not null,
       name varchar(50),
       body text,
       active bool not null default 0,
       createdate datetime default null,
       editdate datetime default null,
       primary key (id)) ";
   $pagetable = mysql_query($query);
   if(!$pagetable)
       die("nie utwozono tabeli page");
   $query = "INSERT INTO pages(`title`, `name`, `body`, `active`)
       VALUES ('Strona Glowna','Strona domowa','<h1>Witaj !!!!!</h1>',1)";
   $insertpage = mysql_query($query);
   if(!$insertpage)
       die("nie dodano strony");
 //-------------------------------------  
   $query = "CREATE TABLE users (
       id int(11) not null auto_increment,
       username varchar(50) not null,
       email text not null,
       password varchar(50) not null,
       active bool not null default 0,
       acceskey varchar(32) default null,
       role text,
       primary key(id)) ";
   $usertable = mysql_query($query);
   if(!$usertable)
       die("nie utwozono tabeli users");
   $pass = md5("admin");
   $groups = json_encode(array('_superadministrator', '_administrator'));
   $query = "INSERT INTO users(`username`, `email`, `password`, `active`, `role`)
       VALUES ('admin','5226303@gmail.com','$pass', 1, '$groups')";
   $insertuser = mysql_query($query);
   if(!$insertuser)
       die("nie dodano administratora");
   $pass = md5("11111");
   $query = "INSERT INTO users(`username`, `email`, `password`, `active`, `role`)
       VALUES ('rafiki','5226303@gmail.com','$pass', 1, '[]')";
   $insertuser = mysql_query($query);
   if(!$insertuser)
       die("nie dodano administratora");
//----------------------------------------------   
   $query = "create table groups (
       id int(11) not null auto_increment,
       name text,
       primary key(id))";
   $groupstable = mysql_query($query);
   if(!$groupstable)
       die("nie utworzono tabeli groups");
   mysql_query("insert into groups (name) value ('_superadministrator')");
   mysql_query("insert into groups (name) value ('_administrator')");
 //---------------------------------------------
   $query = "create table menu (
       id int(11) not null auto_increment,
       active bool not null default 0,
       path text not null ,
       pages_id int(11) not null,
       primary key(id))";
   $menutable = mysql_query($query);
   if(!$menutable)
       die("nie utworzono tabeli menu");
   mysql_query("insert into menu (active, path, pages_id) values(1, '/My-CMS/', 1)");
   echo 'ok';