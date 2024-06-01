<?php
session_start();
ob_start();
include "database_connect.php";
$message = '';
if(isset($_POST['submit'])){
	$names = $_POST['Names'];
	$tel = $_POST['Tel'];
	$position = $_POST['Position'];
    $email = $_POST['Email'];
	$pass = $_POST['Pass'];
	$cpass = $_POST['CPass'];
	$query = ("SELECT email FROM administrators WHERE email = '$email'");
	$result = mysqli_query($conn , $query);
	$num = mysqli_num_rows($result);
	if($num > 0){
		echo 'OOPPSS!!! Email already exist, try another one!!!';
	}
	elseif($pass != $cpass){
		echo 'OOPPSS!!! Password does not match!!!';
	}
	else{
			$query = ("INSERT INTO administrators (fullname, phonenumber, position, email, pass ) VALUES('$names', '$tel', '$position', '$email', '$pass')");
			$result = mysqli_query($conn , $query);
			if($result){
				$message = '<div class="alert alert-success"> <a href="loginold.php" class="close" data-dismiss="alert" aria-label="close"> &times;</a> SUCCESS!!! Your registration was successful!!!</div>';
				//echo 'SUCCESS!!! Your registration was successful!!!';
			}
			else{
				$message = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close"> &times; </a> OPPSS!!! Registration failed!!! </div>';
				//echo 'OPPSS!!! Registration failed!!!';
			}
		}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Signup</title>
	<link rel="stylesheet" type="text/css" href="bootstrap\dist\css\bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css\style.css">
	<link rel="stylesheet" type="text/css" href="fontawesome\css\all.css">
	<style>
		body{
			background-color: blue;
		}
		.btn{
			background-color: blue;
		}
		h2{
			color: white;
		}
		.register{
			background-color: orangered;
		}
	</style>
	</style>
</head>
<body>
		<form action="" method="post">
			<div class="register">
				<?php echo $message; ?> 
				<h2 align="center"> ADMIN REGISTRATION </h2>
				<div class="main">
					<div class="form-group">
						<!--<label class="label" for="Names"> Full Name </label>-->
						<input type="text" name="Names" id="Names" class="form-control" placeholder="Fullname" required="required"> 
					</div>
					<div class="form-group">
						<!--<label class="label" for="Tel"> Phone Number </label>-->
						<input type="text" name="Tel" id="Tel" class="form-control" placeholder="Phone Number" required="required"> 
					</div>
					<div class="form-group">
						<!--<label class="label" for="Position"> Position</label>-->
						<input type="text" name="Position" id="Position" class="form-control" placeholder="Post" required="required">
					</div>
					<div class="form-group">
						<!--<label class="label" for="Email"> Email </label>-->
						<input type="email" name="Email" id="Email" class="form-control" placeholder="Email" required="required">
					</div>
					<div class="form-group">
						<!--<label class="label" for="Pass"> Password </label>-->
						<input type="password" name="Pass" id="Pass" class="form-control" placeholder="Password" required="required">
					</div>
					<div class="form-group">
						<!--<label class="label" for="CPass">Confirm Password</label>-->
						<input type="password" name="CPass" id="CPass" class="form-control" placeholder="Confirm password" required="required">
					 </div>
					<div class="footer-body">
					<button type="submit" name="submit" class="btn btn-primary form-control">Submit <i class="fa fa-sign-in-alt"></i> </button>
					<br/>Already have an account?<a href="login.php"> Click here to login </a>
					</div>
				</div>
			</div>
		</form>
<script type="text/javascript" src="bootstrap\dist\js\bootstrap.min.js"></script>
</body>
</html>