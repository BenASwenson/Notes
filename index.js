//Ajax Call for the sign up form
//Once the form is submitted
$('#signupform').submit(function(event){
	//prevent default php processing
	event.preventDefault();
	//collect user inputs
	var datatopost = $(this).serializeArray();
//	console.log(datatopost);
	//send them to signup.php using Ajax
	$.ajax({
		url: "signup.php",
		type: "POST",
		data: datatopost,
		success: function(data){
			if(data){
				$('#signupmessage').html(data);
			}
		},
		error: function(){
			$('#signupmessage').html("<div class='alert alert-danger'>There was an error with the Ajax Call! Please try again later.</div>");
		}
	});
	
});
	
	
	
		

//Ajax Call for the login form
//Once the form is submitted
$('#loginform').submit(function(event){
	//prevent default php processing
	event.preventDefault();
	//collect user inputs
	var datatopost = $(this).serializeArray();
	//send them to login.php using Ajax
	$.ajax({
		url: "login.php",
		type: "POST",
		data: datatopost,
		success: function(data){
			//Ajax Call successful
			//if php files returns "success": redirect the user to notes page
			if(data == "success"){
				window.location = "mainpageloggedin.php";
			}else{
				//otherwise show error message
				$('#loginmessage').html(data);
			}
		},
		error: function(){
			//Ajax Call fails: show Ajax Call error
			$('#loginmessage').html("<div class='alert alert-danger'>There was an error with the Ajax Call! Please try again later.</div>");
		}
	});
})
		

//Ajax Call for the forgot password form
//Once the form is submitted
$('#forgotpasswordform').submit(function(event){
	//prevent default php processing
	event.preventDefault();
	//collect user inputs
	var datatopost = $(this).serializeArray();
	//send them to login.php using Ajax
	$.ajax({
		url: 'forgotpassword.php',
		type: 'POST',
		data: datatopost,
		success: function(data){
			//Ajax Call successful: show error or success message
			$('#forgotpasswordmessage').html(data);
		},
		error: function(){
			$('#forgotpasswordmessage').html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
		}
	});
	
	
});

	
	
	
		
		//Ajax Call fails: show Ajax Call error