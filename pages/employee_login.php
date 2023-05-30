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
                        employee login
                    </h1>
                </div>
                <form action="">
                    <div class="mb-3 mt-5">
                        <label for="email" class="form-label text-white">Username:</label>
                        <input type="email" class="form-control rounded-0 p-2" placeholder="Enter your username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-white">Password:</label>
                        <div class="input-group">
                            <input class="form-control rounded-0 p-2 mb-2" type="password" name="" placeholder="Enter your password" id="password"  required>
                            <div class="input-group-append">
                                <span class="input-group-text rounded-0" id="eye" onclick="password_show_hide();">
                                <i class="fa fa-eye" id="show_eye"></i>
                                <i class="fa fa-eye-slash d-none" id="hide_eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning text-white fw-bold w-100 rounded-0">LOGIN</button>
                    <div class="for_container">
                        <a href="employee_forgot.php">Forgot password ?</a>
                    </div>
                    <div class="reg_for_container"><p>No account?</p>
                        <a href="employee_confirm.php">Register</a>
                    </div>
                    <div class="go_back">
                    <a href="../index.php"><i class="fas fa-arrow-left"></i> Back to homepage</a>
                    </div>

                </div>

                </form>
            </div>
        </div>
    </main>
    <script src="../js/form-validation.js"></script>

    <?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'inserted') {
      ?>
          <script>
              Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: ' You successfuly registered!'
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
        title: 'Invalid input ',
        text: 'Please check your information!',
      })
    </script>
  <?php
    unset($_SESSION['validate']);
  }
  ?>

<?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'successful') {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Updated',
                text: ' Your password successully updated!'
            })
        </script>
    <?php
        unset($_SESSION['validate']);
    }
    ?>

    <script>
    function password_show_hide() {
      var x = document.getElementById("password");
      var show_eye = document.getElementById("show_eye");
      var hide_eye = document.getElementById("hide_eye");
      hide_eye.classList.remove("d-none");
      if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
      } else {
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
      }
    }
  </script>
</body>

</html>