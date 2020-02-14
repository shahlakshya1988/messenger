<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "init.php"; ?>
<?php
$obj = new base_class(); 
if(isset($_POST["login"])){
	$email = $obj->security($_POST["email"]);
	$password = $obj->security($_POST["password"]);
	$email_status = $password_status = 1;
	if(empty(trim($email))){
		$email_error = "Enter Email Address";
		$email_status = 0;
	}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$email_error = "Enter Proper Email Address";
		$email_status = 0;
	}
	if(empty(trim($password))){
		$password_error = "Enter Password Address";
		$password_status = 0;
	}
	if($email_status == 1 && $password_status == 1){
		$query = "SELECT * FROM `users` where `email` = :email ";
		$param = [":email"=>$email];
		$query = $obj->normalQuery($query,$param);
		if($obj->countRows()){
			//echo "User Exists";
			// $result = $obj->fetch_all()[0];
			$result = $obj->fetch_single();
			if(password_verify($password,$result->password)){
				// var_dump($result);
				$obj->createSession("user_name",$result->name);
				$obj->createSession("user_id",$result->id);
				header("Location: index.php");
				die();
			}else{
				$login_error="Enter Email/Password Not Found.<br><a href='signup.php'>Signup To Create Account</a>";
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