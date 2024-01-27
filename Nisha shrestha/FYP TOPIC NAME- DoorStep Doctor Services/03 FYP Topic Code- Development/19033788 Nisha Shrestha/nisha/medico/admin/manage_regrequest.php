<?php 
include "adminDash.php";
?>
<script>
function myFunction() {
var r = confirm("OK to delete?");
if (r == false) {
   return false;
} 

}
</script>
<html>	
	<body>
		<link rel="stylesheet" type="text/css" href="css/table.css">

		<div class="content_wrapper">
			<div class="content_main">
				<div class="clearance"></div>	
			<?php
				$i=0;
				$j=0;
				$action;
				
				$query1 = "select doctor_username, doctor_email, doctor_lname,contactno, doctor_fname,doctor_licenseno from doctor where doctor_deleted='n';"; 
				$result1 = mysqli_query($conn,$query1);

				$query4="select doctor_username, doctor_email, doctor_lname, contactno, doctor_fname,doctor_licenseno from doctor where doctor_deleted='y';";
				$result4 = mysqli_query($conn,$query4);
				
				if (!$result1 || !$result4) { 
						echo mysqli_error($conn); 
						exit(); 
				}
				
				echo"<form action='process_regrequest.php' method='post'>";
				//echo "<center>";

				echo "<h2>List Of Doctors</h2>";
				echo "<table border=3>";
				echo "<tr><td><b>Username</b></td>
				<td><b>Email Address</b></td>
				<td><b>Lastname</b></td>
				<td><b>First Name</b></td>
				<td><b>phone No.</b>
				</td><td span='2'><b>Action</b></td></tr>";
				while($myrow1 = mysqli_fetch_array($result1)){
					echo "<tr class='table_doctors_row'>";
					echo "<td>".htmlspecialchars($myrow1['doctor_username'])."</td>";
					echo "<td>".htmlspecialchars($myrow1['doctor_email'])."</td>";
					echo "<td>".htmlspecialchars($myrow1['doctor_lname'])."</td>";
					echo "<td>".htmlspecialchars($myrow1['doctor_fname'])."</td>";
					echo "<td>".htmlspecialchars($myrow1['contactno'])."</td>";
					// echo "<td><a href='process_regrequest.php?id={$myrow1['doctor_username']}&action=accept'><img src='check.jpg' alt='accept'></a>";
					echo "<td><a href='process_regrequest.php?id={$myrow1['doctor_username']}&action=delete' type='button' class='btn btn-danger'>Delete<img src='../img/cross.jpg' alt='delete'></a></td>";
					/*<a href='manageAdmin.php?did=<?php echo $admin['user_id']?>' onclick="return myFunction()" type='button' class='btn btn-danger'>Delete</a>*/
				}
				echo"</table>";

				if(mysqli_num_rows($result4)>0){
				echo "<h2>List Of Deleted Doctors</h2>";
				echo "<table border=3>";
				echo "<tr class='table_patients_row'>
				<td><b>Username</b></td>
				<td><b>Email Address</b></td>
				<td><b>Lastname</b></td>
				<td><b>First Name</b></td>
				<td><b>contact No.</b></td>
				<td span='2'><b>Action</b></td></tr>";
				while($myrow2 = mysqli_fetch_array($result4)){
					echo "<tr>";
					echo "<td>".htmlspecialchars($myrow2['doctor_username'])."</td>";
					echo "<td>".htmlspecialchars($myrow2['doctor_email'])."</td>";
					echo "<td>".htmlspecialchars($myrow2['doctor_lname'])."</td>";
					echo "<td>".htmlspecialchars($myrow2['doctor_fname'])."</td>";
					echo "<td>".htmlspecialchars($myrow2['contactno'])."</td>";
					// echo "<td><a href='process_regrequest.php?id2={$myrow2['patient_username']}&action2=accept'><img src='check.jpg' alt='accept'></a>";
					echo "<td><a href='process_regrequest.php?id={$myrow2['doctor_username']}&action=undelete'>Restore<img src='../img/accept.jpg' alt='undelete'></a></td>";
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