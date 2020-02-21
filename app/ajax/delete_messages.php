<?php require __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."init.php"; 
$obj= new base_class();
/*** getting the last message id */
$query = "SELECT `message_id` FROM `messages` order by `message_id` DESC LIMIT 1";
$obj->normalQuery($query);
$result = $obj->fetch_single();
$last_message_id = $result->message_id;
$last_message_id++; 
$query = "UPDATE  `clean` SET `clean_message_id` = :clean_message_id WHERE `clean_user_id` = :clean_user_id";
$param = array(":clean_message_id"=>$last_message_id,":clean_user_id"=>$_SESSION["user_id"]);
$obj->normalQuery($query,$param);
if($obj->countRows()){
    echo json_encode(array("status"=>"success"));
    $obj->createSession("previous_messages_delete","Previous Messages Have Been Deleted Successfully !!!!");
}
/*** getting the last message id */
?>