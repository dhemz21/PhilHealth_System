<?php

session_start();

if(isset($_POST['submit'])){

    // DATABASE CONNECTION
    include_once('../database/db_conn.php');

    // POSTED INFORMATION
    $username = $_POST['username'];
    $password = $_POST['password'];

    // MYSQLI QUERY
    // PREPARE A STATEMENT TO SELECT THE DATA FROM THE REGISTERED_ADMIN TABLE
    $stmt = $conn->prepare("SELECT * FROM registered_admin WHERE username=?");

    // BIND THE PARAMETER "s" TO THE VARIABLE $username
    // "s" INDICATES THAT THE PARAMETER IS A STRING
    $stmt->bind_param("s", $username);
    // EXECUTE THE PREPARED STATEMENT
    $stmt->execute();
    // GET THE RESULT OF THE EXECUTED STATEMENT
    $result = $stmt->get_result();


    // CHECK IF THE QUERY RETURNED ANY ROWS
    if($result->num_rows >= 1){
        // IF THERE ARE ONE OR MORE ROWS RETURNED, ENTER THE WHILE LOOP
        while($getData = $result->fetch_array()){
            
                // Check if the password is correct
                if (password_verify($password, $getData['password'])) {
                    // REGENERATE THE SESSION ID
                    session_regenerate_id();
                    // ASSIGN THE VALUES OF EACH COLUMN IN THE RETURNED ROW TO DIFFERENT SESSION VARIABLES
                    $userid = $_SESSION['admin_id'] = $getData['admin_id'];
                    $email = $_SESSION['email'] = $getData['email'];
                    $uname = $_SESSION['username'] = $getData['username'];
                    $fname = $_SESSION['firstname'] = $getData['firstname'];
                    $mname = $_SESSION['middlename'] = $getData['middlename'];
                    $lname = $_SESSION['lastname'] = $getData['lastname'];
                    $type = $_SESSION['type'] = $getData['type'];
                    header("location: ../dashboard_admin/");
                    exit(); // Stop further PHP execution
                } else {
                    $_SESSION['validate'] = "unsuccessful";
                    header("location: ../pages/admin_login.php");
                    exit(); // Stop further PHP execution
                }
        }
    }else{
        $_SESSION['validate'] = "unsuccessful";
        header("location: ../pages/admin_login.php");
        exit(); // Stop further PHP execution

    }
}

?>
