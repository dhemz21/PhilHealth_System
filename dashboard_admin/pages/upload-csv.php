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
                <form action=".?folder=action/&page=save-csv" method="POST" enctype="multipart/form-data">
                    
                    <div class="image mb-2">
                        <label for="image">File:</label>
                        <input type="file" name="file" id="image" accept=".csv" required>
                    </div>
                    <button type="submit" class="btn text-white" id="save">Save</button>
                    <button type="reset" class="btn btn-secondary" onclick="window.location.href='.?page=add-employee'">Close</button>

                </form>
            </div>
            <div class="col-12 mt-3 mb-2">
                <p class="text-start"><a href=".?page=add-employee" class="text-decoration-none">Go Back</a> </p>
                </div>
        </div>
    </div>

<?php
if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'not-allowed') {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'The file is not allowed to upload!'
        })
    </script>
<?php
    unset($_SESSION['validate']);
}
?>
</body>

</html>
</div>
