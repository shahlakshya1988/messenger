<?php 
$hostname="localhost";
$dbname="messenger";
$username="root";
$password="";


try{
	$db = new PDO("mysql:host={$hostname};dbname={$dbname}",$username,$password);
}catch(Excepction $e){
	$e->getMessage();
}