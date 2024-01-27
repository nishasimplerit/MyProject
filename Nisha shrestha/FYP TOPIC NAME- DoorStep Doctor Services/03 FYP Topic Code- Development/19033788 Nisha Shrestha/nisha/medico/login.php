<?php
	require "dbconnect.php";
	require "include/header.php";
		$username = $_POST['input_uname'];
		$password = md5($_POST['input_pword']);
		$a=0;
		$b=0;
		$c=0;
		$d=0;
		$e=0;
		$f=0;		
		$resultCheck1=mysqli_query($conn,"select patient_username from patient where patient_username='{$username}' and patient_password!='{$password}'");
		$resultCheck2=mysqli_query($conn,"select patient_username from patient where patient_username='{$username}' and patient_password='{$password}'");
		$resultCheck3=mysqli_query($conn,"select doctor_username from doctor where doctor_username='{$username}' and doctor_password!='{$password}'");
		$resultCheck4=mysqli_query($conn,"select doctor_username from doctor where doctor_username='{$username}' and doctor_password='{$password}'");
		$resultCheck5=mysqli_query($conn,"select pharmacy_username from pharmacy where pharmacy_username='{$username}' and pharmacy_password!='{$password}'");
		$resultCheck6=mysqli_query($conn,"select pharmacy_username from pharmacy where pharmacy_username='{$username}' and pharmacy_password='{$password}'");
		
		while($myrow = mysqli_fetch_assoc($resultCheck1)) {	//patient username
			$a=$a+1;
		}
		while($myrow = mysqli_fetch_assoc($resultCheck2)) {	//patient username and password
			$b=$b+1;
		}
		while($myrow = mysqli_fetch_assoc($resultCheck3)) {	//doctor username
			$c=$c+1;
		}
		while($myrow = mysqli_fetch_assoc($resultCheck4)) {	//doctor username and password
			$d=$d+1;
		}
		while($myrow = mysqli_fetch_assoc($resultCheck5)) {	//pharmacy username
			$e=$e+1;
		}
		while($myrow = mysqli_fetch_assoc($resultCheck6)) {	//pharmacy username and password
			$f=$f+1;
		}
		
		if (($a==0 && $b==0) && ($c==0 && $d==0) && ($e==0 && $f==0)){
			echo "Username does not exist.";/*printing a message*/
		}else if($a!=0 || $c!=0 || $e!=0){
			echo "Password did not match.";/*printing a message*/
		}else if($b!=0){
			$result = mysqli_query($conn,"select patient_deleted from patient where patient_username='{$username}'");/*query to check if the patient is deleted or not*/
			$status = mysqli_fetch_row($result);

			if($status[0] == "n"){
				$_SESSION["login"] = 1;
				$result = mysqli_query($conn,"select patient_fname from patient where patient_username='{$username}'");/*query to select patient formdatabase*/
				$name = mysqli_fetch_row($result);
				$_SESSION["name"] = $name[0];
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				header("Location: dboardPatient.php");/*link to another page*/
				exit;
			}
			else{
				echo "Account Deleted, Please Contact administrator";/*pringting a message*/
			}
		}else if($d!=0){
			$result = mysqli_query($conn,"select doctor_deleted from doctor where doctor_username='{$username}'");/*query to cjeck if the doctor is delted or not*/
			$status = mysqli_fetch_row($result);
			if($status[0] == "n"){
				$_SESSION["login"] = 2;
				$result = mysqli_query($conn,"select doctor_fname from doctor where doctor_username='{$username}'");
				$name = mysqli_fetch_row($result);
				$_SESSION["name"] = $name[0];
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				header("Location: dboardDoctor.php");/*link to another page*/
				exit;
			}
			else{
				echo "Account Deleted, please contact the administrator";
			}
		}
		else if($f!=0){
			$result = mysqli_query($conn,"select pharmacy_deleted from pharmacy where pharmacy_username='{$username}'");/*query to check whether ther user is deleted or not*/
			$status = mysqli_fetch_row($result);
			if($status[0] == "n"){
				$_SESSION["login"] = 3;
				$result = mysqli_query($conn,"select pharmacy_username from pharmacy where pharmacy_username='{$username}'");
				$name = mysqli_fetch_row($result);
				$_SESSION["name"] = $name[0];
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				header("Location: dboardPharmacy.php");
				exit;
			}
			else{
				echo "Account Deleted, please contact the administrator";
			}
		}
		mysqli_close($conn);
	
?>