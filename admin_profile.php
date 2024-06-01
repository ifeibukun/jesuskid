<?php
session_start();
ob_start();
include "database_connect.php";
if((!isset($_SESSION['email'])) || ($_SESSION['email'] == '')){
    header('location: index.php');
    exit();
}
$email = $_SESSION['email'];
$query = ("SELECT * FROM administrators WHERE email = '$email'");
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result); 
$names = $row['fullname'];
$tel = $row['phonenumber'];
$position= $row['position'];
$email = $row['email'];
$pass = $row['pass'];

if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('location: index.php');
    exit();
}

$email = $_SESSION['email'];

// Fetch administrator's data
$query = "SELECT * FROM administrators WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Handle form submission
if (isset($_POST['update'])) {
    // Retrieve data from the form
    $newNames = $_POST['Names'];
    $newTel = $_POST['Tel'];
    $newPosition = $_POST['Position'];
    $newEmail = $_POST['Email'];
    $newPass = $_POST['Pass'];

    // Update the database with new values
    $update_query = "UPDATE administrators SET fullname='$newNames', phonenumber='$newTel', position='$newPosition', email='$newEmail', pass='$newPass' WHERE email='$email'";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        // Update session data if email is changed
        if ($newEmail != $email) {
            $_SESSION['email'] = $newEmail;
        }
        // Redirect to profile page
        header('Location: profile.php');
        exit;
    } else {
        // Output error message if update fails
        echo "Failed to update profile! Error: " . mysqli_error($conn);
    }
}
 


if (isset($_POST['discard'])) {
    $xid = $_POST['xid'];
    $query = ("DELETE FROM administrators WHERE email = '$email'");
    $result = mysqli_query($conn, $query);
    if($result){
        header('location :index.php');
    }
    else{
        echo 'OOPPSS!!! Failed to delete account !!!';
    }
}
?>

<!DOCTYPE html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/allcss">
    <style>
        /* Advanced styling for the modal */
        *{
            text-decoration: none;
            list-style-type: none;
        }
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
            list-style-type: none;
			text-decoration: none;
		}
        .modal-content {
            background-color: #f7f7f7;
            border-radius: 10px;
        }

        .modal-header {
            background-color: #333;
            color: #fff;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .modal-header .close {
            color: #fff;
        }

        .modal-footer {
            border-top: none;
        }

        .btn-close {
            background-color: #dc3545;
        }

        .btn-save {
            background-color: #28a745;
        }
        body {
            background-color: #f2f2f2; /* Set background color for the body */
        }

        #myprofile {
            background-color: #fff; /* Background color for the profile section */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
            width: 80%; /* Set the width of the profile section */
            max-width: 600px; /* Set maximum width to prevent stretching */
            margin: 50px auto; /* Center the profile section horizontally */
            text-align: center; /* Center align the content */
        }

        #myprofile .form-group {
            margin-bottom: 15px;
        }

        .btn-group {
            margin-top: 20px;
        }
        #editButton {
            margin-left: 10px;
        }
        #update_form{
            display: block;
        }
    </style>
</head>
<body>
    <!-- Modal -->

    <header>
    <h1>Profile</h1>
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


    <div id="myprofile">
        <h2>Welcome, <?php echo $names; ?> </h2>
        <div class="form-group">
            <label class="label">Full Name:</label>
            <?php echo $names; ?>
        </div>
        <div class="form-group">
            <label class="label">Phone Number:</label>
            <?php echo $tel; ?>
        </div>
        <div class="form-group">
            <label class="label">Position:</label>
            <?php echo $position; ?>
        </div>
        <div class="form-group">
            <label class="label">Email:</label>
            <?php echo $email; ?>
        </div>
        <div class="form-group">
            <label class="label">Password:</label>
            <?php echo $pass; ?>
        </div>
        <div class="form-group btn-group">
            <form action="" method="post">
                <input type="hidden" name="xid" value="<?php echo $email; ?>">
                <button type="submit" name="discard" class="btn btn-danger"><i class="fa fa-trash">&nbsp;</i>Delete My Account</button>
                <button onclick="showmodal()" type="button" id="editButton" class="btn btn-primary" ><i class="fa fa-edit">&nbsp;</i>Edit Profile</button>
            </form>
           
        </div>
    </div>


    <script type="text/javascript" src="../jquery/jquery.js"></script>
    <script type="text/javascript" src="../bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        
        <script>

        function showmodal(){
            var form = document.getElementById("update_form");
            form.style.display= "block";
        }


    // $(document).ready(function(){
    //     $('#editButton').click(function(){
    //         $('#EditModal').modal('show');
    //     });
    // });
</script>


</body>
</html>
