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
            <div class="form-section">
                <div class="form-grid">
                    <div class="form-area">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="group">
                                <h2 class="form-heading">Update Name</h2>
                            </div>
                            <!-- div.group -->
                            
                            <div class="group">
                                <input type="text" name="user_name" id="user_name" class="control" placeholder="Enter New Name">
                            </div>
                            <!-- div.group -->
                           
                            <div class="group">
                                <input type="submit" name="change_name" id="change_name" class="btn account-btn" value="Save Changes">
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