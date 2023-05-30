<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .profile {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .profile img{
            width: 100px;
            height: 100px;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="container-fluid pb-3">

        <div class="card rounded-0 shadow-sm">
            <div class="card-header text-dark rounded-0">
                <h3 class="card-title"><strong>Upload Employee csv</strong></h3>
            </div>
            <div class="card-body">
                <form action=".?folder=action/&page=upload_image" method="POST" enctype="multipart/form-data">
                    
                    <div class="image mb-2">
                        <label for="image">File:</label>
                        <input type="file" name="image[]" id="image" accept="image/*" multiple required>
                    </div>
                    <button type="submit" class="btn text-white" id="save">Save</button>
                    <button type="reset" class="btn btn-secondary" onclick="window.location.href='index.php'">Close</button>

                </form>
            </div>
            <div class="col-12 mt-3 mb-2">
                <p class="text-start"><a href="index.php" class="text-decoration-none">Go Back</a> </p>
                </div>
        </div>
    </div>
</body>
<?php
    if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'successful') {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Added',
                text: ' You successully added an image!'
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
                text: ' Error uploading the file!'
            })
        </script>
    <?php
        unset($_SESSION['validate']);
    }
    ?>

</html>
</div>
