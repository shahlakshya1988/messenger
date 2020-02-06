<?php 
require_once "connection.php";
$user_id = 1;
$name = "Tanmay Shah";
$email = "tanmayshah19@example.com";
$update= $db->prepare("UPDATE `users` SET name = :name,email= :email where `id` = :id");
$update->execute([":email"=>$email,":name"=>$name,":id"=>$user_id]);
var_dump($update->rowCount());
