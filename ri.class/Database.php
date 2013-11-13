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
    
    public function execute($query , $array){
        $data = $this->db->prepare($query);
        $data->execute($array);
        if($data->rowCount()!=1)
            die('<br>nic nie znaleziono');
        $response =  $data->fetch();
        echo $response['body'];
    }
     
}
?>
