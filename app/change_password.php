<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "init.php";
$obj = new base_class();
require_once __DIR__ . DIRECTORY_SEPARATOR . "components" . DIRECTORY_SEPARATOR . "security.php";
if (isset($_POST["change_password"])) {
    $current_password =  $obj->security($_POST["current_password"]);
    $new_password =  $obj->security($_POST["new_password"]);
    $retype_new_password =  $obj->security($_POST["retype_new_password"]);
    $current_password_status = $new_password_status = $retype_password_status = 1;
    if (empty(trim($current_password))) {
        $current_password_status = 0;
        $current_password_error = "Current Password Is Required";
    }
    if (empty(trim($new_password))) {
        $new_password_status = 0;
        $new_password_error = "New Password Is Required";
    }
    if (empty(trim($new_password))) {
        $retype_password_status = 0;
        $retype_password_error = "Retype Password Is Required";
    }
    if (strlen($new_password) < 6) {
        $new_password_status = 0;
        $new_password_error = "New Password Should Not Be Less Than 6 Chars";
    }
    if ($new_password != $retype_new_password) {
        // both the password are different
        $new_password_status = 0;
        $new_password_error = "New Password Does Not Match With Retype Password";
        $retype_password_status = 0;
        $retype_password_error = "Retype Password Does Not Match With New Password";
    }
    $user_id = $_SESSION["user_id"];
    $query = "SELECT * FROM `users` where `id` = :id";
    $param = array(":id" => $user_id);
    $result = $obj->normalQuery($query, $param);
    $resultSingle = $obj->fetch_single();
    //var_dump($resultSingle);
    if ($current_password_status == 1 && $new_password_status == 1 && $retype_password_status == 1) {
        //var_dump(password_verify($current_password,$resultSingle->password));
        if (password_verify($current_password, $resultSingle->password)) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            // var_dump($hashed_password);
            $update_user = "UPDATE `users` SET `password` = :password where `id` = :id LIMIT 1";
            $param = array(":password" => $hashed_password, ":id" => $user_id);
            $query = $obj->normalQuery($update_user, $param);
            // var_dump($query);
            //var_dump($obj->countRows());
            $obj->createSession("password_updated", "Your Password Is Successfully Updated");
            header("Location: index.php");
            die();
        } else {
            // wrong previous password 
            $current_password_status = 0;
            $current_password_error = "Current Password Is Wrong";
        }
    }
    //die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
    <title>Change Password</title>
    <?php include "components/css.php"; ?>
</head>

<body>
    <?php include "components/nav.php"; ?>
    <div class="chat-container">
        <?php include "components/sidebar.php"; ?>
        <!-- section#sidebar -->
        <section id="right-area">
            <?php include "components" . DIRECTORY_SEPARATOR . "change_password_form.php" ?>
        </section>
        <!-- section#right-area -->
    </div>
    <!-- div.chat container -->
    <?php include "components/js.php"; ?>
</body>

</html>