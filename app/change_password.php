<?php require_once __DIR__.DIRECTORY_SEPARATOR."init.php"; ?>
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
            <div class="form-section">
                <div class="form-grid">
                    <div class="form-area">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="group">
                                <h2 class="form-heading">Update Password</h2>
                            </div>
                            <!-- div.group -->
                            
                            <div class="group">
                                <input type="password" name="current_password" id="current_password" class="control" placeholder="Enter Current Password">
                            </div>
                            <!-- div.group -->
                            <div class="group">
                                <input type="password" name="new_password" id="new_password" class="control" placeholder="Enter New Password">
                            </div>
                            <!-- div.group -->
                            <div class="group">
                                <input type="password" name="retype_new_password" id="retype_new_password" class="control" placeholder="Retype New Password">
                            </div>
                            <!-- div.group -->
                            <div class="group">
                                <input type="submit" name="change_password" id="change_password" class="btn account-btn" value="Save Changes">
                            </div>
                            <!-- div.group -->
                            
                        </form>
                    </div>
                    <!-- div.form-area -->
                </div>
                <!-- div.form-grid -->
            </div>
            <!-- div.form-section -->
        </section>
        <!-- section#right-area -->
    </div>
    <!-- div.chat container -->
    <?php include "components/js.php"; ?>
</body>
</html>