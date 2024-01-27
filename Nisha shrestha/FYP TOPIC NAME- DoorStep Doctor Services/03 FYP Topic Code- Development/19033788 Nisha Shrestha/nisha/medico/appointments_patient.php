<?php include('include/loginpatientheader.php'); ?><!-- including login header -->


<html>
	<head>
		
	</head>
	<link rel="stylesheet" type="text/css" href="css/table.css"><!-- linking css page -->
	<body>
		 
		<mark style="background-color: yellow;
         color: black;">Note you cannot cancel appointment before 24 hours.</mark><!-- displaying a note in sytle -->
		<div class="clearance"></div>
		<div class="content_wrapper">
			<div class="content_main">
			<?php
				
				$username = $_SESSION['username'];/*creating a variable*/ 
				$query = "SELECT app_patientname, app_number, app_date, app_time, app_doctorname, h.name as hname, app_status FROM appointment a,hospitalinfo h WHERE h.hospitalID=app_hospital and  app_patientusername='$username' ORDER BY app_date";/*query to select form appointment table*/
				$result = mysqli_query($conn,$query);
				/*printing a table*/
				echo '<table border=3><tr>
						<tr>
							<th>App #</th>
							<th>Date</th>
							<th>Time</th>
							<th>Doctor</th>
							<th>Hospital</th>
							<th>Status</th>
							<th>Manage</th>
						</tr>';
						
				$x = 1;
				while ($row = mysqli_fetch_row($result)) {
					echo '<tr>';
					/*creating a counter*/
					$count = count($row);
					for ($datacounter=0; $datacounter<$count; $datacounter++) {/*using for loop for counter*/
						$c_row = current($row);
						if($datacounter > 0) {
							echo '<td style="width:150px;text-align:center;">' . $c_row . '</td>';
						}
						if($datacounter == 1) {
							$tableID = $c_row;
						}
						next($row);
					}
						
					/*Buttons*/
					echo '<td>
							<form action="cancel_apprequest.php" method="post">';
					
					/*to get time difference in a minute*/
					$timestamp_query = mysqli_query($conn,"SELECT app_date, app_time FROM appointment WHERE app_number='$tableID'");
					$timestamp_array = mysqli_fetch_array($timestamp_query);
					$time_difference = check_time($timestamp_array[0], $timestamp_array[1]);
					
					/*to check if the time difference is 24 hours or not*/
					if($time_difference <= 1440) {
						echo '<button type="button" onclick="alert(\'Cannot cancel appointment!\');">Cancel</button>';
					}
					else {
						echo '<input type="hidden" name="cancelid" value="' . $tableID . '">
							<button type="submit" onclick="return confirm(\'Cancel appointment?\');">Cancel</button>';
					}
					
					echo '</form></td></tr>';
				}
				
				echo '</table>';
				
				mysqli_close($conn);
			?>
			<button style="color: white;"><a href="request_patient.php">Request Appointment</a></button><!-- providing a link ot another page -->
			</div>
			</div>
		</div>
	</body>
</html>
