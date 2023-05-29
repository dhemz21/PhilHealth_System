<!DOCTYPE html>
<html lang="en">

<body>
    <div class="container-fluid pb-3">
        <?php
        if (isset($_GET['success'])) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        Your password successully updated!
                        <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                            <span aria-hidden='true'>&times</span>
                        </button>
                </div>";
        } else {
        }
        ?>
        <div class="card rounded-0 shadow-sm">
            <div class="card-header text-dark rounded-0">
                <h3 class="card-title"><strong>Change your Password</strong></h3>
            </div>
            <div class="card-body">
                <?php
                require_once("../database/db_conn.php");
                $userid = $_SESSION['admin_id'];
                $sql = mysqli_query($conn, "SELECT * FROM registered_admin WHERE admin_id = '$userid'");
                while ($getData = mysqli_fetch_array($sql)) {

                ?>
                    <form action=".?folder=action/&page=update-password" method="POST" enctype="multipart/form-data">

                        <div class="profile-image">
                            <img src="profile/<?php echo $image; ?>" alt="Profile Picture">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="hidden" name="admin_id" value="<?php echo $getData['admin_id']; ?>">
                                <label for="user">Username</label>
                                <input type="text" class="form-control" value="<?php echo $getData['username']; ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="password">New Password</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0" id="lock"><i class="fa fa-lock"></i></span>
                                    </div>
                                    <input type="password" oninput="confirmValidation()" class="input form-control" name="password" id="password" placeholder=" New Password" 
                                    required="true" aria-label="password" required />
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-0" onclick="password_show_hide();">
                                            <i class="fa fa-eye" id="show_eye"></i>
                                            <i class="fa fa-eye-slash d-none" id="hide_eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="password">Confirm Password</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text rounded-0" id="lock"><i class="fa fa-lock"></i></span>
                                    </div>
                                    <input type="password" oninput="confirmValidation()" class="input form-control" name="confirm-password" id="confirm-password" 
                                    placeholder="Confirm Password" required="true" aria-label="Confirm-password" required />
                                    <div class="input-group-append">
                                        <span class="input-group-text rounded-0" onclick="confirm_password_show_hide();">
                                            <i class="fa fa-eye" id="show_eye_confirm"></i>
                                            <i class="fa fa-eye-slash d-none" id="hide_eye_confirm"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <?php } ?>
                    <button type="submit" id="save" class="btn text-white">Save</button>
                    <button type="reset" class="btn btn-secondary" onclick="window.location.href='.?page=edit-admin'">Close</button>

                    </form>
            </div>
            <div class="col-12 mt-3 mb-2">
                <p class="text-start"><a href=".?page=edit-admin" class="text-decoration-none">Go Back</a> </p>
            </div>
        </div>
    </div>
    
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
          document.getElementById("save").disabled = false;
          //PASSWORD MATCHED

        } else {
          const element = document.getElementById("confirm-password");
          element.className = "input form-control is-invalid";
          document.getElementById("save").disabled = true;
          //PASSWORD IS WRONG   
        }
      }
    }
  </script>

</body>

</html>
</div>