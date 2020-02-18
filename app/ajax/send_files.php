<?php require __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."init.php"; 
$obj = new base_class();
// echo "<pre>",print_r($_FILES),"</pre>"; die();
if(is_null($_FILES)){
    echo "error"; die();
}
$image = $_FILES["upload-files"];
$image_name = strtolower($image["name"]);
$image_tmp_name = $image["tmp_name"];
$image_error = $image["error"];
$image_size = $image["size"];
$image_type = $image["type"];
$image_name_array = explode(".", $image_name);
$image_extension = end($image_name_array);
$allowed_extensions = array("jpg", "jpeg", "png", "gif","pdf","xls","xlsx","doc","docx","zip");
$allowed_type = array("image/gif", "image/jpeg", "image/png", "image/jpeg","application/pdf","application/msword","application/vnd.openxmlformats-officedocument.wordprocessingml.document", "text/rtf", "text/plain","application/vnd.openxmlformats-officedocument.wordprocessingml.document","application/vnd.openxmlformats-officedocument.spreadsheetml.sheet","application/vnd.ms-excel","application/zip", "application/octet-stream", "application/x-zip-compressed", "multipart/x-zip");
$new_image_name = $_SESSION["user_id"].uniqid("", true) . "." . $image_extension;
$img_path = "..".DIRECTORY_SEPARATOR."assets" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . $new_image_name;   
if (empty(trim($image_name)) || $image_error == 4) {
    echo "error";die();
} else if (!in_array($image_extension, $allowed_extensions)) {
    echo "error";die();
} else if (!in_array($image_type, $allowed_type)) {
    echo "error";die();
} else {
    if (!move_uploaded_file($image_tmp_name, $img_path)) {
        echo "error";die();
    }else{
        /*** every thing is ok */
        $query = "INSERT INTO `messages` (`message`,`msg_type`,`user_id`) values (:message,:msg_type,:user_id)";
        $param = array(":message"=>$new_image_name,":msg_type"=>$image_extension,":user_id"=>$_SESSION["user_id"]);
        $obj->normalQuery($query,$param);
        if($obj->countRows()){
            echo "success"; die();
        }
        /*** every thing is ok */
    }
}
die();

?>