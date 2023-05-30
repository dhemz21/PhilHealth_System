<?php

session_start();

// DATABASE CONNECTION 
require('../database/db_conn.php');

$query_lastID = 'SELECT * FROM 	registered_employee ORDER BY employee_id DESC LIMIT 1';
$result_lastID = mysqli_query($conn, $query_lastID) or die(mysqli_error($conn));
$totalID = 0;

// GETTING THE LAST ID BEFORE INSERTING THE NEW ID
while ($row = mysqli_fetch_assoc($result_lastID)) {
	$totalID = $row['employee_id'];
}

// LAST ID PLUS 1 FOR THE INSERTED ID
$totalID = $totalID + 1;

if (isset($_POST['submit'])) {
	// CREATE VARIABLE TO CATCH THE DATA FROM THE FORM
	$email = $_POST['email'];
    $user = $_POST['username'];

	// HASH THE PASSWORD USING ARGON2
	$password = $_POST['password'];
	$hash = password_hash($password, PASSWORD_ARGON2I);
	
	// RETRIEVE THE EMAIL FROM THIS TABLE FOR THE GIVEN SPECIFIC EMAIL
	$query = "SELECT * FROM tbl_employee WHERE email = '$email'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);

	//   CHECK IF THE GIVEN EMAIL EXISTS IN TBL_EMPLOYEE
	if (!$row) {
		$_SESSION['validate'] = "unsuccessful";
        header("location: ../pages/employee_signup.php");
		exit;
	}

	// GETTING THE SPECIFIC ROW FROM THE TBL_EMPLOYEE WHICH IS THE EMPLOYEE_ID AND INSERT TO TABLE REGISTERED_EMPLOYEE
	$registered_id = $row['employee_id'];
	$fname = $row['firstname'];
	$mname = $row['middlename'];
	$lname = $row['lastname'];
    $email = $row['email'];
    $type = $row['type'];

	// CHECK THE USER THAT IS ALREADY EXISTED ON THE DATABASE FROM TABLE REGISTERED_EMPLOYEE
	$checkUser = "SELECT * FROM registered_employee WHERE email='$email'";
	$result = mysqli_query($conn, $checkUser);

	$count = mysqli_num_rows($result);
	if ($count > 0) {

		$_SESSION['validate'] = "existed";
        header("location: ../pages/employee_signup.php");
		exit(); // Stop further PHP execution

	} else {

		//INSERTING THE DATA TO THE TABLE REGISTERED_EMPLOYEE
		$sql = "INSERT INTO registered_employee (Registered_ID, firstname, middlename, lastname, username, email, password, type)
		VALUES ('$registered_id ', '$fname', '$mname', '$lname', '$user', '$email', '$hash', '$type')";
	}
	//CHECKING IF INSERTION IS SUCCESSFUL FROM REGISTERED_INCHARGE
	if (mysqli_query($conn, $sql)) {

        $_SESSION['validate'] = "inserted";
		header("Location: ../pages/employee_login.php");
		exit(); // Stop further PHP execution

	} else {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	}

	//close connection
	mysqli_close($conn);
}

?>
