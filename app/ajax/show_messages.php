<?php require __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."init.php"; 
$obj = new base_class();
if(isset($_GET["message"]) && !empty(trim($obj->security($_GET["message"])))){
    //echo "<pre>",print_r($_GET),"</pre>";
    /** we will fetch clean_message_id */
    $query="SELECT `clean_message_id` from `clean` where `clean_user_id` = :clean_user_id";
    $param = array(":clean_user_id"=>$_SESSION["user_id"]);
    $obj->normalQuery($query,$param);
    $result = $obj->fetch_single();
    $clean_message_id = $result->clean_message_id;
    // echo "<pre>",print_r($result),"</pre>";
$fetch_last_message_id_query = "SELECT `message_id` FROM `messages`  order by `message_id` DESC LIMIT 1";
$obj->normalQuery($fetch_last_message_id_query);
$result_last_message_id = $obj->fetch_single();
$last_message_id = $result_last_message_id->message_id;
//echo $last_message_id;
    /** we will fetch clean_message_id */

    /*** we will fetch messages between those ids clean_message_id and last_message_id */
    $query = "SELECT * FROM `messages` inner join `users` on `messages`.`user_id` = `users`.`id` where `messages`.`message_id` BETWEEN :clean_message_id and :last_message_id ORDER BY `messages`.`message_id` ASC ";
    $param = array(":clean_message_id"=>$clean_message_id,":last_message_id"=>$last_message_id);
    $obj->normalQuery($query,$param);
    $result_msg = $obj->fetch_all();
    //echo "<pre>",print_r($result_msg),"</pre>";
    foreach($result_msg as $informations){
        print_r($informations);
        echo "<br><br>";
    }
    /*** we will fetch messages between those ids clean_message_id and last_message_id */
}
?>