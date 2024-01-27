<?php include('include/login_doctor_header.php'); ?>

<html>
	<head>
		<title>Edit Doctor's Profile</title>
	</head>
	<body>
		<?php
			
			
			$username=$_SESSION["username"];
			
			
			$query="SELECT `doctor_username`, `doctor_password`, `doctor_email`, `doctor_lname`, `doctor_fname`, `doctor_specialization`, `doctor_hospital`, `contactno`, `doctor_licenseno` FROM `doctor` WHERE doctor_username='{$username}';";
			$result = mysqli_query($conn,$query); 
			
			$rows = mysqli_num_rows($result);
			
			for ($i=0; $i<$rows; $i++){
				$tuple = mysqli_fetch_array($result);
				$fname=$tuple['doctor_fname'];
				$lname=$tuple['doctor_lname'];
				$email=$tuple['doctor_email'];
				$specialization=$tuple['doctor_specialization'];
				$hospital=$tuple['doctor_hospital'];
				
				$licenseno=$tuple['doctor_licenseno'];
				
				$contactno=$tuple['contactno'];
			}
			echo
			"<form action='process_editDoctorProfile.php' method='post'>
				<table>
				<tr>
					<td> Name: </td>
					<td> <input type='text' name='fName' value='$fname' required='required'> </td>
					<td> <input type='text' name='lName' value='$lname' required='required'> </td>
				</tr>
				<tr>
					<td> Email: </td>
					<td> <input type='text' name='email' value='$email'> </td>
				</tr>
				<tr>
					<td> Specialization: </td>
					<td> <input type='text' name='specialization' value='$specialization'> </td>
				</tr>
				<tr>
					<td> Hospital: </td>
					<td><input type='text' name='hospital' value='$hospital' required='required' /></td>
				</tr>
				
				<tr>
					<td> LicenseNo: </td>
					<td> <input type='text' name='licenseno' value='$licenseno' required='required'> </td>
				</tr>
				
				
				<tr>
					<td> Contact Information: </td>
					<td> <input type='text' name='contactNum' value='$contactno' required='required'> </td>
				</tr>
				</table>
				<input type='submit' name='submit'/>
				</form>";
			mysqli_close($conn);
		?>
	</body>
</html>