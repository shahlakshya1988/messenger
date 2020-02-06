<?php 
require_once "connection.php";
$user_id = 1;
$delete= $db->prepare("DELETE FROM `users`  where `id` = :id LIMIT 1");
$delete->execute([":id"=>$user_id]);
var_dump($delete->rowCount());
