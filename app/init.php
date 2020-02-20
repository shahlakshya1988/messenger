<?php
ob_start();
if(session_status() == PHP_SESSION_NONE){
    session_start();
    // $session_id=session_id();
} 
spl_autoload_register(function($classname){
    include __DIR__.DIRECTORY_SEPARATOR."classes".DIRECTORY_SEPARATOR.$classname.".php";
});
//$db = new db();
