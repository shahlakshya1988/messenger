<?php require __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."init.php"; 
$obj = new base_class();

if(isset($_POST["send_message"]) && !empty(trim($obj->security($_POST["send_message"])))){
    
    $message = trim($obj->security($_POST["send_message"]));
    $query = "INSERT INTO `messages` (`message`,`msg_type`,`user_id`) values (:message_text,:msg_type_text,:user_id_text)";
    $param = array(":message_text"=>$message,":msg_type_text"=>"text",":user_id_text"=>$_SESSION["user_id"]);
   // var_dump($_REQUEST);
    $value= $obj->normalQuery($query,$param);
    //var_dump($value);
   //echo json_encode(array("query"=>$value)); die();
    if($obj->countRows()){
       echo json_encode(array("status"=>"success")); die();
    }else{
        echo json_encode(array("status"=>"error")); die();
    }
}
?>