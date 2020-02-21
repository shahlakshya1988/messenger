<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "init.php"; ?>
<?php
$obj = new base_class();
if(isset($_SESSION["user_id"])){
	header("Location: index.php");
	die();
}
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
				$clean_status = $result->clean_status;

				/** updating user login status to 1 */
				$query = "UPDATE `users` SET `status` = '1' where `id` = :id";
				$param = array(":id" => $result->id);
				$obj->normalQuery($query, $param);
				/** updating user login status to 0*/
				/*** if above operation is successfull then we will do below code */
				if($clean_status == 0){
					/** getting the last messages_id */
					$query = "SELECT message_id from `messages` order by `message_id` DESC limit 1";
					$obj->normalQuery($query);
					$result_message_id = $obj->fetch_single();
					$last_message_id = $result_message_id->message_id;
					// we will starting fetching messages from this id
					// old message_id will be skipped
					$last_message_id++; 
					//var_dump($last_message_id);
					//die();
					/** getting the last messages_id */
					/*** insert the values in clean table */
					$query = "INSERT INTO `clean` (`clean_message_id`,`clean_user_id`) values (:clean_message_id,:clean_user_id)";
					$param = array(":clean_message_id"=>$last_message_id,":clean_user_id"=>$result->id);
					$obj->normalQuery($query,$param);
					if($obj->countRows()){
						$update_query = "UPDATE `users` SET `clean_status` = '1' where `id` = :id";
						$param = array(":id"=>$result->id);
						$obj->normalQuery($update_query,$param);
					}
					//die();
					/*** insert the values in clean table */
					
				}else{
					
				}
				$obj->createSession("user_name", $result->name);
				$obj->createSession("user_id", $result->id);
				$obj->createSession("user_image", $result->image);
				$obj->createSession("session_id", session_id());
				/*** inserting this session id into the table */
				/*** first of all we will check if the user is inside of the table */
				$query = "SELECT `id` from `user_sessions` where `user_id` = :user_id";
				$param = array(":user_id"=>$_SESSION["user_id"]);
				$obj->normalQuery($query,$param);
				if($obj->countRows()){
					$del_user = "DELETE FROM `user_sessions` where `user_id` = :user_id and `session_id` != :session_id ";
					$param = array(":session_id"=>$_SESSION["session_id"],":user_id"=>$_SESSION["user_id"]);
					//$obj->normalQuery($del_user,$param);
				}
				/*** first of all we will check if the user is inside of the table */
				$query = "INSERT INTO `user_sessions` (`session_id`,`user_id`) values (:session_id,:user_id)";
				$param = array(":session_id"=>$_SESSION["session_id"],":user_id"=>$_SESSION["user_id"]);
				$obj->normalQuery($query,$param);
				/*** inserting this session id into the table */
				header("Location: index.php");
				die();
				
				if ($obj->countRows()) {
					
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