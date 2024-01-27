
<?php include('include/loginpatientheader.php'); ?>

<html>
<link rel="stylesheet" type="text/css" href="css/table.css">
<script type="text/javascript">
		function editProfileP(){
			var xmlhttp;
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("edit_boxP").innerHTML=xmlhttp.responseText;
				}
			  }
			xmlhttp.open("GET","edit_patientProfile.php",true);
			xmlhttp.send();
			}
			
			function editUsernameP(){
			var xmlhttp;
			if (window.XMLHttpRequest)
			  {
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("edit_boxP").innerHTML=xmlhttp.responseText;
				}
			  }
			xmlhttp.open("GET","edit_patient_uname.php",true);
			xmlhttp.send();
			}
			
			function editPasswordP(){
			var xmlhttp;
			if (window.XMLHttpRequest)
			  {
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("edit_boxP").innerHTML=xmlhttp.responseText;
				}
			  }
			xmlhttp.open("GET","edit_patient_pword.php",true);
			xmlhttp.send();
			}
		</script>

<body>
	
	
		<div class="content_wrapper">
			<div class="content_main">
				<table border="3">

		<?php
		$username=$_SESSION["username"];
		$resultCheck = mysqli_query($conn,"select * from patient where patient_username = '".$username."';");

		$rows = mysqli_num_rows($resultCheck);
		echo "<table border=3><tr><th>Name</th><th>Sickness</th><th>Gender</th><th>Address</th><th>Age</th><th>Height</th><th>Weight</th><th>Birthdate</th><th>Status</th><th>Contact Number</th></tr>";
		for($j=0; $j<$rows; $j++){
			$tuple = mysqli_fetch_array($resultCheck);		 
			echo '<tr><td>', $tuple['patient_lname'],', ', $tuple['patient_fname'] ,'</td>';	
			echo '<td> ', $tuple['patient_sickness'], '</td>';	
			echo '<td> ', $tuple['patient_gender'], '</td>';	
			echo '<td> ', $tuple['patient_address'], '</td>';	
			echo '<td> ', $tuple['patient_age'], '</td>';	
			echo '<td> ', $tuple['patient_height'], '</td>';	
			echo '<td> ', $tuple['patient_weight'], '</td>';	
			echo '<td> ', $tuple['patient_birthdate'], '</td>';	
			echo '<td> ', $tuple['patient_status'], '</td>';
			echo '<td>', $tuple['patient_contactno'], '</td>';	
			echo '</tr>';
					
		}
		echo "</table>";
		?>
		<br/>
		
		<form>
				<input type = "button" onclick="editProfileP()" value = "Edit Profile"/>
					
				<input type = "button" onclick="editUsernameP()" value = "Edit Username"/>
					
				<input type = "button" onclick="editPasswordP()" value = "Edit Password"/>
		</form>
		
		</div>
		
		<br/>
			<div id = "edit_boxP">
			
			</div>
		<br/>
		</table>
	</div>
	
<body/>

</html>