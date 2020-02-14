<?php
class base_class extends db
{
    private $query;

    /**
     * $query = "SELECT * FROM `users`";
     * $param = "where `email` = {$email}"; Condition Where clause
     */
    public function normalQuery($query, $param = null)
    {
        $this->query = $this->con->prepare($query);
        if (is_null($param)) {
            return $this->query->execute();
        } else {
            return $this->query->execute($param);
        }
    }
    public function countRows()
    {
        return $this->query->rowCount();
    }

    public function fetch_all()
    {
        return $this->obj->fetchAll(PDO::FETCH_OBJ);
    }
    public function security($data)
    {
        return trim(strip_tags($data)); // remove all the html 
    }
    public function createSession($session_name, $session_value)
    {
        $_SESSION[$session_name] = $session_value;
    }
}
