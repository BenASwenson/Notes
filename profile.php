<?php
session_start();
if(!isset($_SESSION['user_id'])){
	header("location: index.php");
}
include('connection.php');
$user_id = $_SESSION['user_id'];

//get username and email
$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);
if(!$result){
	echo "<div class='alert alert-danger'>There was an error with the query.</div>";
	exit;
}
$count = mysqli_num_rows($result);
if($count == 1){
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$username = $row['username'];
	$email = $row['email'];
}else{
	echo "There was an error retrieving the username and email from the database";
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link href="styling.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Truculenta:wght@500&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Profile</title>
	<style>
		#container{
			margin-top: 120px; 
		}
		#allNotes, #done, #notepad{
			display: none;
		}
		.buttons{
			margin-bottom: 20px;
		}
		textarea{
			width: 100%;
			max-width: 100%;
			font-size: 18px;
			line-height: 1.5em;
			border-left-width: 20px;
			border-color: rgb(245,138,6);
			background-color: #F5DAB9;
			padding: 10px;
		}
		tr{
			cursor: pointer;
		}
	</style>
  </head>
  <body>
	  <!--Navigation Bar-->
	  <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #f4b961;" role="navigation">
		  <div class="container-fluid">
			  <a class="navbar-brand" href="#">Notes</a>
			  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
					  <li class="nav-item">
						  <a class="nav-link active" aria-current="page" href="#">Profile</a>
					  </li>
					  <li class="nav-item">
						  <a class="nav-link" href="#">Help</a>
					  </li>
					  <li class="nav-item">
						  <a class="nav-link" href="#">Contact Us</a>
					  </li>
					  <li class="nav-item">
						  <a class="nav-link" href="mainpageloggedin.php">My Notes</a>
					  </li>
				  </ul>
				  <ul class="navbar-nav mb-2 mb-lg-0">
					  <li class="nav-item">
						  <a href="#" class="nav-link">Logged in as <b><?php echo $username; ?></b></a>
					  </li>
					  <li class="nav-item">
						  <a class="nav-link" href="index.php?logout=1">Log out</a>
					  </li>
				  </ul>
			  </div>
			  
			  
		  </div>
	  </nav>
	  
<!--Container-->
	  <div class="container" id="container">
		  <div class="row">
			  <div class="col-md-6 offset-md-3">
				  <h2>General Account Settings:</h2>
				  <div class="table-responsive">
					  <table class="table table-hover table-condensed table-bordered">
						  <tr data-bs-target="#updateusername" data-bs-toggle="modal">
							  <td>Username</td>
							  <td><?php echo $username; ?></td>
						  </tr>
						  <tr data-bs-target="#updateemail" data-bs-toggle="modal">
							  <td>Email</td>
							  <td><?php echo $email; ?></td>
						  </tr>
						  <tr data-bs-target="#updatepassword" data-bs-toggle="modal">
							  <td>Password</td>
							  <td>Hidden</td>
						  </tr>
					  </table>
				  </div>
				  
			  </div>
			 
		  </div>
	  </div>
	  
	  <!--Update username-->
	  <form method="post" id="updateusernameform">
		  <div class="modal" id="updateusername" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				  <div class="modal-content">
					  <div class="modal-header">
						  <h4 id="myModalLabel">Edit Username:</h4>
						  <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
							  <span aria-hidden="true">&times;</span>
						  </button>
					  </div>
					  <div class="modal-body">
						  
						  <!--Update username message from php file-->
						  <div id="updateusernamemessage"></div>
						  
							  <div class="mb-3">
								  <label for="username">Username:</label>
								  <input type="text" class="form-control" name="username" maxlength="30" id="username" value="<?php echo $username; ?>">
							  </div>
							  
							  
					  </div>
					  <div class="modal-footer"> 
						  <div>
							  <input type="submit" class="btn orange" name="updateusername" value="Submit">
						  	  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
						      	Cancel
						      </button>
						  </div>	  
					  </div>
				  </div>
			  </div>
		  </div>
	  </form>
	  
	  <!--Update Email-->
	  <form method="post" id="updateemailform">
		  <div class="modal" id="updateemail" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				  <div class="modal-content">
					  <div class="modal-header">
						  <h4 id="myModalLabel">Enter new email:</h4>
						  <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
							  <span aria-hidden="true">&times;</span>
						  </button>
					  </div>
					  <div class="modal-body">
						  
						  <!--Update Email message from php file-->
						  <div id="updateemailmessage"></div>
						  
							  <div class="mb-3">
								  <label for="email">Email</label>
								  <input type="email" class="form-control" name="email" maxlength="50" id="email" value="<?php echo $email; ?>">
							  </div>
							  
							  
					  </div>
					  <div class="modal-footer"> 
						  <div>
							  <input type="submit" class="btn orange" name="updateusername" value="Submit">
						  	  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
						      	Cancel
						      </button>
						  </div>	  
					  </div>
				  </div>
			  </div>
		  </div>
	  </form>
	  
	  <!--update password-->
	  <form method="post" id="updatepasswordform">
		  <div class="modal" id="updatepassword" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				  <div class="modal-content">
					  <div class="modal-header">
						  <h4 id="myModalLabel">Enter Current and New Password:</h4>
						  <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
							  <span aria-hidden="true">&times;</span>
						  </button>
					  </div>
					  <div class="modal-body">
						  
						  <!--Update password message from php file-->
						  <div id="updatepasswordmessage"></div>
						  
							  <div class="mb-3">
								  <label for="currentpassword" class="visually-hidden">Your current password:</label>
								  <input type="password" class="form-control" name="currentpassword" maxlength="30" id="currentpassword" placeholder="Your Current Password">
							  </div>
						      <div class="mb-3">
								  <label for="password" class="visually-hidden">Choose a password:</label>
								  <input type="password" class="form-control" name="password" maxlength="30" id="password" placeholder="Choose a Password">
							  </div>
						      <div class="mb-3">
								  <label for="password2" class="visually-hidden">Confirm password:</label>
								  <input type="password" class="form-control" name="password2" maxlength="30" id="password2" placeholder="Confirm password">
							  </div> 						  
					  </div>
					  <div class="modal-footer"> 
						  <div>
							  <input type="submit" class="btn orange" name="updateusername" value="Submit">
						  	  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
						      	Cancel
						      </button>
						  </div>	  
					  </div>
				  </div>
			  </div>
		  </div>
	  </form>

	  <!--Footer-->
	  <div class="footer">
		  <div class="container">
			  <p>benswenson.com Copyright &copy; <?php $today = date('Y'); echo $today ?></p>
		  </div>
	  </div>
    


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script src="profile.js"></script>

    
  </body>
</html>