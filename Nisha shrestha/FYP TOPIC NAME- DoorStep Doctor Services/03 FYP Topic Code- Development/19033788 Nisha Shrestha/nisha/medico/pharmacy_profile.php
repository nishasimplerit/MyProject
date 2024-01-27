<?php include('include/loginMedHeader.php'); ?>


<html>
<head>
	<title>My Profile</title>
	<link rel="stylesheet" type="text/css" href="CSS/dboardCSS.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
		
	
	
</head>	

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
			xmlhttp.open("GET","edit_patient_uname.php",true);
			xmlhttp.send();
			}
			
			function editPasswordP(){
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
		$resultCheck = mysqli_query($conn,"select * from pharmacy where pharmacy_username = '".$username."';");

		$rows = mysqli_num_rows($resultCheck);
		echo "<table border=3><tr><th>Name</th><th>Address</th><th>Email Address</th><th>Contact Number</th></tr>";
		for($j=0; $j<$rows; $j++){
			$tuple = mysqli_fetch_array($resultCheck);		 
			echo '<tr><td>', $tuple['pharmacy_username'],'</td>';	
			echo '<td> ', $tuple['pharmacy_address'], '</td>';	
			echo '<td> ', $tuple['patient_email'], '</td>';	
			echo '<td> ', $tuple['patient_contactnum'], '</td>';	
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