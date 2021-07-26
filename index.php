<?php
session_start();
include('connection.php');

//remember me
include('rememberme.php');

//logout
include('logout.php');


?>

<!DOCTYPE html>
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

    <title>Online Notes</title>
	
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
						  <a class="nav-link active" aria-current="page" href="#">Home</a>
					  </li>
					  <li class="nav-item">
						  <a class="nav-link" href="#">Help</a>
					  </li>
					  <li class="nav-item">
						  <a class="nav-link" href="#">Contact Us</a>
					  </li>
				  </ul>
				  <ul class="navbar-nav">
					  <li class="nav-item float-end">
						  <a class="nav-link" href="#loginModal" data-bs-toggle="modal">Login</a>
					  </li>
				  </ul>
			  </div>
			  
			  
		  </div>
	  </nav>
	  
	  <!--Jumbotron with Sign up Button-->
	  <div class="jumbotron" id="myContainer">
		  <h1>Online Notes</h1>
		  <p>Your Notes with you wherever you go.</p>
		  <p>Easy to use, protects all your notes!</p>
		  <button type="button" class="btn btn-lg orange signup" data-bs-target="#signupModal" data-bs-toggle="modal">Sign up-It's free</button>
	  </div>
	  
	  <!--Login form-->
	  <form method="post" id="loginform">
		  <div class="modal" id="loginModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				  <div class="modal-content">
					  <div class="modal-header">
						  <h4>Login:</h4>
						  <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
							  <span aria-hidden="true">&times;</span>
						  </button>
					  </div>
					  <div class="modal-body">
						  
						  <!--Login message from php file-->
						  <div id="loginmessage"></div>
						  
							  <div class="mb-3">
								  <label for="loginemail" class="visually-hidden">Email:</label>
								  <input type="email" class="form-control" name="loginemail" placeholder="Email" maxlength="50" id="loginemail">
							  </div>
							  <div class="mb-3">
								  <label for="loginpassword" class="visually-hidden">Password:</label>
								  <input type="password" class="form-control" name="loginpassword" placeholder="Password" maxlength="30" id="loginpassword">
							  </div>
							  <div class="form-check">
								  
								  <label class="form-check-label">
									  <input class="form-check-input" type="checkbox" id="rememberme" name="rememberme">
									  Remember me
								  </label>
								  <a class="float-end" style="cursor: pointer" data-bs-dismiss="modal" data-bs-target="#forgotpasswordModal" data-bs-toggle="modal">
								  Forgot Password?
							      </a>
							  </div>
					  </div>
					  <div class="modal-footer justify-content-between">
						  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" data-bs-target="#signupModal" data-bs-toggle="modal">
							  Register
						  </button>
						  <div>
							  <input type="submit" class="btn orange" name="login" value="Login">
						  	  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
						      	Cancel
						      </button>
						  </div>
						  
						  
					  </div>
				  </div>
			  </div>
		  </div>
	  </form>
	  
	  <!--Sign up form-->
	  <form method="post" id="signupform">
		  <div class="modal" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				  <div class="modal-content">
					  <div class="modal-header">
						  <h4>Sign up today and Start using our Online Notes App!</h4>
						  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
						  </button>
					  </div>
					  <div class="modal-body">
						  
						  <!--Sign up message from php file-->
						  <div id="signupmessage"></div>
						  
						  <form>
							 <div class="mb-3">
								 <label for="username" class="visually-hidden">Username:</label>
								 <input type="text" class="form-control" name="username" placeholder="Username" maxlength="30" id="username">
							 </div>
							 <div class="mb-3">
								 <label for="email" class="visually-hidden">Email:</label>
								 <input type="email" class="form-control" name="email" placeholder="Email Address" maxlength="50" id="email">
							 </div>
							 <div class="mb-3">
								 <label for="password" class="visually-hidden">Choose a Password:</label>
								 <input type="password" class="form-control" name="password" placeholder="Password" maxlength="30" id="password">
							 </div>
							 <div class="mb-3">
								 <label for="password2" class="visually-hidden">Confirm Password:</label>
								 <input type="password" class="form-control" name="password2" placeholder="Confirm Password" maxlength="30" id="password2">
							 </div>
						  </form>
					  </div>
					  <div class="modal-footer">
						  <input type="submit" class="btn orange" name="signup" value="Sign up">
						  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
						  
					  </div>
				  </div>
			  </div>
			  
		  </div>
		  
		  
	  </form>
	  
	  <!--Forgot password form-->
	  <form method="post" id="forgotpasswordform">
		  <div class="modal" id="forgotpasswordModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				  <div class="modal-content">
					  <div class="modal-header">
						  <h4>Forgot Password? Enter your email address:</h4>
						  <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
							  <span aria-hidden="true">&times;</span>
						  </button>
					  </div>
					  <div class="modal-body">
						  
						  <!--forgot password message from php file-->
						  <div id="forgotpasswordmessage"></div>
						  
						  <div class="mb-3">
							  <label for="forgotemail" class="visually-hidden">Email</label>
							  <input type="email" class="form-control" name="forgotemail" placeholder="Email" id="forgotemail">
						  </div>
					  </div>
					  <div class="modal-footer justify-content-between">
						  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" data-bs-target="#signupModal" data-bs-toggle="modal">
							  Register
						  </button>
						  <div>
							  <input type="submit" class="btn orange" name="forgotpassword" value="Submit">
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
	
	<script src="index.js"></script>
	

    
  </body>
</html>