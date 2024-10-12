<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>





<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-darkblue">User Profile 
        
    </h6>
  </div>

  <div class="card-body">
    
 

    <div class="table-responsive">
      <?php
      $connection =mysqli_connect("localhost","root","","adminpanel");
      $query = "SELECT * FROM tbl_user1";
      $query_run = mysqli_query($connection, $query);
      ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Email </th>
            <th>Password</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
          <?php 
          if(mysqli_num_rows($query_run) > 0)
          {
            while($row = mysqli_fetch_assoc($query_run)){
            ?>

          
     
          <tr>
            <td><?php echo $row['id'];?> </td>
            <td><?php echo $row['name'];?> </td>
            <td><?php echo $row['email'];?> </td>
            <td><?php echo $row['password'];?> </td>
            
               <td>
                <form action="register_edit1.php" method="post">
                  <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
                <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                </form>
               </td>
               <td>
                <form action="code1.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id'];?>">
                <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
               </td>
          </tr>
          <?php
            }
          }
          else {
            echo "No Record Found";
          }
          ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>