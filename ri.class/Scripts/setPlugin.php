<?php
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/.private/config.php'))
    require_once  $_SERVER['DOCUMENT_ROOT']. '/.private/config.php';
else{
    header("Location: /ri.installer/");
    exit;    
}
global $DBVARIABLE;
$PLUGINS=array();
if(isset($DBVARIABLE['plugins']) && $database['plugins']!=''){
    $DBVARIABLE['plugins']=  explode(",", $DBVARIABLE['plugins']);
    foreach ($DBVARIABLE['plugins'] as $pluginname){
        
    }
}

