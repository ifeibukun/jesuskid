<?php 

include "database_connect.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="bootstrap\dist\css\bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css\style.css">
	<link rel="stylesheet" type="text/css" href="fontaweome\css\all.css">
    <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
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
    text-decoration: none;
}
        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        h1{
            text-align: center;
        }
        #donators{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .table {
            margin-top: 10px;
            margin-left: 3%;
            max-width: 95%;
        }
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
            <li><a href="admin_profile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>
<div class="row">
			<div class="col-2">
			
	</div>
	
	<div class="">
		<!--<h2 align="center"> <button id="add" class="btn btn-primary">Add Student <i class="fa fa-plus"></i></button></h2>-->
		<div id="userstable">
			<table class="table display table-bordered table-striped table-hover table-responsive" cellspacing="0" width="100" id="userstable">
		        <thread>
		        	<tr><th>S/N</th><th>Fullname</th><th>Email</th><th>Amount</th><th>Messages</th></tr>
		        </thread>   
		            <?php
		            $counter = 0;
			            $query = ("SELECT * FROM donators ORDER BY fullname ASC");
		                $result = mysqli_query($conn, $query);
		                while($row = mysqli_fetch_assoc($result)){
		            ?>
			    <tr>
			    	<div class="a"><td><?php echo ++$counter; ?></td><td><?php echo $row['fullname']; ?></td><td><?php echo $row['d_email']; ?></td><td><?php echo $row['amount']; ?></td><td><?php echo $row['messages']; ?></td>
                        </tr>
                        <?php }?>
			
			</table>
		</div>
	</div>
</div>

        

<footer>
    <p>&copy; 2024 Admin Dashboard. All rights reserved.</p>
</footer>
</body>
</html>