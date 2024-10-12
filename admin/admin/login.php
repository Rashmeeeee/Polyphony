<?php
session_start();

include('includes/header.php'); 
?>
<style>
    .status-message {
        background-color: #f0f8ff; /* Light background color */
        color: #333; /* Dark text color */
        padding: 10px;
        border: 1px solid #ccc; /* Optional: Add a border */
        border-radius: 5px; /* Optional: Rounded corners */
        font-size: 0.8em; /* Smaller text */
        margin: 10px 0; /* Margin for spacing */
    }
</style>
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <a href="http://localhost/mywebsite/html/index.php">
                    <div class="close">x</div>
                </a>
                <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                
                <!-- Updated session message for status -->
                <?php
                    if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                    {
                        echo '<div class="status-message"> '.$_SESSION['status'].' </div>';
                        unset($_SESSION['status']);
                    }
                ?>
              </div>

                <form class="user" action="code.php" method="POST">

                    <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                    </div>
            
                    <button type="submit" name="login_btn" class="btn btn-dark btn-user btn-block"> Login </button>
                    <hr>
                </form>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>

<?php
include('includes/scripts.php'); 
?>
