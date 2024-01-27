<?php include('include/loginheader.php'); ?><!-- including header -->


<html>
	<head>
		<title>medico</title>
		<link rel="stylesheet" type="text/css" href="CSS/dboardCSS.css"><!-- linking css file -->
		<link rel="stylesheet" type="text/css" href="css/table.css"><!-- linking css file -->
	</head>
	<body>
		<div id = "menu_container">
			<div id="menu_wrapper">
				<ul class = "main_menu_left">
					<li><a class="top_menu" href = "dboardPatient.php">Dashboard</a></li><!-- linking another page  -->
					<li><a class="top_menu" href = "patient_profile.php">Profile</a></li><!-- linking another page  -->
					<li><a class="top_menu" href = "appointments_patient.php">Appointment</a></li><!-- linking another page  -->
				
				</ul>
				
				<ul class = "main_menu_right">
						<table border=3><tr>
						<li> 
							<form name='searchdoctor' action='search_patient.php' method='post'>
							Search by: 
							<select name="searchtype" id = "option"><!-- using option for searching -->
								<option name="specialty">Specialty</option>
								<option name="name">Name</option>
								<option name="hospital">Hospital</option>
							</select>
							<input class='search_bar' type='text' name='searchinput'> </a><!-- creating a search bar -->
							</form>
						</li>
					</tr>
						</table>
					
					<li> <a id="logout" class="top_menu_right" href = "logout.php"> Log Out </a> </li><!-- link for other page -->
				</ul>
			</div>
		</div>
		<div class="clearance"></div>
		<div class="content_wrapper">
			<div class="content_main">
			<?php
		
				/*query to select doctor form dotcor's table*/	
				$query = 'SELECT doctor_username, doctor_lname, doctor_fname, s.name as sname FROM doctor d,specializationinfo s where s.specializationid=d.doctor_specialization and doctor_deleted="n" ORDER BY doctor_lname';

				$result = mysqli_query($conn,$query);
				/*creating a table */
				echo '<form action="request_page_date.php" method="post">
						<table class="table_doctors">
						<tr>
						    
							<th>Name</th>
							<th>Specialization</th>
							<th>Request</th>
						</tr>';
					/*isng while condition*/
				while ($row = mysqli_fetch_array($result)) {
                $doctor_names=$row['doctor_fname'].' '.$row['doctor_lname'];/*using array to store names*/
				$doctor_user = $row['doctor_username'];			
				$doctor_special = $row['sname'];    
					echo '<tr>
							<td style="width: 250px">' . $doctor_names . '</td>
							<td style="width: 250px">' . $doctor_special . '</td>
							<td style="width: 250px">
							<center><input style="width: 100px" type="submit" name="doctor_user" value="'. $doctor_user .'"/></center>
							</td>
						</tr>';

				}
				echo '</table>

				</form>';
					
				mysqli_close($conn);
			?>
			<form action="appointments_patient.php" method="post"><!-- link for another page -->
			<input type="submit" value="Cancel" />
		
			</form>
			
			</div>
			</div>
		</div>
	</body>
</html>
