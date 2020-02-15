<div class="form-section">
    <div class="form-grid">
        <div class="form-area">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="group">
                    <h2 class="form-heading">Update Name</h2>
                </div>
                <!-- div.group -->

                <div class="group">
                    <input type="text" name="user_name" id="user_name" class="control" placeholder="Enter New Name" value="<?= $_SESSION["user_name"] ?>">
                    <?php if(isset($user_name_error)){ ?>
                        <div class="user_name_error error">
                            <?=$user_name_error; ?>
                        </div>
                    <?php } ?>
                </div>
                <!-- div.group -->

                <div class="group">
                    <input type="submit" name="change_name" id="change_name" class="btn account-btn" value="Update Name">
                </div>
                <!-- div.group -->

            </form>
        </div>
        <!-- div.form-area -->
    </div>
    <!-- div.form-grid -->
</div>
<!-- div.form-section -->