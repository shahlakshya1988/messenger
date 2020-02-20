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
        return $this->query->fetchAll(PDO::FETCH_OBJ);
    }
    public function security($data)
    {
        return trim(strip_tags($data)); // remove all the html 
    }
    public function fetch_single()
    {
        return $this->query->fetch(PDO::FETCH_OBJ);
    }
    public function createSession($session_name, $session_value)
    {
        $_SESSION[$session_name] = $session_value;
    }
    public function time_age($db_message_time)
    {
        $db_time = strtotime($db_message_time);
        $current_time = time();
        $seconds = $current_time - $db_time;
        $minutes = floor($seconds / 60);
        $hours = floor($seconds/(60*60));// 60->seconds in one minute 60->minues in 1 hour
        $days =  floor($seconds/(60*60*24)); // 24 hours in one day
        $weeks = floor($seconds/(7*60*60*24)); // 7 days in one week
        $months = floor($seconds/(30*60*60*24)); // 30 days in one month
        $years = floor($seconds/(365*60*60*24)); // 365 days in one month
    }
}
