<?php 
$hostname="localhost";
$dbname="messenger";
$username="root";
$password="";


try{
	$db = new PDO("mysql:host={$hostname};dbname={$dbname}",$username,$password);
}catch(Exception $e){
	$e->getMessage();
}