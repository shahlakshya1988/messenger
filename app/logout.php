<?php 
require_once __DIR__ . DIRECTORY_SEPARATOR . "init.php";
$obj = new base_class;
$user_id = $_SESSION["user_id"];
$query = "UPDATE `users` SET `status` = 0 where `id` = :id";
$param = array(":id"=>$user_id);
$obj->normalQuery($query,$param);
$del_user = "DELETE FROM `user_sessions` where `user_id` = :user_id and `session_id` = :session_id ";
$param = array(":session_id"=>$_SESSION["session_id"],":user_id"=>$_SESSION["user_id"]);
$obj->normalQuery($del_user,$param);
session_destroy();
header("Location: login.php");
die();