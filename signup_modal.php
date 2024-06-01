<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .modal{
            /* display: ; */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            transition: all 3s ;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }
        h2{
            color: white;
        }
        .modal-content{
            background-color: orangered;
            margin: 15% auto;
            padding: 50px 10px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            text-align: center;
        }
        .signup-btn{
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .click-button{
            border: none;
            color: white;
            background-color:grey;
            padding: 15px 25px ;
            border-radius: 4px;
            font-weight: bolder;
        }
        .click-button:hover{
            cursor: pointer;
            background-color: #333;
            color: orangered;
        }
    </style>
</head>
<body>
    <!-- button to trigger the modal -->
    <button class="signup-btn" onclick="openModal()">Sign Up</button>

    <!-- the modal -->
    <div class="modal" id="myModal">
        <div class="modal-content">
            <h2>Choose your role</h2>
            <button class="click-button" onclick="location.href ='admin_signup.php'; ">Admin</button>
            <button class="click-button" onclick="location.href = 'orphan_signup.php';">Orphan</button>
            <button class="click-button" onclick="closeModal()">Close Modal</button>
        </div>
    </div>
    <script>
        function openModal(){
            document.getElementById("myModal").style.transition = "1s"
            document.getElementById("myModal").style.display = "block";
        }
        function closeModal(){
            document.getElementById("myModal").style.display = "none";
        }
    </script>
</body>
</html>