<?php
require_once './msgCode.php';
require_once $_SERVER['DOCUMENT_ROOT']. '/.private/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ri.plugins/'.$_GET['plugin'].'/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ri.plugins/'.$_GET['plugin'].'/PluginFunction.php';
global $DBVARIABLE;
global $plugin;
session_start();
if(isset($_GET['plugin'])){
    if(!isset($_SESSION['userdata']['role']['_superadministrator']) && 
      !isset($_SESSION['userdata']['role']['_administrator'])){
        header("Location: /");
        exit();
    }
    $pluginname= $_GET['plugin'];
    $action= $_GET['action'];
    if(isset($DBVARIABLE['plugins'])&&$DBVARIABLE['plugins']!='')
       $DBVARIABLE['plugins']= explode(",", $DBVARIABLE['plugins']); 
    else
        $DBVARIABLE['plugins']= array();
        
    if($action=='add'){
        if(!in_array($pluginname, $DBVARIABLE['plugins'])){
            $DBVARIABLE['plugins'][]=$pluginname;
            if($plugin['createdtable']=='false'){
                create_table();
                $plugin['createdtable']='true';             
            }
            save_plugin_config($plugin, "true");
            header('Location: /plugins/pluginslist');
        }else{
            save_plugin_config($plugin, "true");
            header('Location: /plugins/pluginslist');
        }
        
    }else if($action=='remove'){
        
        if(in_array($pluginname, $DBVARIABLE['plugins'])){
            unset($DBVARIABLE['plugins'][array_search($pluginname, $DBVARIABLE['plugins'])]);   
            save_plugin_config($plugin, "false");
            header('Location: /plugins/pluginslist');   
        }else{
            save_plugin_config($plugin, "false");
            header('Location: /plugins/pluginslist');  
        }
                 
    }
    save_config('../../.private/config.php');
}
function save_config($path){
    global $DBVARIABLE;
    $tmparray = $DBVARIABLE;
    $tmparray['plugins']=  join(",", $tmparray['plugins']);
    $tmparray2=array();
    foreach ($tmparray as $k=>$value){
        $tmparray2[]='\''.  $k.'\'=>\''.$value.'\'';
        
    }
    $config='<?php 
        $DBVARIABLE=array(
        '.
      join(",\n", $tmparray2).'
    );';
    file_put_contents($path, $config);
}
?>
