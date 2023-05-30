<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="EVSU-OC STUDENTS">
    <title>PhilHealth System</title>
    <link rel="icon" href="../img/logo.png" type="image/x-icon">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="../css/admin.css">

    <!-- FontawesomeIcon online -->
    <link rel="stylesheet" href="../vendors/fontawesome-free/css/all.min.css">

    <!-- BOOTSTRAP 5 -->
    <link rel="stylesheet" href="../bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <script src="../bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>

    <!-- SWEETALERT2 -->
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

</head>

<?php
session_start();

?>
<body>
    <main class="main-wrapper">
        <div class="main_container">
            <img src="../img/login.jpg" class="emp_img" alt="image">
            <div class="form-container">
                <div class="my_title">
                    <h1>
                        OTP Confirmation
                    </h1>
                </div>
                <hr>
                <br>
                <form class="needs-validation" method="POST" action="../action/verify_token.php" novalidate>
                <input type="hidden" name="email" class="input form-control rounded-0">
                    <div class="mb-4 mt-5">
                        <label for="text" class="form-label text-white">OTP:</label>
                        <input type="text" id="text" class="form-control rounded-0 p-2" name="otp" placeholder="Confirm your OTP" required>
                    </div>  
                    <button type="submit" name="submit" class="btn btn-success w-100 rounded-0">Submit</button>    
                    <div class="go_back">
                    <a href="admin_forgot.php"><i class="fas fa-arrow-left"></i> Go back</a>
                    </div> 
                </form>
            </div>
        </div>
    </main>
    <script src="../js/form-validation.js"></script>


    <?php
  if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'successful') {
  ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Verified ',
        text: 'Your OTP reset code has been sent!'
      })
    </script>
  <?php
    unset($_SESSION['validate']);
  }
  ?>

  <?php
  if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'unsuccessful') {
  ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text:'Invalid OTP, Please check your OTP code'
      })
    </script>
  <?php
    unset($_SESSION['validate']);
  }
  ?>
</body>


</body>

</html>