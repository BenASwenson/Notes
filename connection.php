<?php

//Connect to the database
$link = mysqli_connect("localhost", "benswens_notes", "andrew77", "benswens_notes");
if(mysqli_connect_error()){
	die("Error: Unable to connect: " . mysqli_connect_error());
}


?>