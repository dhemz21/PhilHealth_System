<?php
// DATABASE CONNECTION 
require_once('../database/db_conn.php');

$userid = $_SESSION['admin_id'];

// IMAGE UPLOAD
$image_name = $_FILES['profile_picture']['name'];
$image_temp = $_FILES['profile_picture']['tmp_name'];
$image_size = $_FILES['profile_picture']['size'];


// CHECK IF NO IMAGE WAS SELECTED
if (!$image_name) {

    // SKIP IMAGE-RALATED CHECKS
    $image = null;
} else {

    // CHECK IF THE IMAGE SIZE IS LARGDER THAN 3MB
    if ($image_size > 4000000) {
        $_SESSION['validate'] = "large";
        echo "<script>window.location.href='.?folder=pages/&page=admin-add-photo&error=1';</script>";
        exit();
    }


    // ALLOWED FILE TYPES
    $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
    $allowed_extensions = array("jpg", "jpeg", "png");


    // CHECK IF THE FILE TYPE IS NOT IN THW ALLOWED TYPES
    if (!in_array($image_ext, $allowed_extensions)) {
        $_SESSION['validate'] = "not-allowed";
        echo "<script>window.location.href='.?folder=pages/&page=admin-add-photo&error=1';</script>";
        exit();
    }


    // GENERATE A UNIQUE NAME FOR THE IMAGE
    $image = md5(microtime()) . '.' . $image_ext;


    // CHECK IF THE PROFILE FOLDER EXISTS, IF NOT CREATE IT
    if (!file_exists('profile')) {
        mkdir('profile', 0777, true);
    }


    // MOVE TE IMAGE TO THE PROFILE FOLDER
    move_uploaded_file($image_temp, "profile/".$image);
}

// Query
// UPDATING THE IMAGE IN THE registered_incharge TABLE
$sql = mysqli_query($conn,"UPDATE registered_admin SET profile_picture='$image' WHERE admin_id = '$userid'");

$_SESSION['validate'] = "update";
echo "<script>window.location.href='.?folder=pages/&page=admin-add-photo&success=1';</script>";

?>
