<?php include('include/logindoctorheader.php'); ?><!-- including login header page -->


<html>
	<head>
		<title>Healthcare System</title>
		<link rel="stylesheet" type="text/css" href="CSS/dboardCSS.css"><!-- linking css -->
		<link rel="stylesheet" type="text/css" href="css/table.css"><!-- linking css -->

	</head>
	<body>
		
		<div class="clearance"></div>
		<div class="content_wrapper">
			<div class="content_main">
			<?php
				


				$username = $_SESSION['username'];
				$query = "SELECT app_doctorname, app_number, app_date, app_time,app_patientusername, h.name as hname, app_status FROM appointment a,hospitalinfo h WHERE h.hospitalID=app_hospital and app_doctorusername='$username' ORDER BY app_date";/*query to select the doctor and patient information*/

				$result = mysqli_query($conn,$query);
				/*creating a table with border 3*/
				echo '<table border=3><tr>
						<tr>
							<th>App #</th>
							<th>Date</th>
							<th>Time</th>
							<th>Patient Name</th>
						
							<th>Hospital</th>
							<th>Status</th>
							<th>Manage</th>
						</tr>';
						
				$x = 1;
				/*using while loop*/
				while ($row = mysqli_fetch_row($result)) {
					echo '<tr>';
					
					$count = count($row);/*creaitng a data counter*/
					for ($datacounter=0; $datacounter<$count; $datacounter++) {/*using for loop for data counter*/
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
					
					/*to ge time difference*/
					$timestamp_query = mysqli_query($conn,"SELECT app_date, app_time FROM appointment WHERE app_number='$tableID'");/*queryt to select form appointment table*/
					$timestamp_array = mysqli_fetch_array($timestamp_query);
					$time_difference = check_time($timestamp_array[0], $timestamp_array[1]);
					
					/*to check whether the time differencin 24 hours*/
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
			
			</div>
			</div>
		</div>
	</body>
</html>