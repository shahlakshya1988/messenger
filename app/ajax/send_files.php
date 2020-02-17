<?php require __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."init.php"; 
$obj = new base_class();
//echo "<pre>",print_r($_FILES),"</pre>";
$image = $_FILES["upload-files"];
$image_name = strtolower($image["name"]);
$image_tmp_name = $image["tmp_name"];
$image_error = $image["error"];
$image_size = $image["size"];
$image_type = $image["type"];
$image_name_array = explode(".", $image_name);
$image_extension = end($image_name_array);
$allowed_extensions = array("jpg", "jpeg", "png", "gif");
$allowed_type = array("image/gif", "image/jpeg", "image/png", "image/jpeg");
$new_image_name = uniqid("", true) . "." . $image_extension;
$img_path = "..".DIRECTORY_SEPARATOR."assets" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . $new_image_name;   
if (empty(trim($image_name)) || $image_error == 4) {
    
} else if (!in_array($image_extension, $allowed_extensions)) {
   
} else if (!in_array($image_type, $allowed_type)) {
    
} else {
    if (!move_uploaded_file($image_tmp_name, $img_path)) {
       
    }else{

    }
}
die();

?>