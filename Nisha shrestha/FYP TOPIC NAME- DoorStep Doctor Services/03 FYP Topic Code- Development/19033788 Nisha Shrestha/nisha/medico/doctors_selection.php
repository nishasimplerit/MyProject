<?php include('include/header.php'); ?><!-- including header -->
<?php
	require "dbconnect.php";
	
?>

<html>
	<head>
		<title>Healthcare System</title>
		<link rel="stylesheet" type="text/css" href="CSS/dboardCSS.css"><!-- linking a css file -->
		
		<link rel="stylesheet" type="text/css" href="css/style.css" /><!-- linking a css file -->
		
	</head>
	
	<body>
		
		
		
		
		
		<div id = "menu_container">
			<div id="menu_wrapper">
				<ul class = "main_menu_left">
					<li><a class="top_menu" href = "dboardPatient.php">Dashboard</a></li><!-- link for another page -->
					<li><a class="top_menu" href = "patient_profile.php">Profile</a></li><!-- link for another page -->
					<li><a class="top_menu" href = "appointments_patient.php">Appointment</a></li><!-- link for another page -->
					
				</ul>
				
				<ul class = "main_menu_right">
					
						<li> 
							<form name='searchdoctor' action='search_patient.php' method='post'><!-- link for anotehr page to use POST method -->
							Search by: 
							<select name="searchtype" id = "option"><!-- creating option for selection -->
								<option name="specialty">Specialty</option>
								<option name="name">Name</option>
								<option name="hospital">Hospital</option>
							</select>
							<input class='search_bar' type='text' name='searchinput'> </a>
							</form>
						</li>
									
					<li> <a id="logout" class="top_menu_right" href = "logout.php"> Log Out </a> </li><!-- creatign a link for logout -->
				</ul>
			</div>
		</div>
		
		<div class="banner-container">
			<div class="headbanner"></div>
		</div>
		
		<div class="content_wrapper">
			<div class="content_main">
				<div class="welcome_header">
				
					</div>
				
					<div class="container">
					 
								<div id="wrapper">
                        
						         <div id="login" class="animate form">
						
						            <?php   
									  /*query to selcct doctor from database*/
										 $doctor_query = mysqli_query($conn,"SELECT * FROM doctor");
				                        while ($doctor_result = mysqli_fetch_array($doctor_query))
										 
										 { 
				                           
										
										    
											if ($exist=file_exists($a))
		                                              {
			                                         
		                                              
										           
										     
										   
										        echo '<div class="details"> '.$doctor_result['doctor_fname'] . ' ' . $doctor_result['doctor_lname']."<br/>";/*pringing doctor name*/
				
                                                echo  $doctor_result['doctor_specialization'] . ' <br/></div>' ;/*pringitn docot specialization*/
												
												echo '<a href="request_patient.php"> Request Appointment </a>'/*link for anotehr*/
                                         
										 }
										 }
                                          
						                 mysqli_close($conn); 
									  ?> 
                                 </div> 
                             
                               	</div>						 
                              
						     </div>
                
		  
            
			      
                     
					</div>
					
	        </div>
		
		</div>
	
	</body>

</html>