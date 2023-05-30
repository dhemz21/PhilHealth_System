<?php
// DATABASE CONNECTION
require_once('../database/db_conn.php');
// Posted Data
$userid = $_POST['employee_id'];
$fname = $_POST['firstname'];
$mname = $_POST['middlename'];
$lname = $_POST['lastname'];
$mail = $_POST['email'];

// UPDATING DATA FROM THE TABLE TBL_EMPLOYEE
$query = "UPDATE tbl_employee SET firstname='$fname', middlename='$mname', lastname='$lname', email='$mail' WHERE employee_id = '$userid'";

if(mysqli_query($conn, $query)){

   $_SESSION['validate'] = "update";
     echo "<script>window.location.href='.?folder=pages/&page=edit-employee&success=1&employee_id=$userid';</script>";
 }else{
   $_SESSION['validate'] = "error";
    echo "<script>window.location.href='.?folder=pages/&page=edit-employee&error=1&employee_id=$userid';</script>";
 }

?>

