<div class="form-area">
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="group">
			<h2 class="form-heading">Create New Account</h2>
		</div>
		<!-- div.group -->
		<div class="group">
			<input type="text" name="full_name" id="full_name" class="control" placeholder="Enter Full Name">
			<div class="name-error error">
				<?php if(isset($name_error) && !empty(trim($name_error))){ ?>
					<?=$name_error; ?>
				<?php } ?>
			</div>
		</div>
		<!-- div.group -->
		<div class="group">
			<input type="email" name="email" id="email" class="control" placeholder="Enter Email Address">
		</div>
		<!-- div.group -->
		<div class="group">
			<input type="password" name="password" id="password" class="control" placeholder="Enter Password">
		</div>
		<!-- div.group -->
		<div class="group">
			<label for="file" class="file-label" id="file-label"> <i class="fas fa-cloud-upload-alt upload-icon"></i> Upload The Image</label>
			<input type="file" name="img" id="file" class="file" placeholder="Select Image">
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