<?php
session_start();
ob_start();
include "database_connect.php";
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $query = "INSERT INTO message (name, email, message) VALUES ('$name', '$email', '$message')";
    $result = mysqli_query($conn , $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us - Orphanage</title>
<link rel="stylesheet" href="styles.css"> <!-- Link to CSS stylesheet -->
<style>
    
/* Reset styles */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

/* Global styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

/* header {
    background-color: #333;
    color: #fff;
    padding: 20px;
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
} */

main {
    padding: 20px;
}

.contact-us {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 30px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.contact-info,
.opening-hours,
.map,
.contact-form {
    margin-bottom: 20px;
}

.contact-info h3,
.opening-hours h3,
.map h3,
.contact-form h3 {
    color: #333;
    margin-bottom: 10px;
}

.contact-info p,
.opening-hours p,
.map p {
    /* color: #666; */
    margin-bottom: 5px;
}

.contact-form form {
    display: flex;
    flex-direction: column;
}

.contact-form input,
.contact-form textarea {
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.contact-form input[type="text"],
.contact-form input[type="email"],
.contact-form textarea {
    width: 100%;
}

.contact-form button {
    background-color: #333;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.contact-form button:hover {
    background-color: #555;
}
.main-black{
    color: #666;
}

/* footer {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
    position: fixed;
    bottom: 0;
    width: 100%;
} */
</style>
</head>
<body>
<?php  include "navbar.html"?>

<main>
    <section class="contact-us">
        <h2>Contact Us</h2>
        <br><br>
        <div class="contact-info">
            <div class="address">
                <h3>Visit Us</h3>
                <p class="main-black">123 Orphanage Street</p>
                <p class="main-black">Cityville, ABC</p>
                <p class="main-black">Country</p>
            </div>
            <div class="email">
                <h3>Email Us</h3>
                <p class="main-black" >Email: info@orphanage.com</p>
            </div>
            <div class="phone">
                <h3 >Call Us</h3>
                <p class="main-black">Phone: +234 708 909 9446</p>
            </div>
        </div>
        <div class="opening-hours">
            <h3>Opening Hours</h3>
            <p>Monday - Friday: 9:00 AM - 5:00 PM</p>
            <p>Saturday: 9:00 AM - 12:00 PM</p>
            <p>Sunday: Closed</p>
        </div>
        <div class="map">
            <h3>Location Map</h3>
            <!-- Embed Google Maps or other map service here -->
        </div>
        <div class="contact-form">
            <h3>Send Us a Message</h3>
            <form action="contactus.php" method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit" name="submit">Send Message</button>
            </form>
        </div>
    </section>
</main>

<?php include "footer.html"?>

</body>
</html>
