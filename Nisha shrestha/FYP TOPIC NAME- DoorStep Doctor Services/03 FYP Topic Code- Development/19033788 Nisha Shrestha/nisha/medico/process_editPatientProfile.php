<?php include('include/loginheader.php'); ?>

<html>
	<head>
		<title>Healthcare System</title>
		<link rel="stylesheet" type="text/css" href="CSS/dboardCSS.css">

	</head>
	
<body>
<div id = "menu_container">
		<div id="menu_wrapper">
			<ul class = "main_menu_left">
					<li> <a class="top_menu" href = "dboardPatient.php"> Dashboard </a> </li>
					<li> <a class="top_menu" href = "patient_profile.php"> &nbsp;&nbsp;&nbsp;&nbsp;Profile&nbsp;&nbsp;&nbsp;&nbsp; </a> </li>
					<li> <a class="top_menu" href = "appointments_patient.php"> Appointment </a> </li>
					
			</ul>
			
			<ul class = "main_menu_right">
				<li> 
					<form name='searchpatient' action='search_doctor.php' method='post'>
					
						Search by: 
						<select name="searchtype" id = "option">
							<option name="specialty">Sickness</option>
							<option name="name">Name</option>
							<option name="hospital">Hospital</option>
						</select>
						<input class="searchbar"type='text' name='searchinput' />
						</form>
					</li>
				
				<li> <a id="logout" class="top_menu_right" href = "logout.php"> Log Out </a> </li>
			</ul>
		</div>
	</div>
	<div class="clearance"></div>
<div id = "main_wrapper">
		<div class="content_wrapper">
			<div class="content_main">

<?php
	$username=$_SESSION["username"];
	$fname=$_POST["fName"];
	$lname=$_POST["lName"];
	$sickness=$_POST["sickness"];
	$age=$_POST["age"];
	$birthdate=$_POST["bdate"];
	$gender=$_POST["gender"];
	$height=$_POST["height"];
	$weight=$_POST["weight"];
	$status=$_POST["status"];
	$address=$_POST["address"];
	$contactno=$_POST["contactNum"];

	$query = "update patient set patient_lname='$lname', patient_fname='$fname', patient_sickness='$sickness', patient_age='$age',
	patient_birthdate='$birthdate', patient_gender='$gender', patient_height='$height', patient_weight='$weight', patient_status='$status', patient_address='$address', patient_contactno='$contactno' where patient_username='$username'";
				
	$result = mysqli_query($conn,$query); 
	if (!$result) { 
		echo "Problem with query " . $query . "<br/>"; 
	
		exit(); 
	} 
	else{
		echo "Your profile information was successfully edited.";
	}
	
	mysqli_close($conn);
?>
</div>
</div>
</div>

</body>
</html>