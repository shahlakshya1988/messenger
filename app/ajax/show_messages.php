<?php require __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."init.php"; 
$obj = new base_class();
if(isset($_GET["message"]) && !empty(trim($obj->security($_GET["message"])))){
    echo "<pre>",print_r($_GET),"</pre>";
}
?>