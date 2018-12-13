<?php
	session_start();
	
	$username = "";
	$email = "";
	$errors = array();


	$db = mysqli_connect("localhost","mybd_user","123","users");

	if (isset($_POST['register'])) {
		$username = mysql_real_escape_string($_POST['username']);
		$email = mysql_real_escape_string($_POST['email']);
		$password_1 = mysql_real_escape_string($_POST['password_1']);
		$password_2 = mysql_real_escape_string($_POST['password_2']);
		


		if (empty($username)) {
			array_push($errors, "username is required");
		}
		if (empty($email)) {
			array_push($errors, "email is required");
		}
		if (empty($password_1)) {
			array_push($errors, "password is required");
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
	 	if (count($errors) ==  0) {
	 		$password = md5($password_1);
	 		$sql = "INSERT INTO uname (uname, email,pass)
	 						VALUES ('$username', '$email','$password')";
	 		mysqli_query($db,$sql);
	 		$_SESSION['username'] = $username;
	 		$_SESSION['success'] = "you are logged in";
	 		header('location:index.php');

	 	}
 	}

	if (isset($_POST['login'])) {
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		
		if (empty($username)) {
			array_push($errors, "username is required");
		}
		if (empty($password)) {
			array_push($errors, "password is required");
		}
		
		if (count($errors) == 0 ) {
			$password = md5($password);
			$query = "SELECT * FROM uname WHERE uname = '$username' AND pass= '$password'";
			$result = mysqli_query($db,$query);
			if (mysqli_num_rows($result) == 1) {

				$_SESSION['username'] = $username;
		 		$_SESSION['success'] = "you are logged in";
		 		header('location:index.php');
			}else {
				array_push($errors, "wrong username/password combination");
			}
		}
	}


	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: login.php');
	}
?>


