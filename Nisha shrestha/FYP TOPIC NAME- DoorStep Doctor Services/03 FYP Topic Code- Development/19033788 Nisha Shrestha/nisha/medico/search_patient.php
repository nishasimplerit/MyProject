<?php include('include/loginpatientheader.php'); ?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="CSS/dboardCSS.css">
		<link rel="stylesheet" type="text/css" href="css/table.css">
		<script language = "javascript">
		
			function clicked(){
				var search = document.getElementById("searchinput");
				var opt = document.getElementById("option");

				if(!search.value){
					alert('You have not entered any text in the search box, please enter again');
					search.focus();
				}else{
					form.submit();
				}
			}
		</script>
		<title> DOCTOR's DIRECTORY </title>
	</head>
	<body>
	
	<div class="clearance"></div>
	<div id = "main_wrapper">
		<div class="content_wrapper">
			<div class="content_main">
		<?php
			//inputs from the user
			$sInput = $_POST['searchinput'];
			$sType = $_POST['searchtype'];
			echo $sType;
			$field;
			$resultCheck;
			if($sType == 'Specialty'){
				$field = 's.Name';
			}else if($sType == 'Hospital'){
				$field = 'h.Name';
			}else if($sType == 'Name'){
				$field = 'name';
			}		
				/*query to search doctor using specialty option*/
				if($sType == 'Specialty'){
				$resultCheck = mysqli_query($conn, "select doctor_username,doctor_fname,doctor_lname,s.Name as sname,h.Name as hname from doctor d,specializationinfo s,hospitalinfo h where d.doctor_specialization=SpecializationID and h.HospitalID=doctor_hospital and  ".$field." like '%".$sInput."%' and doctor_deleted='n' ") or die(mysqli_error($conn));
				/*query to search doctor using name option*/
				}else if($sType == 'Name'){
					$resultCheck = mysqli_query($conn, "select doctor_username,doctor_fname,doctor_lname,s.name as sname,h.name as hname from doctor d,specializationinfo s,hospitalinfo h where d.doctor_specialization=SpecializationID and h.HospitalID=doctor_hospital and (doctor_lname like '%".$sInput."%' or doctor_fname like '%".$sInput."%') and doctor_deleted='n'");
					/*query to search doctor using name of hospital option*/
				}else if($sType == 'Hospital'){
					$resultCheck = mysqli_query($conn, "select doctor_username,doctor_fname,doctor_lname,s.Name as sname,h.Name as hname from doctor d,specializationinfo s,hospitalinfo h where d.doctor_specialization=SpecializationID and h.HospitalID=doctor_hospital and ".$field." like '%".$sInput."%' and doctor_deleted='n'") or die(mysqli_error($conn));
					
				}
			
			$rows = mysqli_num_rows($resultCheck);
			
			if($rows==0){/*printing if result is not found*/
				echo  $sInput." does not exist on ".$sType." list.";
			}else if($rows!=0){/*printing is result is found*/

				echo 'Found! <br />';
				echo '<form action="request_page_date.php" method="POST">';
				echo "<table border=3><tr><th>Name</th><th>Specialization</th><th>Hospital</th></tr>";
				for($j=0; $j<$rows; $j++){
					$tuple=mysqli_fetch_array($resultCheck);/*fetching the array*/
					echo '<input type="hidden" name="doctor_user" value="'.$tuple['doctor_username'].'">';
					echo '<tr><td>', $tuple['doctor_fname'], $tuple['doctor_lname'], '</td>';
					echo '<td>', $tuple['sname'], '</td>';
					echo '<td>', $tuple['hname'], '</td>';
					echo '<td><input type="submit" value="Request Appointment"></td>';
					echo '</tr>';
					

				}
				echo "</table>";
			}
					
			mysqli_close($conn);
		?>
		</div>
		</div>
		</div>
	</body>
</html>
