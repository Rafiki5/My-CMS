<?php
require_once 'ri.class/Database.php';
require_once 'Controller.php';

   class DefaultController extends Controller {

       public function getPage(){
          $resp =  $this->database->execute('SELECT body FROM pages WHERE name=?',array(""));
          echo $resp['body'];
       }
       
       
   };
