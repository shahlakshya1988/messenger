<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "init.php"; ?>
<?php
$obj = new base_class();
if (isset($_POST["login"])) {
	$email = $obj->security($_POST["email"]);
	$password = $obj->security($_POST["password"]);
	$email_status = $password_status = 1;
	if (empty(trim($email))) {
		$email_error = "Enter Email Address";
		$email_status = 0;
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$email_error = "Enter Proper Email Address";
		$email_status = 0;
	}
	if (empty(trim($password))) {
		$password_error = "Enter Password Address";
		$password_status = 0;
	}
	if ($email_status == 1 && $password_status == 1) {
		$query = "SELECT * FROM `users` where `email` = :email ";
		$param = [":email" => $email];
		$query = $obj->normalQuery($query, $param);
		if ($obj->countRows()) {
			//echo "User Exists";
			// $result = $obj->fetch_all()[0];
			$result = $obj->fetch_single();
			if (password_verify($password, $result->password)) {
				// var_dump($result);
				/** updating user login status to 1 */
				$query = "UPDATE `users` SET `status` = '1' where `id` = :id";
				$param = array(":id" => $result->id);
				$obj->normalQuery($query, $param);
				/** updating user login status to 0*/
				/*** if above operation is successfull then we will do below code */
				if ($obj->countRows()) {
					$obj->createSession("user_name", $result->name);
					$obj->createSession("user_id", $result->id);
					$obj->createSession("user_image", $result->image);

					header("Location: index.php");
					die();
				}else{
					$login_error = "Enter Email/Password Not Found.<br><a href='signup.php'>Signup To Create Account</a>";
				}
				/*** if above operation is successfull then we will do below code */
			} else {
				$login_error = "Enter Email/Password Not Found.<br><a href='signup.php'>Signup To Create Account</a>";
				//var_dump($login_error);
			}
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
	<title>User Login</title>
	<?php include "components/css.php"; ?>
</head>

<body>
	<?php //var_dump($_SESSION); 
	?>
	<?php if (isset($_SESSION["security"])) { ?>
		<div class="flash error-flash">
			<span class="remove">&times;</span>
			<div class="flash-heading">
				<h3> <span class="checked">&#x2715;</span> Error: You Have Done!!!</h3>
			</div>
			<!-- div.flash-heading -->
			<div class="flash-body">
				<p><?= $_SESSION["security"]; ?></p>
			</div>
			<!-- div.flash-body -->
		</div>
		<!-- div.flash -->
	<?php }
	unset($_SESSION["security"]); ?>
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
			<?php include "components/login_form.php"; ?>
			<!-- div.form-area -->
		</div>
		<!-- div.account-right -->
	</div>
	<!-- div.signup-container -->
	<?php include "components/js.php"; ?>
</body>

</html>