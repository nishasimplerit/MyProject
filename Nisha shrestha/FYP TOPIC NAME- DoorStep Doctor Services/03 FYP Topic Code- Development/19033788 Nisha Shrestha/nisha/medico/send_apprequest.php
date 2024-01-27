<?php
	require "dbconnect.php";

	if ($_SESSION['login']==0) header('Location: login_page.php');
	

	$doctor_id = $_POST['doctor_user'];
	/*using a query to select the docto form hte databse*/
	$doctor_query = mysqli_query($conn,"SELECT doctor_lname, doctor_fname, doctor_hospital FROM doctor WHERE doctor_username='$doctor_id'");
/*storing the data from query in array*/
	$doctor_array = mysqli_fetch_array($doctor_query);
	$doctor_name = $doctor_array[0] . ", " . $doctor_array[1];
	/*fixing the maximum appointment number*/
	$max_appnumber = mysqli_query($conn,"SELECT MAX(app_number) FROM appointment");
	$app_no = mysqli_fetch_array($max_appnumber);
	$app_no[0] = $app_no[0] + 1;
	
	$username = $_SESSION['username'];
	/*query to select patient form database*/
	$patient_query = mysqli_query($conn,"SELECT patient_id,patient_lname, patient_fname, patient_mname FROM patient WHERE patient_username='$username'");
	/*storing the result of query in array*/
	$patient_array = mysqli_fetch_array($patient_query);
	$patient_name = $patient_array[2] . " " . $patient_array[3] . " " . $patient_array[1];

	//-------------------------------Query Inserted-----------------------------------------------------------
    if(0)
    {}
	else
	{	/*usng hte query to inser into appointment table */
	$query = "INSERT INTO appointment (app_patient_id,app_number, app_patientname, app_doctorname, app_time, app_date, app_hospital, app_status, app_patientusername, app_doctorusername)
			VALUES ('{$patient_array[0]}','{$app_no[0]}', '{$patient_name}', '{$doctor_name}', '{$_POST['app_time']}', '{$_POST['app_date']}', '{$doctor_array[2]}', 'Approved', '{$username}', '{$doctor_id}')";
	$result = mysqli_query($conn,$query);
    }
	mysqli_close($conn);

	
	header('Location: appointments_patient.php');/*link to anotehr page*/
?>