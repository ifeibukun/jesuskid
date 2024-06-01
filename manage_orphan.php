<?php 
session_start();
include "database_connect.php";
?>

<?php
include "database_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the orphan ID from the POST data
    $id = $_POST['id'];

    // Retrieve the orphan record from the database based on the ID
    $query = "SELECT * FROM orphans WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Return the orphan record data as JSON
    echo json_encode($row);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Orphan</title>
    <link rel="stylesheet" type="text/css" href="bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css\style.css">
    <link rel="stylesheet" type="text/css" href="fontaweome\css\all.css">
    <style>
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
        }

        header h1 {
            margin: 0;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            bottom: 0;
        }

        .main-footer {
            margin-top: 400px;
        }
    </style>
</head>
<body>
    <!-- Update Modal -->
    <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Orphan's Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="post" id="update_form">
          <div class="modal-body">
                <!-- Your update form fields here -->
          </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times">&nbsp;</i>Close</button>
            <button type="submit" id="update" class="btn btn-success"><i class="fa fa-check">&nbsp;</i>Update</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Close Modal-->
    <!-- Delete Modal -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Orphans Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="post" id="delete_form">
          <div class="modal-body">
                <div class="form-group">
                    <label class="label" for=""><b>Are you sure you want to delete this user?</b> </label>
                    <input type="hidden" name="deleteid" id="deleteid" value="">
                </div>
            </div>
              <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times">&nbsp;</i>Close</button>
            <button type="submit" class="btn btn-success"><i class="fa fa-check">&nbsp;</i>Delete</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Close Modal-->
    <header>
    <h1>Manage Orphan</h1>
    <nav>
        <ul>
            <li><a href="admin_homepage.php">Home</a></li>
            <li><a href="manage_orphan.php">Manage Orphans</a></li>
            <li><a href="manage_donators.php">Manage Donators</a></li>
            <li><a href="admin_profile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li> 
        </ul>
    </nav>
</header>

<div class="row">
    <div class="col-2"></div>
    <div class="">
        <div id="userstable">
            <table class="table display table-bordered table-striped table-hover table-responsive" cellspacing="0" width="100" id="userstable">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Fullname</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Status</th>
                        <th>Guardians Name</th>
                        <th>Guardians Address</th>
                        <th>Guardians Occupation</th>
                        <th>Guardians Tel</th>
                        <th>Guardians Email</th>
                        <th>User</th>
                    </tr>
                </thead>   
                <?php
                $counter = 0;
                $query = ("SELECT * FROM orphans ORDER BY fullname ASC");
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo ++$counter; ?></td>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['stat']; ?></td>
                    <td><?php echo $row['gname']; ?></td>
                    <td><?php echo $row['gaddress']; ?></td>
                    <td><?php echo $row['goccupation']; ?></td>
                    <td><?php echo $row['gtel']; ?></td>
                    <td><?php echo $row['gemail']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
</div>

<div class="button-container">
    <button id="AddModalButton" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">Add Orphan</button>
    <button id="DeleteModalButton" class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal">Delete Orphan</button>
    <button id="EditModalButton" class="btn btn-success" data-toggle="modal" data-target="#EditModal">Edit Orphan</button>
</div>

<script type="text/javascript" src="..\jquery\jquery.js"></script>
<script type="text/javascript" src="..\bootstrap\dist\js\bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        // Ajax request and form submission scripts here
    });
    
    // Add click event handler for the add button
    $("#AddModalButton").click(function(){
        $("#AddModal").modal("show");
    });

    // Add click event handler for the delete button
    $("#DeleteModalButton").click(function(){
        $("#DeleteModal").modal("show");
    });

    // Add click event handler for the edit button
    $("#EditModalButton").click(function(){
        $("#EditModal").modal("show");
    });
</script>

<div class="main-footer">
    <footer>
        <p>&copy; 2024 Admin Dashboard. All rights reserved.</p>
    </footer>
</div>
</body>
</html>
