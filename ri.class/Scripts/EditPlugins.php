<?php
require_once '../../.private/config.php';
require_once '../../ri.plugins/'.$_GET['plugin'].'/config.php';
global $DBVARIABLE;
global $plugin;
if(isset($_GET['plugin'])){
    $pluginname= $_GET['plugin'];
    $action= $_GET['action'];
    if(isset($DBVARIABLE['plugins'])&&$DBVARIABLE['plugins']!='')
       $DBVARIABLE['plugins']= explode(",", $DBVARIABLE['plugins']); 
    else
        $DBVARIABLE['plugins']= array();
        
    if($action=='add'){
        if(!in_array($pluginname, $DBVARIABLE['plugins'])){
            $DBVARIABLE['plugins'][]=$pluginname;
            $config='<?php 
            $plugin=array(
            \'title\'=>\''.$plugin['title'].'\',
            \'name\'=>\''.$plugin['name'].'\',  
            \'description\'=>\''.$plugin['description'].'\',
            \'active\'=>\'true\',
            \'tplname\'=>\'ri.plugins/CommentPlugin/comment.tpl\'
        );';
    file_put_contents('../../ri.plugins/'.$pluginname.'/config.php', $config);
    header('Location: /plugins/pluginslist');
        }
         
    }else if($action=='remove'){
        if(in_array($pluginname, $DBVARIABLE['plugins'])){
            unset($DBVARIABLE['plugins'][array_search($pluginname, $DBVARIABLE['plugins'])]);   
            $config='<?php 
            $plugin=array(
            \'title\'=>\''.$plugin['title'].'\',
            \'name\'=>\''.$plugin['name'].'\',  
            \'description\'=>\''.$plugin['description'].'\',
            \'active\'=>\'false\',
            \'tplname\'=>\'ri.plugins/CommentPlugin/comment.tpl\'
        );';
    file_put_contents('../../ri.plugins/'.$pluginname.'/config.php', $config);
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
