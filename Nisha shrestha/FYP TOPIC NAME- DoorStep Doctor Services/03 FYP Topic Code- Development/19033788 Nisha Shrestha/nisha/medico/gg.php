


<body>
	<div id = "menu_container">
			<div id="menu_wrapper">
				<ul class = "main_menu_left">
					<li><a class="top_menu" href = "dboardPharmacy.php">Dashboard</a></li>
					<li><a class="top_menu" href = "pharmacy_profile.php">Profile</a></li>
					<li><a class="top_menu" href = "appointments_patient.php">Appointment</a></li>
					<!--li><a class="top_menu" href = "#">Settings</a></li-->
				</ul>
				
				<ul class = "main_menu_right">
					
						<li> 
							<form name='searchdoctor' action='search_patient.php' method='post'>
							Search by: 
							<select name="searchtype" id = "option">
								<option name="specialty">Specialty</option>
								<option name="name">Name</option>
								<option name="hospital">Hospital</option>
							</select>
							<input class='search_bar' type='text' name='searchinput'> </a>
							</form>
						</li>
					
					<!--li> <a id="notification" class="top_menu_right" href = "dboardPatient.php"> Notifications </a> </li-->
					<li> <a id="logout" class="top_menu_right" href = "logout.php"> Log Out </a> </li>
				</ul>
			</div>
		</div>
	
		<div class="content_wrapper">
			<div class="content_main">
				<br>
				<br>
			<?php
						echo "Welcome " .$_SESSION["name"] ;
					?>
					<br>
						
				
		<?php
		
		//connecting to database
		//$conn = pg_connect('host=localhost dbname=healthcare user=postgres password=user');
		
		// $conn=mysqli_connect("localhost","root","root")or die("can not connect");
	 //    mysqli_select_db("healthcare",$conn) or die("can not select database");

		
		$username=$_SESSION["username"];
		$resultCheck = mysqli_query($conn,"select * from pharmacy where pharmacy_username = '".$username."';");

		$rows = mysqli_num_rows($resultCheck);
		
	          echo "<table border=3><tr><th>Name</th><th>Address</th><th>Email Address</th><th>Contact Number</th></tr>";
			$tuple = mysqli_fetch_array($resultCheck);		 
			echo '<tr><td>', $tuple['pharmacy_username'], '</td>';
			echo '<td> ', $tuple['pharmacy_address'], '</td>';	
			echo '<td> ', $tuple['pharmacy_email'], '</td>';	
			echo '<td> ', $tuple['pharmacy_contactnum'], '</td>';	
				echo '</tr>';
		
		echo "</table>";
		?>
		<br/>

		<li> 
		
		<form>
				<!-- <input type = "button" onclick="editProfileP()" value = "Edit Profile"/> -->
					
				<input type = "button" onclick="editUsernameP()" value = "Edit Username"/>
					
				<input type = "button" onclick="editPasswordP()" value = "Edit Password"/>
		</form>
		
		</div>
		
		<br/>
			<div id = "edit_boxP">
			
			</div>
		<br/>
		
	</div>
	
<body/>
