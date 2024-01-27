<?php include('include/loginheader.php'); ?>

<?php

include('calender_function.php');/*icluding calendar function*/
$month=date("n");
$year=date("Y");		
?>

<html>
	<head>
		<title>Medico</title>
		<link rel="stylesheet" type="text/css" href="CSS/dboardCSS.css"><!-- linking css file for design -->
	    <link rel="stylesheet" type="text/css" href="CSS/calender_css.css"><!-- linking css file for design -->
	    <link rel="stylesheet" type="text/css" href="css/table.css"><!-- linking css file for design -->

	</head>
	<body>
		
		
		<div id = "menu_container">
			<div id="menu_wrapper">
				<ul class = "main_menu_left">
					<li><a class="top_menu" href = "dboardPatient.php">Dashboard</a></li><!-- link for another page -->
					<li><a class="top_menu" href = "patient_profile.php">Profile</a></li><!-- link for another page -->
					<li><a class="top_menu" href = "appointments_patient.php">Appointment</a></li><!-- link for another page -->
					
				</ul>
				
				<ul class = "main_menu_right">
					
						<li> 
							<form name='searchdoctor' action='search_patient.php' method='post'><!-- link for another page using POST method -->
							Search by: 
							<select name="searchtype" id = "option"><!-- providing search option -->
								<option name="specialty">Specialty</option>
								<option name="name">Name</option>
								<option name="hospital">Hospital</option>
							</select>
							<input class='search_bar' type='text' name='searchinput'> </a><!-- creating search bar -->
							</form>
						</li>
				
					<li> <a id="logout" class="top_menu_right" href = "logout.php"> Log Out </a> </li><!-- link for other page -->
				</ul>
			</div>
		</div>
		
		
		<div class="content_wrapper">
			<div class="content_main">
			<?php
		
				/*Display doctor's name and specialization*/
				$doctor_user = $_POST['doctor_user'];
				$_SESSION['docuser']=$doctor_user;


				/*query to select doctor from table*/
				$doctor_query = mysqli_query($conn,"SELECT doctor_lname, doctor_fname, s.Name as sname,h.name as hname
				                                 FROM doctor d,specializationinfo s, hospitalinfo h WHERE s.SpecializationID=doctor_specialization and doctor_hospital=h.HospitalID and doctor_username='$doctor_user'") ;
				$doctor_result = mysqli_fetch_array($doctor_query);
				?> 

				<br/><h6>Doctor Details</h6>	
				<?php 
					/*displaying the doctor information*/
					echo '
						<table class="table_doctors">
						<tr>					    
							<th>Name</th>
							<th>Specialization</th>
							<th>Hospital</th>
						</tr>';

						echo '<tr>
							<td style="width: 250px">' . $doctor_result['doctor_fname'] . ' ' . $doctor_result['doctor_lname'] . '</td>
							<td style="width: 250px">' .$doctor_result['sname'] . '</td>
							<td style="width: 250px">' . $doctor_result['hname']  . '</td>
							
						</tr>';
						echo "</table>";
						echo "<br/>";
						echo "<h6>Please select date for Appointment</h6>";	
				
				mysqli_error($conn);
   				/*drawing a calendar*/
				echo draw_calendar($month,$year);	
				
				echo'
				*Red indicated days are not possible</br>
				*Green indicated days are possible';
				echo'</tr>';
				
				mysqli_close($conn);
				
			?>		
			
			<form action="request_patient.php" method="post"><!-- link for another page -->
			<input type="submit" value="Back"/>
			</form>
			
			</div>
		</div>
	</body>
</html>