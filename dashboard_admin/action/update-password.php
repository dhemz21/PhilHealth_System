<?php
// DATABASE CONNECTION
require_once('../database/db_conn.php');

// POSTED DATA
$userid = $_POST['admin_id'];

$userid = $_SESSION['admin_id'];

// HASH THE PASSWORD USING ARGON2
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_ARGON2I);

// UPDATING DATA FROM THE TABLE INCHARGE
$query = "UPDATE registered_admin SET password='$hash' WHERE admin_id = '$userid'";

if (mysqli_query($conn, $query)) {
    $_SESSION['validate'] = "update";
    echo "<script>window.location.href='.?folder=pages/&page=edit-admin&success=1&admin_id=$userid';</script>";
} else {
    $_SESSION['validate'] = "error";
    echo "<script>window.location.href='.?folder=pages/&page=edit-admin&error=1&admin_id=$userid';</script>";
}
?>
