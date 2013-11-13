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
   $flash = mysql_query("flush privileges");
    if(!$flash)
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
   echo 'ok';