<?php
$nameerr = $passerr = ' ';
if(isset($_POST['submit'])){
    $name = $_POST['username'];
    $pass = $_POST['password'];
    if(empty($name)){
        $nameerr = "<br>Please enter your usename";
    }
    else{
        if(empty($pass)){
            $passerr = "<br>Please enter your password";
        }
    }

    $con = mysqli_connect('localhost', 'root', '', 'hotel');
    $sql = "select Username, Password from customer where Username = '$name' and Password = '$pass'; ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == 1){
        session_start();
        $_SESSION['name'] = $_POST['username'];
        header("Location:book.php");
    }
    else{
        $nameerr = "<br>Please enter valid username/password";
    }


    if(!empty($name) && !empty($pass)){
        session_start();
        
        
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SASUPA Foods- Login</title>
    <link rel="icon" type="image/x-icon" href="icons8-street-food-64.png">
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        footer{
            margin-top: 100px;
            bottom: 0;
            /* margin-bottom: -8px; */
            padding: 0;
            background-color: orangered;
            color: white;
            font-size: 19px;
            /* width: 100%; */
        }
        
        * {
            /* box-sizing: border-box; */
            /* margin: 0; */
            /* padding: 0; */
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #F2F2F2;
            background-image: url("HD-wallpaper-hamburger-flames-fast-food-food.jpg");
            background-repeat: no-repeat;
            background-size: 1650px 900px;
            /* display: flex; */
            /* justify-content: center; */
            /* align-items: center; */
            /* height: 100vh; */
        }

        .glassy-login {
            background-color: rgba(255, 255, 255, 0.6);
            /* backdrop-filter: blur(10px); */
            width: 350px;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 150px;
        }

        h1 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            /* margin-top: 20px; */
            /* display: flex; */
            /* flex-direction: column; */
            /* width: 10px; */
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #333;
        }

        input {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
        }

        button {
            padding: 10px 20px;
            font-size: 18px;
            background-color: #FF5733;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 320px;
        }

        .other-links {
            text-align: center;
            margin-top: 20px;
        }

        a {
            color: #FF5733;
            text-decoration: none;
        }

        span {
            /* margin: 0 10px; */
            /* cursor: pointer; */
            /* Add an icon for password toggle here, e.g., background-image property */
        }

        /* Add these styles to the existing styles.css */
        body {
            margin: 0;
            padding: 0;
            /* To add space for the fixed navbar */
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #FF5733;
            padding: 10px 0;
            z-index: 1000;
            /* To ensure the navbar stays on top of other elements */
        }

        .container {
            /* margin-top: 200px; */
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        .cont{
            max-width: 1000px;
            /* background-color: #333; */
            padding: 20px;
            margin: 0 auto;
            margin-left: 0px;
        }

        /* .brand h1 {
            color: #fff;
            font-size: 24px;
            margin: 0;
        } */

        .menu {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items:flex-end;
            float: right;
        }

        .menu li {
            margin-left: 20px;
        }

        .menu a {
            text-decoration: none;
            color: #fff;
            font-size: 20px;
        }

        /* Responsive styles for the navigation bar */
        /* @media screen and (max-width: 600px) {
            .brand .title {
                font-size: 20px;
            }

            .menu {
                flex-direction: column;
                align-items: flex-start;
            }

            .menu li {
                margin: 10px 0;
            }
        } */

        /* Add these styles to the existing styles.css */
        .password-toggle {
            /* Adjust the width, height, and background-position as needed */
            width: 20px;
            height: 20px;
            background-position: center;
            background-repeat: no-repeat;
            cursor: pointer;
        }

        .password-visible {
            /* Add the URL to the visible eye icon image */
            background-image: url('visible.png');
        }

        .password-hidden {
            /* Add the URL to the hidden eye icon image */
            background-image: url('hide.png');
        }

        .err{
            color: red;
        }
        .title{
            list-style: none;
            font-size: 20px;
            color: white;
            float: left;
        }
        .logo{
            height: 30px;
            width: 30px;
            border-radius: 50%;
            background-color: white;
        }
        .logodiv{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .details{
            display: flex;
            flex-direction: column;
        }
        .developers{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            /* padding: 20px; */
        }
        .copy{
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="cont">
            <div class="brand">
                <li class="title"><img src="sasupalogo.png" alt="sasupa" height="50px" width="220px"></li>
            </div>
            <ul class="menu">
                <li><a href="#Home">Home</a></li>
                <li><a href="aboutus.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <!-- <li><a href="foods.html">Best Foods</a></li> -->
                <li><a href="revshower.php">Reviews</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="glassy-login">
            <h1>Welcome Food Lover!</h1>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?> ">
                <div class="form-group">
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" >
                    <span class="err"><?php echo $nameerr ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <br>
                    <input type="password" id="password" name="password" >
                    <span class="err"><?php echo $passerr ?></span>
                    <!-- <span class="password-toggle password-hidden" onclick="togglePasswordVisibility()"></span> -->
                </div>
                <button type="submit" name="submit">Login</button>
            </form>
            <div class="other-links">
                <a href="signup.php">Sign Up</a>
                <span>|</span>
                <a href="forgot_password.html">Forgot Password?</a>
            </div>
        </div>
        
    </div>
    <footer>
        <p>Developers:</p>
        <div class="developers">
            <div class="details">
                <div>Satish Pulleti</div>
                <div class="logodiv">
                    <div><a href="https://www.linkedin.com/in/satish-pulleti-b35238235/" target="_blank"><img src="linknew.png" alt="linkedin" class="logo"></a></div>
                    <div><a href=""><img src="insta.png" alt="instagram" class="logo"></a></div>
                    <div><a href=""><img src="twitternew.jpg" alt="twitter" class="logo"></a></div>
                </div>
            </div>
            <div class="details">
                <div>Pavan Kumar</div>
                <div class="logodiv">
                    <div><a href="" target="_blank"><img src="linknew.png" alt="linkedin" class="logo"></a></div>
                    <div><a href=""><img src="insta.png" alt="instagram" class="logo"></a></div>
                    <div><a href=""><img src="twitternew.jpg" alt="twitter" class="logo"></a></div>
                </div>
            </div>
            <div class="details">
                <div>Leela Sumanth</div>
                <div class="logodiv">
                    <div><a href=""><img src="linknew.png" alt="linkedin" class="logo"></a></div>
                    <div><a href=""><img src="insta.png" alt="instagram" class="logo"></a></div>
                    <div><a href=""><img src="twitternew.jpg" alt="twitter" class="logo"></a></div>
                </div>
            </div>
            <div class="details">
                <img src="sasupalogo.png" alt="sasupa" height="90px" width="300px">
            </div>
        </div>
        <div class="copy">Copyright &copy; 2023 Developers. All rights reserved.</div>
    </footer>
    <!-- <script src="script.js"></script> -->
</body>

</html>