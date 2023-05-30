<aside class="main-sidebar sidebar-dark-success elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <img src="../img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle">
    <span class="brand-text font-weight-light">PhilHealth</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image" id="profile-image">
      <?php
        include_once('action/display-profile.php');
        ?>
        <img src="profile/<?php echo $image; ?>" alt="Add Photo">
      </div>
      <div class="info">
        <a href=".?page=admin-info" class="d-block"><?php echo $_SESSION['firstname'] ?> <?php echo $_SESSION['lastname'] ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <!-- Button section -->
        <div class="row">
          <div class="col-12 mb-2 ">
            <div id="btn-menu">
              <a href=".?folder=pages/&page=admin-info" class="btn rounded-0 w-100 text-white" id="edit-profile"><i class="nav-icon fas fa-edit"></i> Edit Profile</a>
            </div>
          </div>
        </div>
 
        <!-- End -->
        <li class="nav-item menu-open">
          <a href="index.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>       

        <!-- <div class="row">
          <div class="col-12 mb-2 mt-2 ">
            <div id="btn-menu">
              <a href=".?folder=pages/&page=registered-event" class="btn rounded-0 text-white w-100" id="add"><i class="nav-icon fas fa-pen-square"></i> Add Event</a>
            </div>
          </div>
        </div> -->
        <li class="nav-item">
        <a href=".?page=add-employee" class="nav-link">
        <i class="nav-icon fas fa-user-tie"></i>
          <p>
            Add Employee
          </p>
        </a>
      </li>

           <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="nav-icon fas fa-image"></i>
            <p>
              Images
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right"></span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href=".?page=add-image" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Upload Image</p>
              </a>
            </li>     
            <li class="nav-item">
              <a href=".?page=sync-file" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Images</p>
              </a>
            </li>               
      </ul>

        <!-- <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user-tie"></i>
            <p>
              Employees
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right"></span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href=".?page=event-list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Employee</p>
              </a>
            </li>     
            <li class="nav-item">
              <a href=".?page=sync-file" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Added Employees</p>
              </a>
            </li>               
      </ul> -->
      <li class="nav-item">
        <a href="action/logout.php?page=logout" class="nav-link">
          <i class="nav-icon fa-solid fa-right-from-bracket"></i>
          <p>
            Logout
          </p>
        </a>
      </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>