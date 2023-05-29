<?php
// DATABASE CONNECTION
require_once('../database/db_conn.php');
// Posted Data
$userid = $_POST['admin_id'];
$user = $_POST['username'];
$fname = $_POST['firstname'];
$mname = $_POST['middlename'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];


  // Retrieve the hashed password from the database for the user
  $query = "SELECT password FROM registered_admin WHERE admin_id ='$userid'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  $hashed_password = $row['password'];


// UPDATING DATA FROM THE TABLE INCHARGE
  // Verify the input password with the hashed password from the database
  if (password_verify($password, $hashed_password)) {
$update_query = "UPDATE registered_admin SET username='$user', firstname='$fname', middlename='$mname', lastname='$lname', email='$email' WHERE admin_id ='$userid'";

$update_result = mysqli_query($conn, $update_query);
if ($update_result) {
 
    // UPDATE SESSION VARIABLES
    $_SESSION['admin_od'] = $userid;
    $_SESSION['firstname'] = $fname;
    $_SESSION['lastname'] = $lname;

  $_SESSION['validate'] = "update";
  echo "<script>window.location.href='.?folder=pages/&page=admin-info&success=1&admin_id=$userid';</script>";
} else{

  $_SESSION['validate'] = "error";
  echo "<script>window.location.href='.?folder=pages/&page=edit-admin&error=1&admin_id=$userid';</script>";

}

  }else {

    $_SESSION['validate'] = "not-match";
    echo "<script>window.location.href='.?folder=pages/&page=edit-admin&error=1&admin_id=$userid';</script>";

  }

?>


