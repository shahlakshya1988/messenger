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
                    <?php if(isset($current_password_error)){ ?>
                        <div class="current_password_error error">
                            <?= $current_password_error; ?>
                        </div>
                    <?php } ?>
                </div>
                <!-- div.group -->
                <div class="group">
                    <input type="password" name="new_password" id="new_password" class="control" placeholder="Enter New Password">
                    <?php if(isset($new_password_error)){ ?>
                        <div class="new_password_error error">
                            <?= $new_password_error; ?>
                        </div>
                    <?php } ?>
                </div>
                <!-- div.group -->
                <div class="group">
                    <input type="password" name="retype_new_password" id="retype_new_password" class="control" placeholder="Retype New Password">
                    <?php if(isset($retype_password_error)){ ?>
                        <div class="retype_password_error error">
                            <?= $retype_password_error; ?>
                        </div>
                    <?php } ?>
                </div>
                <!-- div.group -->
                <div class="group">
                    <input type="submit" name="change_password" id="change_password" class="btn account-btn" value="Change Password">
                </div>
                <!-- div.group -->

            </form>
        </div>
        <!-- div.form-area -->
    </div>
    <!-- div.form-grid -->
</div>
<!-- div.form-section -->