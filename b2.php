<?php
session_start();
$cust = $_SESSION['custname'];
if(isset($_POST['cart'])){
    $food = "Coco Cola, Sprite, Fanta";
    $con = mysqli_connect('localhost','root','','hotel');
    $sql = "insert into cartorders values('$cust','$food',120,50,170);";
    $res = mysqli_query($con, $sql);
    mysqli_close($con);
    echo '<script>alert("Added to cart successfully")</script>';
}
if(isset($_POST['order'])){
    // session_start();
    $food = "Coco Cola, Sprite, Fanta";
    $con = mysqli_connect('localhost','root','','hotel');
    $sql = "Select price from cart where Food_Name='$food';";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_row($res);
    mysqli_close($con);
    $_SESSION['price'] = $row['0'];
    $_SESSION['product'] = $food;
    header('Location:order.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style>
            .grid{
                display: grid;
                grid-template-columns: auto auto;
                justify-content: center;
                column-gap: 90px;
                /* background-color: aqua; */
            }
            .grid2{
                display: grid;
                align-content: center;
            }
            img{
                border: 1px solid gray;
            }
            .but{
                padding: 15px;
                width: 120px;
                border-radius: 10px;
                border: 1px solid orange;
                background-color: orange;
                color: white;
                font-size: 14px;
            }
            .but:hover{
                background-color: chocolate;
                border-color: chocolate;
            }
        </style>
    </head>
    <body>
        
        <div class="grid">
            <div><img src="./Beverages/2.png" alt="1"></div>
            <div class="grid2">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div><button class="but" name="order">Order now</button></div><br><br>
                <div><button class="but" name="cart">Add to cart</button></div>
            </form>
            </div>
        </div>
    </body>
</html>