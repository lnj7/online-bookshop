<?php
	session_start();
	if(!isset($_POST['submit'])){
		echo "Something wrong! Check again!";
		exit;
	}
	require_once "./functions/database_functions.php";
	$conn = db_connect();

     $pas = trim($_POST['pas']);
	$rpas= trim($_POST['rpas']);

	if($pas == "" || $rpas == ""){
		echo "Pass is empty!";
		exit;
	}

	$email = mysqli_real_escape_string($conn, $pas);
	$passw = mysqli_real_escape_string($conn, $rpas);
	$passw = sha1($pas);

	$query = "SELECT pas,rpas from register";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Empty data " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);

	if($pas != $row['pas'] && $rpas != $row['rpas']){
		echo "password is not match. please enter again!";
		$_SESSION['registerion'] = false;
		exit;
	}

	if(isset($conn)) {mysqli_close($conn);}
	header("Location: index.php");
?>