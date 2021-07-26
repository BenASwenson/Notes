<?php
session_start();
if(!isset($_SESSION['user_id'])){
	header("location: index.php");
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
	

    <title>My Notes</title>
	<style>
		#container{
			margin-top: 120px; 
		}
		#allNotes, #done, #notepad, .delete{
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
		.noteheader{
/*			border: 1px solid white;*/
			border-radius: 10px;
			margin-bottom: 10px;
			cursor: pointer;
			padding: 0 10px;
			background: rgba(245,138,6,0.7);
		}
		.text{
			font-size: 20px;
			overflow: hidden;
			white-space: nowrap;
			text-overflow: ellipsis;
		}
		.timetext{
			overflow: hidden;
			white-space: nowrap;
			text-overflow: ellipsis;
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
						  <a class="nav-link" aria-current="page" href="profile.php">Profile</a>
					  </li>
					  <li class="nav-item">
						  <a class="nav-link" href="#">Help</a>
					  </li>
					  <li class="nav-item">
						  <a class="nav-link" href="#">Contact Us</a>
					  </li>
					  <li class="nav-item">
						  <a class="nav-link active" href="#">My Notes</a>
					  </li>
				  </ul>
				  <ul class="navbar-nav mb-2 mb-lg-0">
					  <li class="nav-item">
						  <a href="#" class="nav-link">Logged in as <b><?php echo $_SESSION['username']?></b></a>
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
		  <!--Alert Message-->
		  <div id="alert" class="alert alert-danger collapse" role="alert">
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			  <p id="alertContent"></p>
		  </div>
		  <div class="row">
			  <div class="col-md-6 offset-md-3">
				  <div class="buttons">
					  <button type="button" id="addNote" class="btn orange btn-lg">Add Note</button>
					  <button type="button" id="allNotes" class="btn orange btn-lg">All Notes</button>
					  <button type="button" id="edit" class="btn orange btn-lg float-end">Edit</button>
					  <button type="button" id="done" class="btn btn-info btn-lg float-end">Done</button>
					  
				  </div>
				  <div id="notepad">
					  <textarea rows="10"></textarea>
				  </div>
				  <div id="notes" class="notes">
					  <!--Ajax call to php file-->
				  </div>
			  </div>		 
		  </div>
	  </div>
	 	  
	  <!--Footer-->
	  <div class="footer">
		  <div class="container">
			  <p>benswenson.com Copyright &copy; <?php $today = date('Y'); echo $today ?></p>
		  </div>
	  </div>
    
	  
	  
	  
	  
	  
	  
	  

    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script src="mynotes.js"></script>
	
	

    
  </body>
</html>