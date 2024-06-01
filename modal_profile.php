<?php 
include "database_connect.php";
?><!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/allcss">
    <style>
        /* Advanced styling for the modal */
		
    </style>
</head>
<body>

<header>
    <h1>Admin Dashboard</h1>
    <nav>
        <ul>
            <li><a href="admin_homepage.php">Home</a></li>
            <li><a href="manage_orphan.php">Manage Orphans</a></li>
            <li><a href="manage_donators.php">Manage Donators</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>

<div class="col-10" style="padding:10px;">
    <h2>Welcome, <?php echo $names; ?> </h2>
    <div id="myprofile">
        <!-- Your profile details here -->
    </div>
    <form action="" method="post">
        <div class="form-group">
            <input type="hidden" name="xid" value="<?php echo $email; ?>">
            <button type="submit" name="discard" class="btn btn-danger"><i class="fa fa-trash">&nbsp;</i>Delete My Account</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditModal"><i class="fa fa-edit">&nbsp;</i>Edit Profile</button>
        </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="update_form"> 
                <div class="modal-body">
                    <div class="form-group">
                        <label class="label" for="Names">Full Name</label>
                        <input type="text" name="Names" id="Names" class="form-control" value="<?php echo $names; ?>" required="required"> 
                    </div>
                    <div class="form-group">
                        <label class="label" for="Position">Position</label>
                        <input type="text" name="Position" id="Position" class="form-control" value="<?php echo $position; ?>" required="required">
                    </div>
                    <div class="form-group">
                        <label class="label" for="Pass">Password</label>
                        <input type="password" name="Pass" id="Pass" class="form-control" value="<?php echo $pass; ?>" required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal"><i class="fa fa-times">&nbsp;</i>Close</button>
                    <button type="submit" name="update" class="btn btn-success btn-save"><i class="fa fa-check">&nbsp;</i>Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>
