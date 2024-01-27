<?php include('include/header.php'); ?>
<?php require "dbconnect.php";
$sqlspecial="select * from specializationinfo";
$sqlhospital="select * from hospitalinfo";
	
	$resultspecial=mysqli_query($conn,$sqlspecial);
	$resulthospital=mysqli_query($conn,$sqlhospital);
	
	
	
		$role = $_REQUEST['type'];
		
		
		if($role=='pat'){
				echo"
				<html>
				<head>
					<title>Sign Up - Patient</title>
					<link rel='stylesheet' type='text/css' href='css/signup.css'/>
				</head>
				<?php include('include/header.php'); ?>
				<body>
				
				   <div class='container'>
                <div class='signup-content'>
                    <div class='signup-form'>
                        <h2 class='form-title'>Sign up</h2>
                        <form action='process_signup_patient.php' class='register-form' id='register-form' method='post'>
                            <div class='form-group'>
                                <label for='name'><i class='zmdi zmdi-account material-icons-name'></i></label>
                                <input type='text' name='username' required='required' id='name' placeholder='Username'>
                            </div>
                             <div class='form-group'>
                                <label for='name'><i class='zmdi zmdi-account material-icons-name'></i></label>
                                <input type='password' name='password' required='required' id='password' placeholder='Password'>
                            </div>
                            
                            <div class='form-group'>
                                <label for='email'><i class='zmdi zmdi-email'></i></label>
                                <input type='email' name='email' id='email' placeholder='Your Email'/>

                            </div>
                            <div class='form-group'>
                                <label for='pass'><i class='zmdi zmdi-lock'></i></label>
                                <input type='text' name='fName' placeholder='First name'/>
                            </div>
                             <div class='form-group'>
                                <label for='pass'><i class='zmdi zmdi-lock'></i></label>
                                <input type='text' name='lName' placeholder='Last name' required='required'/>
                            </div>
                             <div class='form-group'>
                                <label for='pass'><i class='zmdi zmdi-lock'></i></label>
                                <input type='text' name='sickness' placeholder='What is your sickness?' required='required'/>
                            </div>
                            <div class='form-group'>
                                <label for='pass'><i class='zmdi zmdi-lock'></i></label>
                                <input type='text' name='age' placeholder='What is your actual age?' required='required'/>
                            </div>
                             <div class='form-group'>
                                <label for='pass'><i class='zmdi zmdi-lock'></i></label>
                                <input type='date' name='bdate' placeholder='Birhdate' required='required'/>
                            </div>
                            <div class='form-group'>
                                <label for='pass'><i class='zmdi zmdi-lock'></i></label>
                                Choose your gender:
                            <select name='gender'> 
								<option value='male'>Male</option>
								<option value='female'>Female</option>
							</select>
							 </div>
							 <div class='form-group'>
                                <label for='pass'><i class='zmdi zmdi-lock'></i></label>
                                
                                <input type='text' name='height' placeholder='Height' required='required'/>
                            </div>
                            <div class='form-group'>
                                <label for='pass'><i class='zmdi zmdi-lock'></i></label>

                                <input type='text' name='weight' placeholder='Weight(In kg)' required='required'/>
                            </div>                           
                            <div class='form-group'>
                              Choose your status:
                                <select name='status'>
							<option value='single'>Single</option>
							<option value='married'>Married</option>
							<option value='widowed'>Widowed</option>
						</select>
                            </div>
                            <div class='form-group'>
                                <label for='pass'><i class='zmdi zmdi-lock'></i></label>

                                <input type='text' name='address' placeholder='Address' required='required'/>
                            </div>
                            <div class='form-group'>
                                <label for='pass'><i class='zmdi zmdi-lock'></i></label>

                                <input type='text' name='contactNum' placeholder='Contact number' required='required'/>
                            </div>
 
                            <div class='form-group form-button'>
                                <input type='submit' name='signup' id='signup' class='form-submit' value='Create my account'/>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
				</body>
				<html>";
		}
		
		else if($role=='doc'){
			echo "
					<html>
				<head>
					<title>Sign Up - Patient</title>
					<link rel='stylesheet' type='text/css' href='css/signup.css'/>
				</head>
				<?php include('include/header.php'); ?>
				<body>
				
				   <div class='container'>
                <div class='signup-content'>
                    <div class='signup-form'>
                        <h2 class='form-title'>Sign up</h2>
                        <form action='process_signup_doctor.php' class='register-form' id='register-form' method='post'>
                            <div class='form-group'>
                                <label for='name'><i class='zmdi zmdi-account material-icons-name'></i></label>
                                <input type='text' name='username' required='required' id='name' placeholder='Username'>
                            </div>
                             <div class='form-group'>
                                <label for='name'><i class='zmdi zmdi-account material-icons-name'></i></label>
                                <input type='password' name='password' required='required' id='password' placeholder='Password'>
                            </div>
                            
                            <div class='form-group'>
                                <label for='email'><i class='zmdi zmdi-email'></i></label>
                                <input type='email' name='email' id='email' placeholder='Your Email'/>

                            </div>
                            <div class='form-group'>
                                <label for='pass'><i class='zmdi zmdi-lock'></i></label>
                                <input type='text' name='fName' placeholder='First name'/>
                            </div>
                             <div class='form-group'>
                                <label for='pass'><i class='zmdi zmdi-lock'></i></label>
                                <input type='text' name='lName' placeholder='Last name' required='required'/>
                            </div>
                             
                                What have you specialized in?
							<select id='specialization' name='specialization' >
								";

							while($rws=mysqli_fetch_array($resultspecial)){
								echo"
								<option value='".$rws['SpecializationID']."'>".$rws['Name']."</option>
								";

							}

							echo"	
							</select>
							
                     
                            
                               <br>
						Where do you work?<br>
							<select id='hospital' name='hospital'>";	
							while($rws=mysqli_fetch_array($resulthospital)){
								echo"
								<option value='".$rws['HospitalID']."'>".$rws['Name']."</option>
								";

							}							

					echo "</select>
                            
                            <div class='form-group'>

                                <input type='text' name='contactNum' placeholder='Contact number' required='required'/>
                            </div>
                             <div class='form-group'>
                                <label for='pass'><i class='zmdi zmdi-lock'></i></label>
                                <input type='text' name='licenseno' placeholder='License number' required='required'/>
                            </div>

                          
                            
                    ";
				$time=halfHourTimes();

							// print_r($time);
				echo "<div class='sched_wday'>
					<div class='fieldname'>Weekday Schedule</div>
					<div class='holding'>
						<div class='sidetip'>working hours during weekdays</div>
						<select name='sched_weekdstart' id='sched_weekdstart'>";
						

						for($i=15;$i<=42;$i++)
						{
							echo "<option value=".$time[$i].">".$time[$i]."</option>";
						}

						echo "</select>
						<select name='sched_weekdend' id='sched_weekdend'>";
						


						for($i=15;$i<=42;$i++)
						{
							echo "<option value=".$time[$i].">".$time[$i]."</option>";
						}

						echo"</select> 
						
					</div>
				
               
			    <div class='form-group form-button'>
                                <input type='submit' name='signup' id='signup' class='form-submit' value='Create my account'/>
                            </div>
                        </form>
                    </div>
                   
		</body>


</html>";
		}

