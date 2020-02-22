<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "init.php";
$obj = new base_class();
require_once __DIR__ . DIRECTORY_SEPARATOR . "components" . DIRECTORY_SEPARATOR . "security.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
    <title>Home</title>
    <?php include "components/css.php"; ?>
</head>

<body>
<?php if(isset($_SESSION["loader"]) && $_SESSION["loader"] == "1"){ ?>
<div class="loader-area">
    <div class="loader">
        <div class="loader-item">
        
        </div>
        <!-- div.loader-item -->
    </div>
    <!-- div.loader -->
</div>
<!-- div.loader-area -->
<?php } unset($_SESSION["loader"]); ?>
    <?php if (isset($_SESSION["user_name_update_success"])) { ?>
        <div class="flash success-flash">
            <span class="remove">&times;</span>
            <div class="flash-heading">
                <h3> <span class="checked">&#10004;</span> Success: You Have Done!!!</h3>
            </div>
            <!-- div.flash-heading -->
            <div class="flash-body">
                <p><?= $_SESSION["user_name_update_success"]; ?></p>
            </div>
            <!-- div.flash-body -->
        </div>
        <!-- div.flash -->
    <?php }
    unset($_SESSION["user_name_update_success"]); ?>
    <?php if (isset($_SESSION["previous_messages_delete"])) { ?>
        <div class="flash success-flash">
            <span class="remove">&times;</span>
            <div class="flash-heading">
                <h3> <span class="checked">&#10004;</span> Success: You Have Done!!!</h3>
            </div>
            <!-- div.flash-heading -->
            <div class="flash-body">
                <p><?= $_SESSION["previous_messages_delete"]; ?></p>
            </div>
            <!-- div.flash-body -->
        </div>
        <!-- div.flash -->
    <?php }
    unset($_SESSION["previous_messages_delete"]); ?>
    <?php if (isset($_SESSION["password_updated"])) { ?>
        <div class="flash success-flash">
            <span class="remove">&times;</span>
            <div class="flash-heading">
                <h3> <span class="checked">&#10004;</span> Success: You Have Done!!!</h3>
            </div>
            <!-- div.flash-heading -->
            <div class="flash-body">
                <p><?= $_SESSION["password_updated"]; ?></p>
            </div>
            <!-- div.flash-body -->
        </div>
        <!-- div.flash -->
    <?php }
    unset($_SESSION["password_updated"]); ?>
    <?php if (isset($_SESSION["image_updated"])) { ?>
        <div class="flash success-flash">
            <span class="remove">&times;</span>
            <div class="flash-heading">
                <h3> <span class="checked">&#10004;</span> Success: You Have Done!!!</h3>
            </div>
            <!-- div.flash-heading -->
            <div class="flash-body">
                <p><?= $_SESSION["image_updated"]; ?></p>
            </div>
            <!-- div.flash-body -->
        </div>
        <!-- div.flash -->
    <?php }
    unset($_SESSION["image_updated"]); ?>

    <div class="flash error-flash" style="display:none;">
        <span class="remove">&times;</span>
        <div class="flash-heading">
            <h3> <span class="checked">&#x2715;</span> Error: You Have Done!!!</h3>
        </div>
        <!-- div.flash-heading -->
        <div class="flash-body">
            <p>Your Password Has Been Successfully Updated</p>
        </div>
        <!-- div.flash-body -->
    </div>
    <!-- div.flash -->
    <?php include "components/nav.php"; ?>
    <div class="chat-container">
        <?php include "components/sidebar.php"; ?>
        <section id="right-area">
            <?php include "components/messages.php"; ?>
            <?php include "components/chat-form.php"; ?>
            <?php include "components/emojis.php"; ?>
        </section>
        <!-- section#right-area -->
    </div>
    <!-- div.chat container -->
    <?php include "components/js.php"; ?>
</body>

</html>
