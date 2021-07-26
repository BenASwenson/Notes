<!--This file receives: user_id, generated key to reset password, password1 and password2-->
<!--This file then resets password for user_id if all checks are correct-->

<?php
session_start();
include('connection.php');

//If user_id or activation key is missing
if(!isset($_POST['user_id']) || !isset($_POST['key'])){
	//print error message
	echo "<div class='alert alert-danger'>There was an error. Please click on the link you received by email.</div>"; exit;	
}
//store them in two variables
$user_id = $_POST['user_id'];
$key = $_POST['key'];
//define a time variable: now minus 24 hours
$time = time() - 86400;
//prepare variables for the query
$user_id = mysqli_real_escape_string($link, $user_id);
$key = mysqli_real_escape_string($link, $key);
//run query: check combination of user_id & key exists and less than 24h old
$sql = "SELECT * FROM forgotpassword WHERE user_id='$user_id' AND rkey='$key' AND time > '$time' AND status='pending'";
$result = mysqli_query($link, $sql);
if(!$result){
	echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
}
//if combination does not exist
		//print error message
$count = mysqli_num_rows($result);
if(!$count){
	echo '<div class="alert alert-danger">Please try again.</div>';
	exit;
}
//define error messages
$missingPassword = "<p><strong>Please enter a Password!</strong></p>";
$invalidPassword = "<p><strong>Your password should be at least 6 characters long and include a capital letter and one number!</strong></p>";
$differentPassword = "<p><strong>Passwords don't match!</strong></p>";
$missingPassword2 = "<p><strong>Please confirm your password!</strong></p>";

//get user inputs: password1 and password2
if(empty($_POST['password'])){
	$errors .= $missingPassword;
}elseif(!(strlen($_POST['password'])>6
		 and preg_match('/[A-Z]/', $_POST['password'])
		 and preg_match('/[0-9]/', $_POST['password']))){
	$errors .= $invalidPassword;
}else{
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
}

if(empty($_POST['password2'])){
	$errors .= $missingPassword2;
}else{
	$password2 = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);
	if($password !== $password2){
		$errors .= $differentPassword;
	}
}
if($errors){
	$resultMessage = "<div class='alert alert-danger'>" . $errors . "</div>";
	echo $resultMessage;
	exit;
}

//prepare variables for the query
$password = mysqli_real_escape_string($link, $password);
$password = hash('sha256', $password);
$user_id = mysqli_real_escape_string($link, $user_id);

//Run query: update users password in the users table
$sql = "UPDATE users SET password='$password' WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);
if(!$result){
	echo "<div class='alert alert-danger'>There was a problem storing the new password!</div>";
	exit;
}

//set the key status to 'used' in the forgotpassword table to prevent the key from being used twice
$sql = "UPDATE forgotpassword SET status='used' WHERE rkey='$key' AND user_id='$user_id'";
$result = mysqli_query($link, $sql);
if(!$result){
	echo "<div class='alert alert-danger'>Error running the query</div>";
}else{
	//print success message
	echo "<div class='alert alert-success'>Your password has been successfully updated!<a href='index.php'>Login</a></div>";
}


?>