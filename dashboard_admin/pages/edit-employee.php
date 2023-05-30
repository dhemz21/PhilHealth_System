<!DOCTYPE html>
<html lang="en">

<?php
include_once('action/display-profile.php');
?>

<body>
    <div class="container-fluid pb-2">

        <?php
        if (isset($_GET['success']) >= 1) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        Successully updated employee Information!
                        <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                            <span aria-hidden='true'>&times</span>
                        </button>
                </div>";
        } elseif (isset($_GET['error']) >= 1) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Error updating employee Information!
                        <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                            <span aria-hidden='true'>&times</span>
                        </button>
                </div>";
        } else {
        }
        ?>
        <div class="card shadow-sm rounded-0">
            <div class="card-header text-dark">
                <h3 class="card-title"><strong>Edit employee Information</strong></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
                <?php
                   $userid = $_GET['employee_id'];
                 $sql = mysqli_query($conn, "SELECT * FROM tbl_employee WHERE employee_id = '$userid'");
                 while ($getData = mysqli_fetch_array($sql)) {
                
                ?>
                <form action=".?folder=action/&page=update-employee" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <input type="hidden" name="employee_id" value="<?php echo $getData['employee_id']; ?>">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $getData['firstname']; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="middlename">Middle name</label>
                            <input type="text" class="form-control" id="middlename" name="middlename" value="<?php echo $getData['middlename']; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $getData['lastname']; ?>"required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $getData['email']; ?>" required>
                        </div>
                    </div>
                    <?php } ?>
                    <button type="submit" name="submit" class="btn text-white" id="save">Update</button>
                    <button type="reset" class="btn btn-secondary" onclick="window.location.href='.?page=add-employee'">Close</button>
                </form>
            </div>
            <div class="col-12 mt-3 mb-2">
                <p class="text-start"><a href=".?page=add-employee" class="text-decoration-none">Go Back</a> </p>
            </div>
        </div>
    </div>
    </div>
    </div>

    <?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'update') {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Updated',
                text: 'You successully updated the employee info!'
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
                title: 'Error',
                text: 'Error updating employee info!'
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