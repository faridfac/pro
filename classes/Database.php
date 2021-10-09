<?php
class Database{
    
    private $db_host = 'us-cdbr-east-04.cleardb.com';
    private $db_name = 'heroku_22318a0db0a7357';
    private $db_username = 'b6e403e7dd4fae';
    private $db_password = '69a98f6f';
    
    public function dbConnection(){
        
        try{
            $conn = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name,$this->db_username,$this->db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(PDOException $e){
            echo "Connection error ".$e->getMessage(); 
            exit;
        }
          
    }
}