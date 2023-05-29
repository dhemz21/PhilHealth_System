<?php

session_start();
// DATABASE CONNECTION
require_once('../database/db_conn.php');


if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $code = $_POST['otp'];
   
    // GETTING THE LAST RESET_PASSOWRD_TOKEN FROM TABLE RESET_PASSWORD_TOKEN
    $query = 'SELECT * FROM reset_password_token ORDER BY reset_id DESC LIMIT 1';
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_assoc($result)) {
        $reset_id = $row['reset_id'];
        $email = $row['email'];
    }

    // VALLIDATE THE DATA - IF THE USERID AND OTP IS MATCH 
    $validate = "SELECT * FROM reset_password_token WHERE reset_id ='$reset_id' && OTP ='$code' && email = '$email'";
    $result = mysqli_query($conn, $validate);

    // FETCH A ROW FROM THE RESULT SET OF THE SELECT QUERY AND STORE IT AS AN ASSOCIATIVE ARRAY
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    // EXECUTE A SELECT QUERY TO RETIEVE ALL ROWS FROM THE TABLE REGISTERED_ADMIN
    $sql = mysqli_query($conn, "SELECT * FROM registered_admin");
    while ($getData = mysqli_fetch_array($sql)) 

    // IF STATEMENT IS EQUAL TO ONE 
    if ($count == 1) {

        // STORE THE DATA IN THE SESSION
        $_SESSION['email'] = $email;
  
        $_SESSION['validate'] = "successful";
        header("location: ../pages/admin_reset.php");
        exit(); // Stop further PHP execution
       
    } else {

        $_SESSION['validate'] = "unsuccessful";
        header("location: ../pages/admin_token.php");
        exit(); // Stop further PHP execution

    }

}
?>
