<?php
require_once 'Controller.php';
require_once 'ri.class/Plugins.php';
class PluginsController extends Controller{
    public function pluginslist(){
        $this->plugins->pluginslist();
    }
    
}
