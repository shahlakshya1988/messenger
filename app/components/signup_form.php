<div class="form-area">
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="group">
			<h2 class="form-heading">Create New Account</h2>
		</div>
		<!-- div.group -->
		<div class="group">
			<input type="text" name="full_name" id="full_name" class="control" placeholder="Enter Full Name" value="<?php echo (isset($full_name)) ? $full_name : ""; ?>">
			<div class="name-error error">
				<?php if (isset($name_error) && !empty(trim($name_error))) { ?>
					<?= $name_error; ?>
				<?php } ?>
			</div>
		</div>
		<!-- div.group -->
		<div class="group">
			<input type="email" name="email" id="email" class="control" placeholder="Enter Email Address" value="<?php echo (isset($email)) ? $email : ""; ?>">
			<div class="email-error error">
				<?php if (isset($email_error) && !empty(trim($email_error))) { ?>
					<?= $email_error; ?>
				<?php } ?>
			</div>
		</div>
		<!-- div.group -->
		<div class="group">
			<input type="password" name="password" id="password" class="control" placeholder="Enter Password" value="<?php echo (isset($password)) ? $password : ""; ?>">
			<div class="password-error error">
				<?php if (isset($password_error) && !empty(trim($password_error))) { ?>
					<?= $password_error; ?>
				<?php } ?>
			</div>
		</div>
		<!-- div.group -->
		<div class="group">
			<label for="file" class="file-label" id="file-label"> <i class="fas fa-cloud-upload-alt upload-icon"></i> Upload The Image</label>
			<input type="file" name="img" id="file" class="file" placeholder="Select Image">
			<div class="image-error error">
				<?php if (isset($image_error) && !empty(trim($image_error))) { ?>
					<?= $image_error; ?>
				<?php } ?>
			</div>
		</div>
		<!-- div.group -->
		<div class="group">
			<input type="submit" name="signup" id="signup" class="btn account-btn" value="Create Account">
		</div>
		<!-- div.group -->
		<div class="group">
			<a href="" class="link">Already Have Any Account</a>
		</div>
		<!-- div.group -->
	</form>
</div>