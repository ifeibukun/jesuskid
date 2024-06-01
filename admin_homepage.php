<?php 
session_start();
include "database_connect.php";

// session_start();
$email = $_SESSION['email'];
$query = ("SELECT * FROM administrators WHERE email = '$email'");
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$fullname = $row['fullname'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="styles.css"> <!-- Link to CSS stylesheet -->
<style>
    /* Global styles */
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

main {
    padding: 20px;
}

.welcome {
    margin-bottom: 30px;
}

.user-stats {
    background-color: blue;
    padding: 20px;
    color: white;
}
ul li{
    text-decoration: none;
    list-style-type: none;
}
.user-types{
    text-align: center;
}
.manage-user{
    color: #fff;
}
footer {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
}
.manage-users{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: orangered;
}
.users{
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    padding: 40px 10px;
}    

a{
    color: #fff;
    text-decoration: none;

}
.donators{
    background-color: #333;
    padding: 20px 20px;
}
.orphans{
    background-color: grey;
    padding: 20px 20px;
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

<main>
    <section class="welcome">
        <h2>Welcome, <span><?php  echo $fullname ?></span></h2>
        <p>This is your dashboard where you can manage users, settings, and more.</p>
    </section>

    <section class="user-stats">
        <h2 class="user-types">User Types</h2>
        <ul>
            <li>Users Type: </li>
            <li>Orpahns</li>
            <li>Donators</li>
        </ul>
    </section>

    <div class="manage-users">
        <h2 class="manage-user">Manage Users</h2>
        <div class="users">
            <div class="donators">
                <a href="manage_donators.php">Manage Donators</a>
            </div>

            <div class="orphans">
                <a href="manage_orphan.php">Manage Orphans</a>
            </div>
        </div>
</div>
</main>

<footer>
    <p>&copy; 2024 Admin Dashboard. All rights reserved.</p>
</footer>

</body>
</html>