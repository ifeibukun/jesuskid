<?php include "navbar.html"; ?>
<?php
include "database_connect.php";
    if(isset($_POST['submit'])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $amount = $_POST["amount"];
        $message = $_POST["message"];

        $query = "INSERT INTO donators (fullname, d_email, amount, messages) VALUES ('$name', '$email', '$amount', '$message')";
        $result = mysqli_query($conn, $query);
        
        // Send email notification to finance team
        $to = "ifeibukun45@gmail.com";
        $subject = "New Donation: Bank Transfer";
        $body = "Name: $name\n";
        $body .= "Email: $email\n";
        $body .= "Amount: $amount\n";
        $body .= "Message: $message\n";
        $headers = "From: $email";
    
        
        // Display confirmation message to the donor
        echo "<h2>Thank You!</h2>";
        echo "<p>Your donation request has been submitted. Please proceed with the bank transfer using the following instructions:</p>";
        echo "<p><b>Bank Name:<b> STERLING BANK <b> <bR>";
        echo "Account Name: <b> JESUS KIDS' ORPHANAGE <b><br>";
        echo "Account Number: <b> 0085380285 <b><br>";
        echo "Amount: $amount</p>";
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate Now</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Donate Now (Bank Transfer)</h2>
        <form action="" method="post">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="amount">Donation Amount:</label>
            <input type="text" id="amount" name="amount" min="1" required>
            
            <label for="message">Message (Optional):</label>
            <textarea id="message" name="message" rows="4" cols="50"></textarea>
            
            <input type="submit" name="submit" value="Submit Donation">
        </form>
    </div>
    <?php

    include "footer.html";
    
    ?>

</body>
</html>
