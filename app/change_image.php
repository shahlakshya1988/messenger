<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "init.php";
$obj = new base_class();
require_once __DIR__ . DIRECTORY_SEPARATOR . "components" . DIRECTORY_SEPARATOR . "security.php";

if (isset($_POST["change_image"])) {
    $image = $_FILES["change-image"];
    $image_name = $image["name"];
    $image_type = $image["type"];
    $image_error = $image["error"];
    $image_size = $image["size"];
    $image_tmp_name = $image["tmp_name"];
    $image_name_array = explode(".", $image_name);
    $image_extension = end($image_name_array);

    $allowed_image_extensions = array("jpg", "jpeg", "png", "gif");
    $allowed_image_type = array("image/gif", "image/jpeg", "image/png", "image/jpeg");

    $new_image_name = uniqid("", true) . "." . $image_extension;
    $img_path = "assets" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . $new_image_name;
    $img_status = 1;
    unset($image_error);
    if (empty(trim($image_name)) || $image_error == 4) {
        $image_error = "Please Upload Your Image";
        $img_status = 0;
    } else if (!in_array($image_extension, $allowed_image_extensions)) {
        $image_error = "Please Upload Your Image In .jpg,.png or .gif Format";
        $img_status = 0;
    } else if (!in_array($image_type, $allowed_image_type)) {
        $image_error = "Please Upload Your Image In .jpg,.png or .gif Format";
        $img_status = 0;
    } else {
        if (!move_uploaded_file($image_tmp_name, $img_path)) {
            $image_error = "Operational Error !!!, Please Try Again";
            $img_status = 0;
        }
    }

    if ($img_status == 1) {
        $query = "UPDATE `users` SET `image` = :image where `id` = :id";
        $param = array(":image" => $new_image_name, ":id" => $_SESSION["user_id"]);
        $obj->normalQuery($query, $param);
        $obj->createSession("user_image", $new_image_name);
        $obj->createSession("image_updated", "Your Profile Image Is Successfully Updated");
        header("Location: index.php");
        die();
    }

    //die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
    <title>Change Image</title>
    <?php include "components/css.php"; ?>
</head>

<body>
    <?php include "components/nav.php"; ?>
    <div class="chat-container">
        <?php include "components/sidebar.php"; ?>
        <section id="right-area">
            <?php include "components" . DIRECTORY_SEPARATOR . "change_image_form.php"; ?>
        </section>
        <!-- section#right-area -->
    </div>
    <!-- div.chat container -->
    <?php include "components/js.php"; ?>
</body>

</html>