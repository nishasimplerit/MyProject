<?php include('include/header.php'); ?>
<?php
	session_start();
	
	$username=$_SESSION["username"];
	$password=$_SESSION["password"];
	$old=md5($_POST["oldpassword"]);
	$new=md5($_POST["newpassword"]);
	
	
	
	$conn=mysqli_connect("localhost","root","","medico")or die("can not connect");

	
	if ($old!=$password){
		echo "<h7>You have entered an incorrect password. Please Enter the correct password.</h7>" ;
	}
	else{
		$query = "update patient set patient_password='$new' where patient_username='$username'"; 
		$result = mysqli_query($query,$conn); 
				if (!$result) { 
					echo "Problem with query " . $query . "<br/>"; 
				//	echo pg_last_error(); 
					exit(); 
				} 
				else{
					$_SESSION["password"]=$new;
					echo "Password successfully edited.";
				}
	}

	mysqli_close($conn);
	
?>
</div>
</div>
</div>
</body>
</html>