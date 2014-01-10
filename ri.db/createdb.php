<?php
require_once (".private/config.php");
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
   $query = "CREATE TABLE pages (
       id int(11) not null auto_increment,
       title varchar(50) not null,
       name varchar(50),
       body text,
       createdate datetime default null,
       editdate datetime default null,
       primary key (id)) ";
   $pagetable = mysql_query($query);
   if(!$pagetable)
       die("nie utwozono tabeli page");
   $query = "CREATE TABLE users (
       id int(11) not null auto_increment,
       username varchar(50) not null,
       email text,
       password varchar(50) not null,
       active bool not null default 0,
       acceskey varchar(32) default null,
       role text,
       primary key(id)) ";
   $usertable = mysql_query($query);
   if(!$query)
       die("nie utwozono tabeli users");
   
   
   
   echo 'ok';