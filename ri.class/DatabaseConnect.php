<?php
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/.private/config.php'))
    require_once  $_SERVER['DOCUMENT_ROOT']. '/.private/config.php';
else{
    header("Location: /ri.installer/");
    exit;    
}
class DBConnect{
    private static $instance = null;
    
    private function __construct() {    
 
	        try {                
                    global $DBVARIABLE;
                    self::$instance = new PDO('mysql:host='.@$DBVARIABLE['dbhost']
                    .';dbname='.@$DBVARIABLE['dbname'],
                    @$DBVARIABLE['dbusername'], @$DBVARIABLE['dbpassword']);
                //self::$instance = new PDO('mysql:host=localhost;dbname=my_cms','root','');                
                     
                     
                } catch (PDOException $e) { 
		die("PDO CONNECTION ERROR: " . $e->getMessage() . "<br/>");
                }               
    }
    public static function getInstance(){
        if(!self::$instance){
            new DBConnect();
        }
        return self::$instance;    
        
   }
            
};
?>
