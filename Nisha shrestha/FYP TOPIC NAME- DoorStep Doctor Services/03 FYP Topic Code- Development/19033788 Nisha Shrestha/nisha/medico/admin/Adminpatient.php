<?php 
include "adminDash.php";
?>
<html>
	<body>
		<link rel="stylesheet" type="text/css" href="css/table.css">
		<div class="banner-container">
			<div class="headbanner"></div>
		</div>
		<div id = "main_wrapper">
		<div class="content_wrapper">
			<div class="content_main">
				<div class="clearance"></div>	
			<?php
				$i=0;
				$j=0;
				$action;

				$query2 = "select patient_username, patient_email, patient_lname, patient_fname from patient where patient_deleted='n' ;"; 
				$result2 = mysqli_query($conn,$query2);

				$query3 = "select patient_username, patient_email, patient_lname, patient_fname from patient where patient_deleted='y' ;"; 
				$result3 = mysqli_query($conn,$query3);

				
				
				if ( !$result2 || !$result3 ) { 
						echo mysqli_error($conn); 
						exit(); 
				}
				
				echo"<form action='process_regrequest.php' method='post'>";
				//echo "<center>";
				echo "<h2>List of Patients</h2>";
				echo "<table border=3>";
				echo "<tr>
				<td><b>Username</b></td>
				<td><b>Email Add</b></td>
				<td><b>Lastname</b></td>
				<td><b>First Name</b></td>
				<td span='2'><b>Action</b></td>
				</tr>";
				while($myrow1 = mysqli_fetch_array($result2)){
					echo "<tr class='table_doctors_row'>";
					echo "<td>".htmlspecialchars($myrow1['patient_username'])."</td>";
					echo "<td>".htmlspecialchars($myrow1['patient_email'])."</td>";
					echo "<td>".htmlspecialchars($myrow1['patient_lname'])."</td>";
					echo "<td>".htmlspecialchars($myrow1['patient_fname'])."</td>";
					
					// echo "<td>".htmlspecialchars($myrow1['doctor_licenseno'])."</td>";
					// echo "<td><a href='process_regrequest.php?id={$myrow1['doctor_username']}&action=accept'><img src='check.jpg' alt='accept'></a>";
					echo "<td><a href='process_regrequest.php?id2={$myrow1['patient_username']}&action2=delete' type='button' class='btn btn-danger'>Delete<img src='../img/cross.jpg' alt='delete'></a></td>";
				}
				echo"</table>";
				if(mysqli_num_rows($result3)>0){
				echo "<h2>List of Deleted Patients</h2>";
				echo "<table border=3>";
				echo "<tr class='table_patients_row'>
				<td><b>Username</b></td>
				<td><b>Email Add</b></td>
				<td><b>Lastname</b></td>
				<td><b>First Name</b></td>
				<td span='2'><b>Action</b></td>
				</tr>";
				while($myrow2 = mysqli_fetch_array($result3)){
					echo "<tr>";
					echo "<td>".htmlspecialchars($myrow2['patient_username'])."</td>";
					echo "<td>".htmlspecialchars($myrow2['patient_email'])."</td>";
					echo "<td>".htmlspecialchars($myrow2['patient_lname'])."</td>";
					echo "<td>".htmlspecialchars($myrow2['patient_fname'])."</td>";
					
					
					echo "<td><a href='process_regrequest.php?id2={$myrow2['patient_username']}&action2=undelete'>Restore<img src='../img/accept.jpg' alt='undelete'></a></td>";
				}
				echo "</table>";
			}

				//echo"</center>";
				echo"</form>";
				
				// if()

				mysqli_close($conn);
			?>
				</div>
			</div>
		</body>
</html>