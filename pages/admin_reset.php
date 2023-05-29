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


  <script type="text/javascript">
    function preventBack() {
      window.history.forward()
    };
    setTimeout("preventBack()", 0);
    window.onunload - function() {
      null;
    }
  </script>
</head>

<body>
<main class="main-wrapper">
        <div class="main_container">
            <img src="../img/login.jpg" class="emp_img" alt="image">
            <div class="form-container">
                <div class="my_title">
                    <h1>
                        reset password
                    </h1>
                </div>
                <form class="needs-validation" method="POST" action="../action/admin_update.php" novalidate">
                <?php
                // Connect to the database
                require_once('../database/db_conn.php');
                // Get the user information from the database using the ID number
                $email = $_SESSION['email'];
                $query = "SELECT email FROM tbl_admin WHERE email = '$email'";
                $result = mysqli_query($conn, $query);
                    // Check if the query was successful
                if (!$result) {
                  die('Query failed: ' . mysqli_error($conn));
                }

                $row = mysqli_fetch_assoc($result);
                ?>
                    <div class="row">
                    <div class="col-12 mt-3">
                        <label for="email" class="form-label text-white">Email:</label>
                        <input type="email" id="email" class="form-control rounded-0 p-2" name="email" value="<?php echo $row['email']; ?>"  readonly>
                    </div>
                    <div class="mt-1">
                    <label for="email" class="form-label text-white">New Password:</label>
                        <div class="input-group">
                            <input class="form-control rounded-0 p-2 mb-2" type="password" oninput="confirmValidation()" name="password" placeholder="Enter new password" id="password" required="true"  required>
                            <div class="input-group-append">
                                <span class="input-group-text rounded-0" id="eye" onclick="password_show_hide();">
                                <i class="fa fa-eye" id="show_eye"></i>
                                <i class="fa fa-eye-slash d-none" id="hide_eye"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mt-1">
                        <label for="email" class="form-label text-white">Re-Type Password:</label>
                        <div class="input-group">
                            <input class="form-control rounded-0 p-2 mb-2" type="password" oninput="confirmValidation()" name="confirm-password" placeholder="Confirm new password" id="confirm-password" required="true" required>
                            <div class="input-group-append">
                                <span class="input-group-text rounded-0" id="eye" onclick="confirm_password_show_hide();">
                                <i class="fa fa-eye" id="show_eye_confirm"></i>
                                <i class="fa fa-eye-slash d-none" id="hide_eye_confirm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit" id="btn" class="btn btn-primary w-100 rounded-0 mt-4">Submit</button>

                    </div>
                </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Validation -->
    <script src="../js/form-validation.js"></script>
   
<?php
if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'successful') {
?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Verified ',
      text: 'Your request is verified!'
    })
  </script>
<?php
  unset($_SESSION['validate']);
}
?>

<?php
if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'error') {
?>
  <script>
    Swal.fire({
      icon: 'error',
      title: 'error',
      text: 'Something went wrong!'
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

    function confirm_password_show_hide() {
      var x = document.getElementById("confirm-password");
      var show_eye = document.getElementById("show_eye_confirm");
      var hide_eye = document.getElementById("hide_eye_confirm");
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

    function confirmValidation() {
      var pass = document.getElementById("password").value;
      var con_pass = document.getElementById("confirm-password").value;
      if (con_pass != "") {
        if (pass == con_pass && con_pass != "") {
          const element = document.getElementById("confirm-password");
          element.className = "input form-control is-valid";
          document.getElementById("btn").disabled = false;
          //PASSWORD MATCHED

        } else {
          const element = document.getElementById("confirm-password");
          element.className = "input form-control is-invalid";
          document.getElementById("btn").disabled = true;
          //PASSWORD IS WRONG   
        }
      }
    }
  </script>
     -->
</body>
</html>