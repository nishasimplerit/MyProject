<?php
	require "dbconnect.php";
		$username = $_POST['input_uname'];
		$password = md5($_POST['input_pword']);
		
		
		if($username== 'admin' && $password== md5('medico') ){
			$_SESSION["login"] = 1;
			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;
			header("Location: manage_regrequest.php");
			exit;
		}
		else{
			header("Location:passwordwrong.php");
		}
		mysqli_close($conn);
	/*}
	else{
		header('Location: dBoardDoctor.php');
	}*/

?>