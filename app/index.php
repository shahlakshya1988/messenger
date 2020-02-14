<?php require_once __DIR__.DIRECTORY_SEPARATOR."init.php"; 
if(!isset($_SESSION["user_name"]) && !isset($_SESSION["user_id"])){
    header("Location: login.php");
    die();
}
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