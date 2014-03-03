<?php
require_once 'DatabaseConnect.php';
class Database{
    private $db;
    private $query;
    private $array;
    public function __construct() {
        //$this->db = DBConnect::getDBConnect();
        $this->db = DBConnect::getInstance();
        $this->query='';
        $this->array = array();
    }
    public function setQuery($query){
        $this->query=$query;
    }
    public function setArray($array){
        $this->array = $array;
    }
    
    public function fetchOne($query , $array){
        $data = $this->db->prepare($query);
        $data->execute($array);
        if($data->rowCount()!=1){
            return false;
        }else{
            $response =  $data->fetch();
            return $response;
        }
    }
    public function fetchAll($query, $array=null){
        $data = $this->db->prepare($query);
        $data->execute($array);
        if($data->rowCount()==0){
            return false;
        }else{
            $response=array();
            while ($r = $data->fetch(PDO::FETCH_ASSOC)){
                $response[]=$r;
            }
            return $response;
        }
    }
     
}
?>
