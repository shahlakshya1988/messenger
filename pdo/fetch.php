<?php 
require "connection.php";
$get = $db->prepare("SELECT * FROM `users`");
$get->execute();
$result = $get->fetchAll(PDO::FETCH_OBJ);
var_dump($get->rowCount());
echo PHP_EOL;
var_dump($result);
