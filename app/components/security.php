<?php 

if(!isset($_SESSION["user_name"]) && !isset($_SESSION["user_id"])){
  
    $obj->createSession("security","Sorry First You Need To Login");
    //var_dump($_SESSION);
    //DIE();
    header("Location: login.php");
    die();
}
/***
 * we are destroying session after 15 minutes of inactivity
 */
$query = "SELECT * FROM `user_sessions` where `session_id` = :session_id";
$param = array(":session_id"=>$_SESSION["session_id"]);
$obj->normalQuery($query,$param);
// var_dump($obj->countRows()); die();
if(!$obj->countRows()){
    unset($_SESSION["user_name"]);
    unset($_SESSION["user_id"]);
    $obj->createSession("security","Sorry, You have Been Inactive For 15 Minutes");
    //var_dump($_SESSION);
    //DIE();
    header("Location: login.php");
    die();
}
?>