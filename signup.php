<?php
$usererr = "";
if(isset($_POST['submit'])){
    $name = $_POST['fullname'];
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $con = mysqli_connect('localhost', 'root', '', 'hotel');
    // $sql = "Create table customer(Name varchar(20), Username varchar(20) Primary Key, Email varchar(30), Password varchar(20)); ";
    // $result = mysqli_query($con, $sql);
    $data = mysqli_query($con, "SELECT * FROM customer WHERE username='$user'");
    if(mysqli_num_rows($data) == 0){
        $sql = "Insert into customer values('$name', '$user', '$email', '$pass');";
        $result = mysqli_query($con, $sql);
    }
    else{
        $usererr = "Username already exists";
    }
    
    // if($result){
    //     echo "Table created successfully";
    // }
    // else{
    //     echo "Error: ".mysqli_error($con);
    // }
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glassy Sign Up Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        
        .glassy-login {
            background-color: rgba(255, 255, 255, 0.5);
            /* backdrop-filter: blur(10px); */
            width: 350px;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 150px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="glassy-login">
            <h1>Create an Account</h1>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?> ">
                <div class="form-group">
                    <label for="fullname">Full Name:</label><br>
                    <input type="text" id="fullname" name="fullname" required>
                </div>
                <div class="form-group">
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" required>
                    <span style="color: red;"><?php echo $usererr ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" name="submit">Sign Up</button>
            </form>
            <div class="other-links">
                <a href="index.php">Back to Login</a>
            </div>
        </div>
    </div>
</body>

</html>
