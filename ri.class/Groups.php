<?php
require_once 'Database.php';
require_once 'smarty/Smarty.class.php';

class Groups {
    private $database;
    private $smarty;
    
    public function __construct() {
        $this->database = new Database();
        $this->smarty = new Smarty();
        $this->smarty->setCompileDir("./Views/Compile/");
        $this->smarty->setTemplateDir("./Views/Groups/");
    }
    public function groupslist(){
        $role = $this->database->fetchAll("select * from groups");
        $this->smarty->assign("role", $role);
        $this->smarty->display("groupslist.tpl");
        
    }
}

?>
