<?php
session_start(); 
include "database_connect.php";
$message = '';
if(isset($_POST['submit'])){
	$email = $_POST['Email'];
	$pass = $_POST['Pass'];
	$query = ("SELECT email, pass FROM administrators WHERE email = '$email' AND pass= '$pass' ");
	$result = mysqli_query($conn , $query);
	$num = mysqli_num_rows($result);
	if($num > 0){
		//echo 'Valid login details';
		$_SESSION['email'] = $email; 
		header('location:admin_homepage.php');
	}
	else{
		$message = '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a> Invalid Admin Credential!!!</div>';
	}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="navbar-img.jpg" type="image/x-icon">
    <link rel="stylesheet" href="login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login    </title>
    <style>
        *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    
}
.whole-container{
    display: flex;
    justify-content: center;
    align-items: center;
    align-content: center;
    height: 100vh;
}
.form-container{
    width: 30%;
    justify-content: center;
    display: flex;
    border-radius: 15px;
    height: 55%;
    align-items: center;
    
    /* border: 10px solid rgb(254, 70, 3); */
}
input{
    height: 35px;
    width: 100%;
    border: none;
    border-radius: 4px;
    opacity: 1px;
    /* border-radius: 5px;
    border-color:2px solid blue ;
    border:non ; */
}
#register{
    border-radius:0px ;
    color:white;
    background-color: orangered ;
    font-size: larger;
    font-weight: bolder;
    border-radius: 4px;
    
}
label{
    color:hsl(216, 100%, 31%) ;
    padding-bottom: 5%;
}
a{
    text-decoration: none;
    color:hsl(216, 100%, 31%)  ;
}
p{
    color: white;
    
}
button{
    /* background: none; */
    background: transparent;
    border: none;
    margin-top: 5%;
    cursor: pointer;
}
button:hover{
    
    color: orangered;   
    cursor: pointer;
}
@media (max-width:600px) {
    .form-container{
        width: 90%;
        /* border: 6px solid rgb(254, 70, 3); */
    }
}   
    </style>
</head>
<body style="font-family: Arial, Helvetica, sans-serif;">
    <div class="whole-container" style="background-image: url(image/orphanage_1.avif);background-repeat: no-repeat; background-size:cover;">
        <div class="form-container" style=" background-color: blue; box-shadow:none;">
        <form action="" method="POST" name="myform" onsubmit="return validation()">
        <div class="login-details" style="margin-bottom: 25px;">
        <p style="color: white; text-align: cente; font-weight:bolder; font-size: 35px;">Login</p>
        <br>
        </div>
        <label for="" style=" color:white; font-weight:lighter; font-size:15px">Email:</label><br>
        <input style="margin-top: 10px;" type="text" name="Email" id="user" >
        <br><br>
        <label for="" style="color: white; font-weight:lighter; font-size:15px">Password:</label> <br>
        <input style="margin-top: 10px;"  type="Password" name="Pass" id="pass">
        <br><br>    
        <input style="border:none;" background-color="orangered" type="submit" value="Log in" id="register" name="submit">
        <button style="color:white; margin-top:25px; font-weight:bolder; font-size:15px;" >Dont't Have an Account? <a href="signup_modal.php" style="color: white;">Sign Up</a></button>
    </form> 
        </div>
    </div>
    <script>
        validation = () =>{
  var name = document.myform.user.value;
  var password = document.myform.pass.value;

  if(name == ""){
    alert("Enter your email");
    return false;
  }
  if(password == ""){
    alert("Enter your password");
    return false;
  }
}

var btn = document.getElementById("register");
btn.addEventListener("mouseover", function(){
  btn.style.backgroundColor = "#333";
  btn.style.color = "orangered";
  btn.style.cursor = "pointer";
  btn.style.transition = "0.2s ease-in-out "
})

var btn = document.getElementById("register");
btn.addEventListener("mouseout", function(){
  btn.style.backgroundColor = "orangered";
  btn.style.color = "white";
  btn.style.cursor = "pointer";
})


        
    </script>
</body>
</html>    