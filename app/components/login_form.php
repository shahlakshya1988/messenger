<div class="form-area">
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="group">
			<h2 class="form-heading">User Login</h2>
		</div>
		<!-- div.group -->
		<?php if (isset($_SESSION["account_success"])) { ?>
			<div class="group">
				<div class="alert alert-success">
					<?= $_SESSION["account_success"]; ?>
				</div>
			</div>
			<!-- div.group -->
		<?php } unset($_SESSION["account_success"]); ?>
		<div class="group">
			<input type="email" name="email" id="email" class="control" placeholder="Enter Email Address">
		</div>
		<!-- div.group -->
		<div class="group">
			<input type="password" name="password" id="password" class="control" placeholder="Enter Password">
		</div>
		<!-- div.group -->

		<div class="group">
			<input type="submit" name="login" id="login" class="btn account-btn" value="User Login">
		</div>
		<!-- div.group -->
		<div class="group">
			<a href="signup.php" class="link">Signup</a>
		</div>
		<!-- div.group -->
	</form>
</div>