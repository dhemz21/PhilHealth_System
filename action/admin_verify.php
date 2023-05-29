<?php
session_start();
// DATABASE CONNECTION
require_once('../database/db_conn.php');

if (isset($_POST['submit'])) {

    $mail = $_POST['email'];

    // RETRIEVE THE EMAIL ADDRESS FOR THE GIVEN SPECIFIC email
    $validate = "SELECT * FROM registered_admin WHERE email ='$mail' AND type = 'ADMIN' LIMIT 1";
    $result = mysqli_query($conn, $validate);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($row) {
    // GETTING THE SPECIFIC ROW FROM THE REGISTERED_ADMIN WHICH IS THE USER_ID AND INSERT TO TABLE RESET_PASSWORD_TOKEN
    $reg_id =$row['Registered_ID'];
     $email_ad = $row['email'];

    // STORE THE DATA IN THE SESSION
    $_SESSION['email'] = $mail;
       
    } else {
        echo "error";
    }
    
    // IF STATEMENT 
    if ($count == 1) {

        // IT WILL SEND RANDOM INTEGERS ONE-TIME PASSWORD 
        $OTP_code = random_int(111111, 999999);

        // GETTING THE USER INFORMATION BEFORE SENDING THE OTP CODE
        $data = $conn->query("SELECT * FROM registered_admin WHERE email='$mail'");
        while ($current = $data->fetch_assoc()) {
            // GET THE SPECIFIC ROW FROM THE TABLE REGISTERED ADMIN
            $user = $current['firstname'];
            $email = $current['email'];
        }

        // THE DATA FROM TBL_STUDENT WILL STORE TO RESET_PASSWORD_TOKEN TABLE
        $sql = "INSERT INTO reset_password_token (Registered_ID, email, OTP)VALUES ('$reg_id', '$email_ad', '$OTP_code')";

        //IT WILL PROCESS AND AFTER IT SEND THE OTP 
        include '../pages/admin_send_otp.php';

        // CHECKING IF INSERTION IS SUCCESSFUL FROM REGISTERED_IDNUMBER 
        if (mysqli_query($conn, $sql)) {
            // IT WILL GO TO THIS FOLDER
            $_SESSION['validate'] = "successful";
            header("location: ../pages/admin_token.php");
            exit(); // Stop further PHP execution

        } else {
            $_SESSION['validate'] = "unsuccessful";
        }
    } else {

        $_SESSION['validate'] = "unsuccessful";
        header("location: ../pages/admin_forgot.php");
        exit(); // Stop further PHP execution

    }
}
?>