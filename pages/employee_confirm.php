<!DOCTYPE html>
<html lang="en">
<?php
session_start();

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="EVSU-OC STUDENTS">
    <title>PhilHealth System</title>
    <link rel="icon" href="../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/employee.css">
    <link rel="stylesheet" href="../bootstrap-5.2.3-dist/css/bootstrap.min.css">

    <!-- FontawesomeIcon online -->
    <link rel="stylesheet" href="../vendors/fontawesome-free/css/all.min.css">

    <script src="../bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>

    <!-- SWEETALERT2 -->
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
</head>
<body>
    <main class="main-wrapper">
        <div class="main_container">
            <img src="../img/login.jpg" class="emp_img" alt="image">
            <div class="form-container">
                <div class="my_title">
                    <h1>
                        Email Confirmation
                    </h1>
                </div>
                <hr>
                <br>
                <form class="needs-validation" method="POST" action="../action/employee_regEmail.php" novalidate>
                    <div class="mb-4 mt-5">
                        <label for="email" class="form-label text-white">Email address:</label>
                        <input type="email" id="email"  class="form-control rounded-0 p-2" placeholder="Confirm your email" name="email" required>
                    </div>  
                    <button type="submit" name="submit" class="btn btn-warning text-white w-100 rounded-0">Submit</button> 
                    <div class="go_back">
                    <a href="employee_login.php"><i class="fas fa-arrow-left"></i> Go back</a>
                    </div>  
                </form>
            </div>
        </div>
    </main>
    <script src="../js/form-validation.js"></script>

<?php
  if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'unsuccessful') {
  ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: "Error",
        text: 'Email not exist, Please check your Information!',
      })
    </script>
  <?php
    unset($_SESSION['validate']);
  }
  ?>
</body>

</html>