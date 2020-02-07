<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width;initial-scale=1.0,shrink-to-fit=no">
	<title>Create New Account</title>
	<link rel="stylesheet" href="assets/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	<!-- font-family: 'Poppins', sans-serif; -->	
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="signup-container">
		<div class="account-left">
			<h1>Account Left</h1>
		</div>
		<!-- div.account-left -->
		<div class="account-right">
			<!-- <h1>Account Right</h1> -->
			<div class="form-area">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="group">
						<input type="text" name="full_name" id="full_name" class="control" placeholder="Enter Full Name">
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
						<label for="img" class="file-label">Upload The Image</label>
						<input type="file" name="img" id="img" class="file" placeholder="Select Image">
					</div>
					<!-- div.group -->
					<div class="group">
						<input type="submit" name="signup" id="signup" class="btn btn-signup" value="Create Account">
					</div>
					<!-- div.group -->
				</form>
			</div>
			<!-- div.form-area -->
		</div>
		<!-- div.account-right -->
	</div>
	<!-- div.signup-container -->
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
</body>
</html>