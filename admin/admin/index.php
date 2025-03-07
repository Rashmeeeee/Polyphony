<?php
include('security.php');

include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
   
  </div>

  <!-- Content Row -->
  <div class="row">

    
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php 
              require 'database/dbconfig.php';
              $query = "SELECT id FROM register1 ORDER BY id";
              $query_run = mysqli_query($connection, $query);

              $row = mysqli_num_rows($query_run);

              echo '<h1> '.$row.' </h1>';
                ?>
               <h4>Total Admin: *</h4>

              </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

     
        <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered User</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php 
              require 'database/dbconfig1.php';
              $query = "SELECT id FROM tbl_user1 ORDER BY id";
              $query_run = mysqli_query($connection, $query);

              $row = mysqli_num_rows($query_run);

              echo '<h1> '.$row.' </h1>';
                ?>
               <h4>Total User: *</h4>

              </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Feedback</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php 
              require 'database/dbconfig1.php';
              $query = "SELECT id FROM feedback ORDER BY id";
              $query_run = mysqli_query($connection, $query);

              $row = mysqli_num_rows($query_run);

              echo '<h1> '.$row.' </h1>';
                ?>
               <h4>Total Feedback: *</h4>

              </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->








  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>