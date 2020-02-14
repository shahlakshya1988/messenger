<?php 
spl_autoload_register(function($classname){
    include __DIR__.DIRECTORY_SEPARATOR."classes".DIRECTORY_SEPARATOR.$classname.".php";
});
$db = new db();
?>