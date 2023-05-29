<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Welcome Alert -->
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <p>
                Hi! <strong><?php echo $_SESSION['firstname'] ?>, Welcome to your Dashboard.
            </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

            <!-- TABLE INFORMATION SECTION -->
            <div class="row">
                
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box shadow-sm text-white" id="box1">
                    <div class="inner">
                        <h4>Registered Employee</h4>
                        <?php
                         require_once("../database/db_conn.php");
                          $query = 'SELECT COUNT(*) AS total FROM registered_employee';
                          $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                        
                          $row = mysqli_fetch_assoc($result);
                          $totalusers = $row['total'];

                          if (empty($totalusers)) {
                              echo '<h3> 0 </h3> ';
                          } else {
                              echo '<h3>' . $totalusers . '</h3> ';
                          }

                        ?>
                        <p><strong>Total Employees</strong> </p>
                    </div>
                    <div class="icon">
                    <i class="nav-icon fas fa-user-tie"></i> 
                    </div>
                    <a  class="small-box-footer"> <i class="fas fa-check-circle"></i></a>
                 </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

<!-- TABLE INFORMATION SECTION END -->
