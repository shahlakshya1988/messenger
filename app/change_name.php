<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "init.php";
$obj = new base_class();
if (!isset($_SESSION["user_name"]) && !isset($_SESSION["user_id"])) {
    $obj = new base_class();
    $obj->createSession("security","Sorry First You Need To Login");
    header("Location: login.php");
    die();
}
if(isset($_POST["change_name"])){
    $user_name = $obj->security($_POST["user_name"]);
    $user_name_status = 1;
    if(empty(trim($user_name))){
        $user_name_status = 0;
        $user_name_error = "Username Can't Be Blank";
    }
    if($user_name_status == 1){
        $query = "UPDATE `users` SET `name` = :name where `id` = :id";
        $param = array(":name"=>$user_name,":id"=>$_SESSION["user_id"]);
        $obj->normalQuery($query,$param);
        if($obj->countRows()){
            $obj->createSession("user_name",$user_name);
            $obj->createSession("user_name_update_success","User Name Have Been Updated Successfully");
            header("Location: index.php");
            die();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
    <title>Change Name</title>
    <?php include "components/css.php"; ?>
</head>

<body>
    <?php include "components/nav.php"; ?>
    <div class="chat-container">
        <?php include "components/sidebar.php"; ?>
        <section id="right-area">
            <?php include "components".DIRECTORY_SEPARATOR."change_name_form.php"; ?>
        </section>
        <!-- section#right-area -->
    </div>
    <!-- div.chat container -->
    <?php include "components/js.php"; ?>
</body>

</html>