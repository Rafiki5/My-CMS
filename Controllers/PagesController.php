<?php
require_once 'Controller.php';
require_once '/ri.class/Pages.php';

class PagesController extends Controller{
    
    public function pageslist($id=null){
        $this->isAdmin();
        $this->pages->pageslist($id);
    }
}

?>
