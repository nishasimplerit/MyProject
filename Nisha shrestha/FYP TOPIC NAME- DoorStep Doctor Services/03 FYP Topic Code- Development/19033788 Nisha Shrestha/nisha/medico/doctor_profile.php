<?php include('include/logindoctorheader.php'); ?>
  
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
			xmlhttp.open("GET","edit_doctorProfile.php",true);
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
			xmlhttp.open("GET","edit_doctor_uname.php",true);
			xmlhttp.send();
			}
			function editPasswordP(){
			var xmlhttp;
			if (window.XMLHttpRequest)
			  {/*for browser*/
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
			xmlhttp.open("GET","edit_doctor_pword.php",true);
			xmlhttp.send();
			}
			
			

</script>

<body>
	
	
<?php
	
		/*creating a variablt to store the value of username*/
		$username=$_SESSION["username"];
		/*query to select the doctor fform the data base.*/
		$resultCheck = mysqli_query($conn,"select doctor_email,contactno,doctor_licenseno,doctor_fname,doctor_lname,s.name as sname, h.name as hname from doctor d, specializationinfo s,hospitalinfo h where d.doctor_specialization=s.specializationid and h.hospitalid=d.doctor_hospital and doctor_username = '".$username."';") or die(mysqli_error($conn));
		$resultweekd=mysqli_query($conn,"select * from availability_weekday where doctor_username='".$username."' order by time");
		
		$rows = mysqli_num_rows($resultCheck);/*storing result in qrray*/
		/*creating a table*/
	        echo "<table border=3><tr><th>Name</th><th>Specialization</th><th>Hospital</th><th>Liscense Number</th><th>Schedule</th><th>Email</th><th>Contact Number</th></tr>";
			$tuple = mysqli_fetch_array($resultCheck);	
			echo '<tr><td>', $tuple['doctor_lname'],', ', $tuple['doctor_fname'] ,'</td>';	
			echo '<td> ', $tuple['sname'], '</td>';	
			echo '<td> ', $tuple['hname'], '</td>';		
			echo '<td> ', $tuple['doctor_licenseno'], '</td>';	
			echo '<td> ';
			$i=0;
			while($rws=mysqli_fetch_array($resultweekd))
			{
				$tmw=$rws['time'];

				$timew[$i]= date("H:i ", strtotime($tmw));
				$i++;

				
			}	
			

			sort($timew);

			// print_r($time);
			echo date("h:i a", strtotime($timew[0]))." To ".date("h:i a", strtotime($timew[sizeof($timew)-1]))."<br/>";
			
			echo '<td> ', $tuple['doctor_email'],'</td>';	
			echo '<td> ', $tuple['contactno'], '</td>';	
			echo '</tr>';
		
		echo "</table>";
		?>
	     	
		<br/>	
		</div>		
	</div>
	
</body>

</html>
