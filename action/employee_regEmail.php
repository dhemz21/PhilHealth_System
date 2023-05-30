<?php

session_start();

// DATABASE CONNECTION
require_once('../database/db_conn.php');

if (isset($_POST['submit'])) {

    $email = $_POST['email'];

    // RETRIEVE THE EMAIL ADDRESS FOR THE GIVEN SPECIFIC EMAIL
    $validate = "SELECT * FROM tbl_employee WHERE email ='$email'";
    $result = mysqli_query($conn, $validate);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

     if ($row) {
    // GETTING THE SPECIFIC ROW FROM THE TBL_EMPLOYEE WHICH IS THE EMPLOYEE_ID AND INSERT TO TABLE REGISTERED_ID
    $reg_id = $row['employee_id'];
    $email = $row['email'];
   } else {
       echo "error";
   }

    // IF STATEMENT 
    if ($count == 1) {

        // IT WILL SEND RANDOM INTEGERS ONE-TIME PASSWORD 
        $OTP_code = random_int(111111, 999999);

        // GETTING THE USER INFORMATION BEFORE SENDING THE OTP CODE
        $data = $conn->query("SELECT * FROM tbl_employee WHERE email = '$email'");
        while ($current = $data->fetch_assoc()) {
            // GET THE SPECIFIC ROW FROM THE TABL TBL_EMPLOYEE
            $user = $current['firstname'];
            $email = $current['email'];
        }
        // THE DATA FROM TBL_EMPLOYEE WILL STORE TO REGISTERED_ID TABLE
        $sql = "INSERT INTO registered_id (Registered_ID, email, OTP, type)VALUES ('$reg_id', '$email', '$OTP_code', 'EMPLOYEE')";

        //IT WILL PROCESS AND AFTER IT SEND THE OTP 
        include '../pages/send_otp.php';

        // CHECKING IF INSERTION IS SUCCESSFUL FROM REGISTERED_IDNUMBER 
        if (mysqli_query($conn, $sql)) {
            // IT WILL GO TO THIS FOLDER
            $_SESSION['validate'] = "successful";
            header("location: ../pages/employee_otp.php");
            exit(); // Stop further PHP execution

        } else {
            $_SESSION['validate'] = "unsuccessful";
            header("location: ../pages/employee_confirm.php");

        }
    } else {

        $_SESSION['validate'] = "unsuccessful";
        header("location: ../pages/employee_confirm.php");
        exit(); // Stop further PHP execution

    }
}

?>
