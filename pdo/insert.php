<?php 
require "connection.php";
$name = "Lakshya Shah";
$email = "shahlakshya1988@gmail.com";
$password = "123";
$insert = $db->prepare("INSERT INTO `users` (`id`,`name`,`email`,`password`) values (NULL,:name,:email,:password)");
$insert->execute([
":name"=>$name,
":email"=>$email,
":password"=>$password
]);
var_dump($insert->rowCount());