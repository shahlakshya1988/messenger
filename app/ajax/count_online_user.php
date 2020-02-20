<?php require __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."init.php"; 
$obj= new base_class();
$query = "SELECT `user_id` from `user_sessions` where `session_id` !=  '".$_SESSION["session_id"]."'";
//echo $query;
$obj->normalQuery($query);
echo json_encode(array("count"=>$obj->countRows()));
?>