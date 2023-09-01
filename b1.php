<?php
session_start();
$cust = $_SESSION['custname'];
if(isset($_POST['cart'])){
    $food = "Cooldriks Combo";
    $con = mysqli_connect('localhost','root','','hotel');
    $sql = "insert into cartorders values('$cust','$food',1200,0,1200);";
    $res = mysqli_query($con, $sql);
    mysqli_close($con);
    echo '<script>alert("Added to cart successfully")</script>';
}
if(isset($_POST['order'])){
    // session_start();
    $food = "Cooldriks Combo";
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
            #inc,#dec{
                background-color: orange;
                border: 1px solid orange;
                color: white;
            }
            /* .but:hover{
                background-color: chocolate;
                border-color: chocolate;
            } */
            .formclass{
                display: none;
            }
            .but:hover{
                background-color: chocolate;
                border-color: chocolate;
            }

            
        </style>
        <!-- <script>
            // function cart(){
            //     var con = confirm("Do you want to add this item to cart");
            //     if(con){
            //         document.getElementById("cartbutton").innerHTML = "<button id='dec'>-</button> 1 <button id='inc'>+</button>";
            //     }
            // }
            function address(){
                var x = document.getElementById("demo").innerHTML;
                document.getElementById("grid2").innerHTML = x;
            }
            function add(){
                var y = document.getElementById("address").value;
                document.getElementById("grid2").innerHTML = "<span style='color:red;'><b>Address:- </b></span>" + y
                                                                + "<br><br>Amount: 1200<br>"
                                                                + "<br><button class='but'>Pay now</button>";
            }
           
        </script> -->
    </head>
    <body>
        
        <div class="grid">
            <div><img src="./Beverages/1.png" alt="1"></div>
            <div class="grid2" id="grid2">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div><input type="submit" name="order" class="but" value="Order now"></div><br><br>
                    <!-- <div><button class="but" onclick="address()">Order now</button></div><br><br> -->
                    <!-- <div><h3 name="hell">hello</h3></div> -->
                    <div><button class="but" id="cartbutton" name="cart">Add to cart</button></div>
                </form>
            </div>
        </div>
        <!-- <div id="demo" class="formclass">
            <form action="">
                Address:- <br>
                <textarea name="address" id="address" cols="30" rows="10"></textarea>
                <br><br><button onclick="add()">Add address</button>
            </form>
        </div> -->
    </body>
</html>