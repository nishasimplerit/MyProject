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
	$pharmacyid=$string;

	$pharmacy_username = $_POST['username'];
	$pharmacy_password = md5($_POST['password']);
	$pharmacy_email = $_POST['email'];
	$pharmacy_address = $_POST['address'];
	$pharmacy_contactnum = $_POST['contactNum'];
	$pharmacy_rstatus='approved';
	$a=0;
	$ctr=0;
	
	
	

	$pharmacy_email =$pharmacy_email;
	$pharmacy_address =$pharmacy_address;
	$pharmacy_contactnum = $pharmacy_contactnum;	

		
	$queryCheck1 = "select patient_username from patient where patient_username='{$pharmacy_username}';";
	$resultCheck1 = mysqli_query($conn,$queryCheck1) or die("wrong query");
	
	$queryCheck2 = "select pharmacy_username from pharmacy where pharmacy_username='{$pharmacy_username}';";
	$resultCheck2 = mysqli_query($conn,$queryCheck2) or die("wrong query");


	
	while($myrow1 = mysqli_fetch_assoc($resultCheck1)) {
			$a=$a+1;
	}
	while($myrow2 = mysqli_fetch_assoc($resultCheck2)) {
			$a=$a+1;
	}
	// echo $a;
	if ($a==0){
		$query = "insert into pharmacy (pharmacy_id,pharmacy_username, pharmacy_password, pharmacy_email, pharmacy_address, pharmacy_contactnum, pharmacy_deleted) values
			('{$pharmacyid}','{$pharmacy_username}','{$pharmacy_password}','{$pharmacy_email}','{$pharmacy_address}','{$pharmacy_contactnum}','n');";		
		
				$result = mysqli_query($conn,$query); 		
				if (!$result) { 
					echo "Problem with query " . $query . "<br/>";

					echo mysqli_error($conn); 
					exit(); 
				} 
				else{
					echo "Company successfully added. Thank you. <br/>";
					}
			
	}
	else {

			echo "Username for company already exists!";
		
	}
	mysqli_close($conn);
	
?>
</div>
</div>
</div>
</body>
</html>