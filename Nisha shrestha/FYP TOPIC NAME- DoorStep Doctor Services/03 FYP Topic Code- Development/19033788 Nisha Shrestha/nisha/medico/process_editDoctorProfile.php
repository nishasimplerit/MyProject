<?php include('include/logindoctorheader.php'); ?>

<html>
	<head>
		

	</head>
	
<body>
<div id = "menu_container">
		<div id="menu_wrapper">
			<ul class = "main_menu_left">
					<li> <a class="top_menu" href = "dboardDoctor.php"> Dashboard </a> </li>
					<li> <a class="top_menu" href = "doctor_profile.php"> &nbsp;&nbsp;&nbsp;&nbsp;Profile&nbsp;&nbsp;&nbsp;&nbsp; </a> </li>
					<li> <a class="top_menu" href = "appointments_doctor.php"> Appointment </a> </li>
					
			</ul>
			
			<ul class = "main_menu_right">
				
				<li> <a id="logout" class="top_menu_right" href = "logout.php"> Log Out </a> </li>
			</ul>
		</div>
	</div>
	<div class="clearance"></div>
<div id = "main_wrapper">
		<div class="content_wrapper">
			<div class="content_main">
<?php
	// session_start();
	
	$username=$_SESSION["username"];
	$fname=$_POST["fName"];
	$lname=$_POST["lName"];
	$email=$tuple['doctor_email'];
	$specialization=$tuple['doctor_specialization'];
	$hospital=$tuple['doctor_hospital'];
	// $rstatus=$tuple['doctor_rstatus'];
	$licenseno=$tuple['doctor_licenseno'];
	$sched_wkdy=$tuple['doctor_sched_wday'];
	$contactno=$tuple['contactno'];
	
	
	$query = "update doctor set doctor_lname='$lname', doctor_fname='$fname', doctor_specialization='$specialization', doctor_hospital='$hospital', doctor_licenseno='$licenseno', doctor_sched_wday='$sched_wkdy', contactno='$contactno' where doctor_username='$username'";
				
	$result = mysqli_query($conn,$query); 
	if (!$result) { 
		echo "Problem with query " . $query . "<br/>"; 
	//	echo pg_last_error(); 
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