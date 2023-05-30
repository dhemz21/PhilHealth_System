<?php
// DATABASE CONNECTION
require_once('../database/db_conn.php');

// Configuration
$uploadDirectory = "uploads/";

// Handle image upload
if (isset($_FILES["image"])) {
    $files = $_FILES["image"];
    $uploadedFileCount = count($files['name']);

    // Create a folder based on the current date
    $folderName = date("Y-m-d");
    $targetDirectory = $uploadDirectory . $folderName . "/";
    if (!is_dir($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }

    for ($i = 0; $i < $uploadedFileCount; $i++) {
        $file = array(
            'name' => $files['name'][$i],
            'type' => $files['type'][$i],
            'tmp_name' => $files['tmp_name'][$i],
            'error' => $files['error'][$i],
            'size' => $files['size'][$i]
        );

        $filename = basename($file["name"]);
        $filePath = $targetDirectory . $filename;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($file["tmp_name"], $filePath)) {
            // Insert image metadata into the database
            $sql = "INSERT INTO tbl_images (filename, filepath) VALUES ('$filename', '$filePath')";
            if ($conn->query($sql) !== true) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $_SESSION['validate'] = "error";
            echo "<script>window.location.href='.?folder=pages/&page=add-image&error=1';</script>";
        }
    }

    $_SESSION['validate'] = "successful";
    echo "<script>window.location.href='.?folder=pages/&page=add-image&success=1';</script>";
}

$conn->close();
?>