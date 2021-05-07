<?php 
session_start();
include "dbconn.php";
if(isset($_POST['username']) && isset($_POST['password'])){
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$uname	 = validate($_POST['username']);
	$pass = validate($_POST['password']);

	if(empty($uname)){
		header("Location: indexlogin.php?error=Username is required");
		exit();
	}else if(empty($pass)){
		header("Location: indexlogin.php?error=Password is required");
		exit();
	}else{
		$sql = "SELECT * FROM myuser WHERE username='$uname' AND password = '$pass'";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) === 1){
			$row = mysqli_fetch_assoc($result);	
			if($row['username'] === $uname && $row['password'] === $pass){
				$_SESSION['username'] = $row['username'];
				$_SESSION['password'] = $row['password'];
				header("Location: indexlogin.php");
				exit();
			
			}else{
			header("Location: indexlogin.php?error=Incorrect Username or Password");
			exit();
		}

		}else{
			header("Location: indexlogin.php?error=Incorrect Username or Password");
			exit();
		}
	}
}
else{
	header("Location: .php?error=Login Successful!");
	exit();
}

?>
