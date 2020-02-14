<?php 
class db{
    private $host = "localhost";
    private $dbname = "messenger";
    private $username = "root";
    private $password = "";
    protected $con;
    
    public function __construct(){
        try{
            $this->con = new PDO("mysql:host=$this->host;dbname={$this->dbname}",$this->username,$this->password);
        }catch(Exception $e){
            var_dump($e->errorInfo());
            die();
        }
    }
}