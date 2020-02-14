<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "init.php"; ?>
<?php
if (isset($_POST["signup"])) {
	$full_name = $_POST["full_name"];
	$email = $_POST["email"];
	$password = $_POST["password"];

	$image = $_FILES["img"];
	$image_name = $image["name"];
	$image_tmp_name = $image["tmp_name"];
	$image_error = $image["error"];
	$image_size = $image["size"];
	$name_status = $email_status = $password_status = $img_status = 1; // 1 means every thing ok
	if (empty(trim($full_name))) {
		$name_error = "Full Name is required";
		$name_status = 0;
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
	<title>Create New Account</title>
	<?php include "components/css.php"; ?>
</head>

<body>
	<div class="signup-container">
		<div class="account-left">
			<div class="account-text">
				<h1>Lets Chat</h1>
				<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, autem dicta quae saepe provident delectus, eum reiciendis obcaecati quis ab ex excepturi! Nobis fugiat eum porro iure rem itaque quam maiores in magni quo praesentium optio quis distinctio laudantium nulla dolore, dolorem, voluptates ipsam hic iusto? Aut nostrum perspiciatis vitae blanditiis! Aliquam quas, harum totam dolore ex cum excepturi placeat voluptatum sunt, hic iste consequuntur expedita delectus nesciunt tenetur rem deleniti quae libero assumenda perspiciatis! Expedita eligendi qui minima animi quas ipsum totam dolorem ut. Delectus temporibus voluptate totam, expedita magnam sequi molestiae illum amet, possimus quos eum error. Odio!</p>
			</div>
			<!-- div.account-text -->
		</div>
		<!-- div.account-left -->
		<div class="account-right">
			<!-- <h1>Account Right</h1> -->
			<?php include "components/signup_form.php"; ?>
			<!-- div.form-area -->
		</div>
		<!-- div.account-right -->
	</div>
	<!-- div.signup-container -->
	<?php include "components/js.php"; ?>
	<script type="text/javascript" src="assets/js/formlabel.js"></script>
</body>

</html>