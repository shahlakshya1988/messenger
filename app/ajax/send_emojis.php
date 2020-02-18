<?php require __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."init.php"; 
$obj = new base_class();

if(isset($_POST["send_emoji"]) && !empty(trim($obj->security($_POST["send_emoji"])))){
    
    $emoji = trim($obj->security($_POST["send_emoji"]));
    $query = "INSERT INTO `messages` (`message`,`msg_type`,`user_id`) values (:message,:msg_type,:user_id)";
    $param = array(":message"=>$emoji,":msg_type"=>"emoji",":user_id"=>$_SESSION["user_id"]);
    //echo json_encode(array("query"=>$query,"param"=>$param)); die();
    $obj->normalQuery($query,$param);
    //echo json_encode(array("error"=>$obj->errroInfo()));die();
    if($obj->countRows()){
        echo json_encode(array("message"=>"success")); die();
    }else{
        echo json_encode(array("message"=>"success")); die();
    }

}
?>