<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-darkblue">User Feedback</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <?php
                // Database connection
                $connection = mysqli_connect("localhost", "root", "", "adminpanel");

                // Fetch feedback records, using the correct user table (tbl_user1)
                $query = "SELECT f.id, f.feedback, f.created_at, u.name AS username 
                          FROM feedback f 
                          JOIN tbl_user1 u ON f.user_id = u.id 
                          ORDER BY f.created_at DESC";
                $query_run = mysqli_query($connection, $query);
                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Feedback</th>
                            <th>Date Submitted</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(mysqli_num_rows($query_run) > 0)
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['feedback']; ?></td>
                            <td><?php echo date("d M Y H:i", strtotime($row['created_at'])); ?></td>
                            <td>
                                <form action="code1.php" method="post">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="delete_feedback_btn" class="btn btn-danger">DELETE</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        else 
                        {
                            echo "<tr><td colspan='5'>No Feedback Found</td></tr>";
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
