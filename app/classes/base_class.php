<?php 
class base_class extends db{
    private $query;

    /**
     * $query = "SELECT * FROM `users`";
     * $param = "where `email` = {$email}"; Condition Where clause
     */
    public function normalQuery($query,$param=null){
        $this->query = $this->con->prepare($query);
        if(is_null($param)){            
            return $this->query->execute();
        }else{
            return $this->query->execute($param);
        }
    }  
    public function countRows(){
        return $this->query->rowCount();
    } 
}