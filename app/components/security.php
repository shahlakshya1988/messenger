<?php 
if(!isset($_SESSION["user_name"]) && !isset($_SESSION["user_id"])){
  
    $obj->createSession("security","Sorry First You Need To Login");
    //var_dump($_SESSION);
    //DIE();
    header("Location: login.php");
    die();
}
?>