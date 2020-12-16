<?php
	session_start();
	if(!isset($_POST['submit'])){
		echo "Something wrong! Check again!";
		exit;
	}
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$email = trim($_POST['email']);
	$passw = trim($_POST['passw']);

	if($email == "" || $passw == ""){
		echo "Email or Pass is empty!";
		exit;
	}

	$email = mysqli_real_escape_string($conn, $email);
	$passw = mysqli_real_escape_string($conn, $passw);
	$passw = sha1($passw);

	// get from db
	$query = "SELECT email, passw from userlogin";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Empty data " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);

	if($email != $row['email'] && $passw != $row['passw']){
		echo "Email or pass is wrong. Check again!";
		$_SESSION['userlogin'] = false;
		exit;
	}

	if(isset($conn)) {mysqli_close($conn);}
	header("Location: index.php");
?>