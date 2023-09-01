<?php
session_start();
$cust = $_SESSION['custname'];
$product = $_SESSION['product'];
$price = $_SESSION['price'];
$charges = 0;
if($price < 200){
    $charges = 50;
}
$total = $price + $charges;
if(isset($_POST['submit'])){
    $con = mysqli_connect('localhost','root','','hotel');
    // $sql = "insert into orderplaced values('$cust','$product', $price, $charges, $total);";
    // $res = mysqli_query($con, $sql);
   
    if($product == "All items in cart"){
        $add = "insert into orderplaced select * from cartorders";
        $res3 = mysqli_query($con, $add);
        $sql2="truncate cartorders";
        $res2 = mysqli_query($con, $sql2);
    }else{
        $sql = "insert into orderplaced values('$cust','$product', $price, $charges, $total);";
        $res = mysqli_query($con, $sql);
    }
    
    mysqli_close($con);
    header("location:Review.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="order-review.css">
    <style>
        .txtarea{
            width: 300px;
        }
        label {
            display: inline-block;
            width: 165px;
            /* text-align: center; */
        }
    </style>
</head>

<body>
    <div class="title">Sasupa</div>
    <div class="book">Book your Order !!!</div>
    <div class="flex">
    <div><img src="sasupalogo.png" alt=""></div>
    <div class="main">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <label for="">Name:</label><br>
            <input type="text" class="nam" required value="<?php echo $cust ?>"><br>
            <label for=""> Mobile No.:</label><br>
            <input type="number" class="nam" required><br>
            <!-- <label for="">Email ID:</label><input type="text"><br> -->
            <label for="">Address: </label><br><textarea name="" id="" cols="20" rows="5" required class="txtarea"></textarea><br>
            <label for="">Payment Options:</label><br>
            <div class="payment">
                <label for=""> Phonepe</label><input type="radio" class="x" name="x"><br>
                <label for=""> Googlepay</label><input type="radio" class="x" name="x"><br>
                <label for=""> Paytm</label><input type="radio" class="x" name="x"><br>
                <label for=""> Credit/Debit card</label><input type="radio" class="x" name="x"><br>
                <label for=""> Cash On Delivery</label><input type="radio" class="x" name="x"><br><br><br>
            </div>
            <label for="">Name:</label><span class="del"><?php echo $product ?></span>
            <br>
            <label for="">Price:</label><span class="del"><?php echo $price ?></span>
            <br>
            <label for="">Delivery Charges:</label><span class="del"><?php echo $charges ?></span>
            <br>
            <label for="">Amount to be paid:</label><span class="del"><?php echo $total ?></span>
            <br><br>
            <input type="submit" name="submit" class="buy" value="Place the order" >
            <!-- <button class="buy" type="submit"><a href="Review.php">Place the order</a></button> -->
        </form>
    </div>
    </div>
    <div class="end">Enjoy Your Food !!!</div>
</body>

</html>