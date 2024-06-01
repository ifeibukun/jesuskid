<?php
session_start();
ob_start();
include "database_connect.php";
$message = '';
if(isset($_POST['submit'])){
	$names = $_POST['Names'];
	$gender = $_POST['Gender'];
	$age = $_POST['Age'];
    $status = $_POST['Status'];
	$gname = $_POST['GName'];
	$gaddress = $_POST['GAddress'];
	$goccupation = $_POST['GOccupation'];
	$gtel = $_POST['GTel'];
	$gemail = $_POST['GEmail'];
	$user = $_POST['User'];
	$query = ("SELECT username FROM orphans WHERE username = '$user'");
	$result = mysqli_query($conn , $query);
	$num = mysqli_num_rows($result);
	if($num > 0){
		echo 'OOPPSS!!! Username already exist, try another one!!!';
	}
	
	else{
			$query = ("INSERT INTO orphans (fullname, gender, age, stat, gname, gaddress, goccupation, gtel, gemail, username ) VALUES('$names', '$gender', '$age', '$status', '$gname', '$gaddress', '$goccupation', '$gtel', '$gemail', '$user')");
			$result = mysqli_query($conn , $query);
			if($result){
				$message = '<div class="alert alert-success"> <a href="index.php" class="close" data-dismiss="alert" aria-label="close"> &times;</a> SUCCESS!!! Your registration was successful!!!</div>';
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
	<title>Orphan Registration</title>
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
</head>
<body>
		<form action="" method="post">
			<div class="register">
				<?php echo $message; ?> 
				<h2 align="center"> ORPHAN REGISTRATION </h2>
				<div class="main">
					<div class="form-group">
						<!--<label class="label" for="Names"> Full Name </label>-->
						<input type="text" name="Names" id="Names" class="form-control" placeholder="Fullname" required="required"> 
					</div>
					<div class="form-group">
						<!--<label class="label" for="Tel"> Gender </label>-->
						<select name="Gender" id="Gender" class="form-control">
							<option>Select your gender</option>
							<option>Male</option>
							<option>Female</option>
						</select>
					</div>
					<div class="form-group">
						<!--<label class="label" for="Age"> Age</label>-->
						<input type="text" name="Age" id="Age" class="form-control" placeholder="Phone number" required="required">
					</div>
					<div class="form-group">
						<!--<label class="label" for="Status"> Disability Status </label>-->
						<select name="Status" id="Status" class="form-control">
							<option>Cripple</option>
							<option>Deaf</option>
							<option>Dumb</option>
							<option>Deaf & Dumb</option>
						</select>
					</div>
					<div class="form-group">
						<!--<label class="label" for="GName"> Guardian's Name </label>-->
						<input type="text" name="GName" id="GName" class="form-control" placeholder="Guardians Fullname" required="required"> 
					</div>
					<div class="form-group">
						<!--<label class="label" for="GAddress"> Guardian's Address</label>-->
						<input type="text" name="GAddress" id="GAddress" class="form-control" placeholder="Guardians Address" required="required"> 
					</div>
					<div class="form-group">
						<!--<label class="label" for="GOccupation"> Guardian's Occupation </label>-->
						<input type="text" name="GOccupation" id="GOccupation" class="form-control" placeholder="Guardians Occupation" required="required"> 
					</div>
					<div class="form-group">
						<!--<label class="label" for="GTel"> Guardian's Phone Number </label>-->
						<input type="text" name="GTel" id="GTel" class="form-control" placeholder="Guardians Age" required="required"> 
					</div>
					<div class="form-group">
						<!--<label class="label" for="GEmail"> Guardian's Email </label>-->
						<input type="text" name="GEmail" id="GEmail" class="form-control" placeholder="Guardians Email" required="required"> 
					</div>
					<div class="form-group">
						<!--<label class="label" for="User"> Username </label>-->
						<input type="text" name="User" id="User" class="form-control" placeholder="Username" required="required"> 
					</div>
					<div class="footer-body">
					<button type="submit" name="submit" class="btn btn-primary form-control">Submit <i class="fa fa-sign-in-alt"></i> </button>
				
					</div>
				</div>
			</div>
		</form>
<script type="text/javascript" src="bootstrap\dist\js\bootstrap.min.js"></script>
</body>
</html>