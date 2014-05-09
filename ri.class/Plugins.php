<?php
require_once 'Database.php';
require_once 'smarty/Smarty.class.php';
class Plugins {
    private $smarty;
    private $database;
    public function __construct(){
            $this->smarty = new Smarty();
            $this->database = new Database();
            $this->smarty->setCompileDir("./Views/Compile/");
            $this->smarty->setTemplateDir("./Views/Plugins/");
            
    }
    public function pluginslist(){
        $this->smarty->display("pluginslist.tpl");
    }
}
