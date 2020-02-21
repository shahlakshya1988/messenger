<?php require __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."init.php"; 
$obj= new base_class();
$query = "SELECT `user_id` from `user_sessions` where `session_id` !=  '".$_SESSION["session_id"]."' group by `user_id`";
//echo $query;
$obj->normalQuery($query);
echo json_encode(array("count"=>$obj->countRows()));

/**** we will be updateing the sessions ****/
$query = "UPDATE `user_sessions` SET `datetime` = NOW() where `session_id` = :session_id";
$param = array(":session_id" => $_SESSION["session_id"]);
$obj->normalQuery($query,$param);
/**** we will be updateing the sessions ****/

/**** we will be DELETING  the sessions,AFTER 15 MINUTES ****/
//$query = "UPDATE `user_sessions` SET `datetime` = NOW() where `session_id` = :session_id";
$query = "SELECT * FROM `user_sessions` where `datetime` < NOW() - INTERVAL 15 MINUTE";
//$param = array(":session_id" => $_SESSION["session_id"]);
$obj->normalQuery($query);
$result_set = $obj->fetch_all();
//var_dump($result_set);
//echo json_encode(array($result_set));
foreach($result_set as $result){
    $del_user_id = $result->user_id;
    $query = "UPDATE `users` SET `status` = 0 where `id` = :id";
    $param = array(":id"=>$del_user_id);
    $obj->normalQuery($query,$param);
    if($obj->countRows()){
        $del_session = "DELETE FROM `user_sessions` where `session_id` = :session_id";
        $param = array(":session_id"=>$result->session_id);
        $obj->normalQuery($del_session,$param );
    }
}

/**** we will be DELETING  the sessions,AFTER 15 MINUTES ****/
?>