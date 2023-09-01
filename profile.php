<?php
session_start();
$name = $_SESSION['custname'];
$user = $_SESSION['custuser'];
$email = $_SESSION['custmail'];
?>

<html>
    <head>
        <title></title>
        <style>
            body{
                font-family: 'Times New Roman', Times, serif;
                background-image: url(sasupa.png);
            }
            .grid{
                display: flex;
                flex-wrap: wrap-reverse;
                justify-content: space-evenly;
            }
            .details{
                /* display: flex; */
                border: 1px orange;
                width: 400px;
                margin: 50px;
                padding: 50px;
                border-radius: 20px;
                background-color: orangered;
                /* text-align: center; */
            }
            h1{
                color:white;
            }
            .lab{
                display: inline-block;
                width: 150px;
                font-size: 25px;
                font-weight: bold;
            }
            .name{
                font-size: 20px;
            }
        </style>
    </head>
    <body>
        <div class="grid">
            <div class="details">
                <h1>Your details:</h1>
                <label class="lab">Name: </label><span class="name"><?php echo $name?></span><br><br>
                <label class="lab">Username: </label><span class="name"><?php echo $user?></span><br><br>
                <label class="lab">Email: </label><span class="name"><?php echo $email?></span><br><br>
            </div>
            <div>
                <h1 style="color:orangered; background-color: white; padding: 10px; border-radius: 10px;">SASUPA</h1>
            </div>
        </div>
    </body>
</html>