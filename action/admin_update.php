<?php

session_start();
// DATABASE CONNECTION
require_once('../database/db_conn.php');

// GET THE POSTED PASSWORD AND EMAIL
$password = $_POST['password'];
$mail = $_POST['email'];

// CHECK IF THE EMAIL EXISTS IN THE REGISTERED_ADMIN TABLE
$query = "SELECT COUNT(*) FROM registered_admin WHERE email = '$mail' AND type = 'ADMIN'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$count = $row[0];

if ($count == 0) {
    // EMAIL DOES NOT EXIST, SHOW ERROR
    $_SESSION['validate'] = "not-match";
    echo "<script>window.location.href='../pages/admin_reset&error=2';</script>";
} else {
    // ID NUMBER EXISTS, HASH THE PASSWORD AND UPDATE THE REGISTERED_USERS TABLE
    $hash = password_hash($password, PASSWORD_ARGON2I);
    $query = "UPDATE registered_admin SET password='$hash' WHERE email = '$mail' AND type = 'ADMIN'";
    if (mysqli_query($conn, $query)) {
        $_SESSION['validate'] = "successful";
        echo "<script>window.location.href='../pages/admin_login.php';</script>"; 
    } else {
        $_SESSION['validate'] = "error";
        echo "<script>window.location.href='../pages/admin_reset.php';</script>";
    }
}

?>
