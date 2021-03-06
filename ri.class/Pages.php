<?php
require_once 'Database.php';
require_once 'smarty/Smarty.class.php';
class Pages {
    private $database;
    private $smarty;
    
    public function __construct() {
        $this->database = new Database();
        $this->smarty = new Smarty();
        $this->smarty->setCompileDir("./Views/Compile/");
    }
    public function pageslist($id = null){
        $this->smarty->setTemplateDir("./Views/Pages/");
        $content=null;
        if($id!=null){
            global $PLUGINS; 
            if(isset($PLUGINS['CommentPlugin'])){
                require_once $_SERVER['DOCUMENT_ROOT'].'/ri.plugins/CommentPlugin/PluginFunction.php';
                get_data($this->smarty, $id);            
            }
            $content = $this->database->fetchOne("select pages.id, pages.active as pactive, pages.title,
               pages.name, pages.body, menu.active as mactive from pages cross join menu on
               pages.id=menu.pages_id and pages.id=?", array($id));           
        }   
        $this->smarty->assign("content", $content);
        $pages =  $this->database->fetchAll("select id, name from pages");   
        $this->smarty->assign("pages", $pages);
        $this->smarty->display("pagelist.tpl");     
    }
    public function error(){
        $this->smarty->setTemplateDir("./Views/Default/");
        $this->smarty->display("404.tpl");
    }
    public function getPageByName($name){
        $resp= $this->database->fetchOne("select * from pages where name=? and active", array($name));
        $menu= $this->database->fetchAll("SELECT pages.name, pages.active AS pactive,
                menu.active AS mactive, menu.path
                FROM pages
                CROSS JOIN menu ON pages.id = menu.pages_id and menu.active and pages.active");
        
        if(!$resp){
            $this->error();
        }else{
            global $PLUGINS; 
            if(isset($PLUGINS['CommentPlugin'])&& $resp['commentactive']  && isset($_SESSION['userdata'])){
                require_once $_SERVER['DOCUMENT_ROOT'].'/ri.plugins/CommentPlugin/PluginFunction.php';
                get_data_to_pages($this->smarty, $resp['id']);            
            }
            $this->smarty->setTemplateDir("./Views/Pages/");
            $this->smarty->assign("page", $resp);
            $this->smarty->assign("menu", $menu);
            $this->smarty->display("page.tpl");
        }
        
    }
    public function getPageById($id){
        $resp= $this->database->fetchOne("select * from pages where id=? and active", array($id));
        $menu= $this->database->fetchAll("SELECT pages.name, pages.active AS pactive,
                menu.active AS mactive, menu.path
                FROM pages
                CROSS JOIN menu ON pages.id = menu.pages_id and menu.active and pages.active");
        if(!$resp){
            $this->error();
        }else{
           
            global $PLUGINS; 
            if(isset($PLUGINS['CommentPlugin']) && $resp['commentactive'] && isset($_SESSION['userdata'])){
                require_once $_SERVER['DOCUMENT_ROOT'].'/ri.plugins/CommentPlugin/PluginFunction.php';
                get_data_to_pages($this->smarty, $id);   
            }
            $this->smarty->setTemplateDir("./Views/Pages/");
            $this->smarty->assign("page", $resp);
            $this->smarty->assign("menu", $menu);
            $this->smarty->display("page.tpl");
        }
        
    }
}

?>
