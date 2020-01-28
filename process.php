<?php 
	include 'connection.php';

	if (isset($_POST['submit'])) {

		$user = mysqli_real_escape_string($conn, $_POST['user']);
		$message = mysqli_real_escape_string($conn, $_POST['message']);

		//set timezone
		// date_default_timezone_set("Asia/Nepal");
		$time = date('h:i:s',time());


		//validate the form 
		if (!isset($user) || $user =='' || !isset($message) || $message=='') {
			$error = "please fill username and message";
			header('Location:index.php?error='.urlencode($error));
			exit();
		}
		else{
			$query = "INSERT INTO shouts(user,message,time) VALUES('$user','$message','$time')";
			if (!mysqli_query($conn,$query)) {
				die('Error:'.mysqli_error($conn));
			}
			else{
				header('Location:index.php');
				exit();
			}
		}
	}
 ?>