else if($role=='pharmacy'){
			echo "
			<html>
				<head>
					<title>Sign Up - Medical company</title>
					<link rel='stylesheet' type='text/css' href='css/signup.css'/>
				</head>
				<?php include('include/header.php'); ?>
				<body>
				
				   <div class='container'>
                <div class='signup-content'>
                    <div class='signup-form'>
                        <h2 class='form-title'>Sign up</h2>
                        <form action='process_signup_pharmacy.php' class='register-form' id='register-form' method='post'>
                            <div class='form-group'>
                                <label for='name'><i class='zmdi zmdi-account material-icons-name'></i></label>
                                <input type='text' name='username' required='required' id='name' placeholder='Username'>
                            </div>
                             <div class='form-group'>
                                <label for='name'><i class='zmdi zmdi-account material-icons-name'></i></label>
                                <input type='password' name='password' required='required' id='password' placeholder='Password'>
                            </div>
                            
                            <div class='form-group'>
                                <label for='email'><i class='zmdi zmdi-email'></i></label>
                                <input type='email' name='email' id='email' placeholder='Your Email'/>

                            </div>
                            <div class='form-group'>
                                <label for='pass'><i class='zmdi zmdi-lock'></i></label>

                                <input type='text' name='address' placeholder='Address' required='required'/>
                            </div>
                            <div class='form-group'>
                                <label for='pass'><i class='zmdi zmdi-lock'></i></label>

                                <input type='text' name='contactNum' placeholder='Contact number' required='required'/>
                            </div>
                            
                            <div class='form-group form-button'>
                                <input type='submit' name='signup' id='signup' class='form-submit' value='Create my account'/>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
				</body>
				<html>";
		}




		function halfHourTimes() {
  			$formatter = function ($time) {
    		if ($time % 3600 == 0) {
      		return date('ga', $time);
    		} else {
      		return date('g:ia', $time);
   			 }
  			};
  			$halfHourSteps = range(0, 47*1800, 1800);
  			return array_map($formatter, $halfHourSteps);
}



	?>
    