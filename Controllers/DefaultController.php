<?php
require_once 'ri.class/Database.php';
require_once 'Controller.php';
require_once 'ri.class/smarty/Smarty.class.php';

   class DefaultController extends Controller {

       public function getPage(){
           $this->pages->getPageById(1);
       }
       public function getPageByName($name){
           $this->pages->getPageByName($name);
       }
       
       
   };
