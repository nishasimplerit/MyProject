<?php include('include/loginheader.php'); ?>
<html>
<head>
	<title>Health Care System</title>
	
		<link rel="stylesheet" type="text/css" href="CSS/dboardCSS.css">
	</head>
</head>
	<body>
		<div id = "menu_container">
		<div id="menu_wrapper">
			
			<ul class = "main_menu_right">
				
				
				<li> <a id="logout" class="top_menu_right" href = "logout.php"> Return to Home </a> </li>
			</ul>
		</div>
	</div>
	<div class="clearance"></div>
<div id = "main_wrapper">
		<div class="content_wrapper">
			<div class="content_main">
<?php

    $characters='0123456789';
	$string='';
	for($i=0;$i<6;$i++)
	{
	$string .=$characters[rand(0,strlen($characters)-1)];
	}
	$patientid=$string;

	$patient_username = $_POST['username'];
	$patient_password = md5($_POST['password']);
	$patient_email = $_POST['email'];
	$patient_lname = $_POST['lName'];
	$patient_fname = $_POST['fName'];
	$patient_sickness = $_POST['sickness'];
	$patient_age = $_POST['age'];
	$patient_bdate = date("Y-m-d", strtotime($_POST['bdate']));
	$patient_gender = $_POST['gender'];
	$patient_height = $_POST['height'];
	$patient_weight = $_POST['weight'];
	$patient_status = $_POST['status'];
	$patient_address = $_POST['address'];
	$patient_contactnum = $_POST['contactNum'];
	$patient_rstatus='approved';
	$a=0;
	$ctr=0;
	
	$patient_email =$patient_email;
	$patient_sickness = $patient_sickness;
	$patient_age =$patient_age;
	$patient_bdate =$patient_bdate;
	$patient_gender =$patient_gender;
	$patient_height =$patient_height;
	$patient_weight = $patient_weight;
	$patient_status = $patient_status;
	$patient_address =$patient_address;
	$patient_contactnum = $patient_contactnum;	
	
		
	$queryCheck1 = "select patient_username from patient where patient_username='{$patient_username}';";
	$resultCheck1 = mysqli_query($conn,$queryCheck1) or die("wrong query");
	
	$queryCheck2 = "select doctor_username from doctor where doctor_username='{$patient_username}';";
	$resultCheck2 = mysqli_query($conn,$queryCheck2) or die("wrong query");
	
	while($myrow1 = mysqli_fetch_assoc($resultCheck1)) {
			$a=$a+1;
	}
	while($myrow2 = mysqli_fetch_assoc($resultCheck2)) {
			$a=$a+1;
	}
	// echo $a;
	if ($a==0){
		$query = "insert into patient (patient_id,patient_username, patient_password, patient_email, patient_lname, patient_fname, patient_sickness, patient_age, patient_birthdate, patient_gender, patient_height, patient_weight, patient_status, patient_address, patient_contactno, patient_deleted) values
			('{$patientid}','{$patient_username}','{$patient_password}','{$patient_email}','{$patient_lname}','{$patient_fname}','{$patient_sickness}','{$patient_age}',
			'{$patient_bdate}','{$patient_gender}','{$patient_height}','{$patient_weight}','{$patient_status}','{$patient_address}','{$patient_contactnum}','n');";		
		
				$result = mysqli_query($conn,$query); 		
				if (!$result) { 
					echo "Problem with query " . $query . "<br/>";

					echo mysqli_error($conn); 
					exit(); 
				} 
				else{
					echo "Patient successfully added. Thank you. <br/>";
					}
			
	}
	else {

			echo "Username already exists!";
		
	}
	mysqli_close($conn);
	
?>
</div>
</div>
</div>
</body>
</html>