<?php
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/.private/config.php'))
    require_once  $_SERVER['DOCUMENT_ROOT']. '/.private/config.php';
else{
    header("Location: /ri.installer/");
    exit;    
}
global $DBVARIABLE;
$PLUGINS=array();
if(isset($DBVARIABLE['plugins']) && $DBVARIABLE['plugins']!=''){
    $DBVARIABLE['plugins']=  explode(",", $DBVARIABLE['plugins']);
    foreach ($DBVARIABLE['plugins'] as $pluginname){
        if(file_exists('ri.plugins/'.$pluginname.'/config.php')){
            require_once 'ri.plugins/'.$pluginname.'/config.php';
            global $plugin;
            $PLUGINS[$pluginname]=$plugin;
        }
        
       
    }
}

