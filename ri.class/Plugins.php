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
        $dir  = new DirectoryIterator($_SERVER['DOCUMENT_ROOT'].'/ri.plugins/');
        $plugins=array();
        foreach ($dir as $d){
            if(!$d->isDot()){
                $name = $d->getFilename();
                require_once $_SERVER['DOCUMENT_ROOT']. '/ri.plugins/'.$name.'/config.php';
                   if(!isset($plugin))
                        global $plugin;

                  
                $plugins[]=$plugin;
            }
        }
        $this->smarty->assign('plugins', $plugins);
        $this->smarty->display("pluginslist.tpl");
    }
}
