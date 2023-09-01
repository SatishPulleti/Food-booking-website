<?php
session_start();
$name = $_SESSION['name'];
$first = substr($name,0,1);
$len = strlen($name);
$last = substr($name,1,$len-1);

$con = mysqli_connect('localhost', 'root', '', 'hotel');
$sql = "select Name,Username,Email from customer where Username = '$name';";
$_result = mysqli_query($con, $sql);
$row = mysqli_fetch_row($_result);
$_SESSION['custname'] = $row[0];
$_SESSION['custuser'] = $row[1];
$_SESSION['custmail'] = $row[2];

mysqli_close($con);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Online food booking</title>
        <style>
            body{
                background-color: beige;
                margin: 0;
                padding: 0;
            }
            .chose_grid{
                display: flex;
                flex-wrap: wrap;
                /* grid-template-columns: auto auto auto; */
                /* background-color: aqua; */
                justify-content: flex-start;
                margin-left: 80px;
                /* column-gap: 30px; */
                /* border: 1px solid yellow; */
            }
            .chose_grid > div{
                /* background-color: brown; */
                border: 2px solid black;
                border-radius: 30px;
                padding: 10px;
                font-weight: bold;
                margin-top: 15px;
                margin-right: 30px;
            }
            .chose_grid > div:hover{
                background-color: orange;
                border-color: orange;
                color: white;
                /* font-weight: bold; */
                cursor: pointer;
            }
            .beverages{
                display: flex;
                flex-wrap: wrap;
                /* grid-template-columns: auto auto auto; */
                justify-content: space-evenly;
                row-gap: 15px;
                /* column-gap: 15px; */
                /* background-color: aqua; */
            }
            .beverages > div{
                background-color: white;
                position: relative;
                text-align: center;
            }
            img{
                padding: 10px;
                height: 350px;
                width: 350px;
                /* position: relative; */
            }
            img:hover{
                box-shadow: 2px 2px 7px 7px lightgray;
                border-radius: 10px;
                cursor: pointer;
            }
            h6{
                position: absolute;
                bottom: 8px;
                right: 16px;
                color: rgba(0, 0, 255, 1);
                font-size: 15px;
            }
            /* .b1{
                position: relative;
                text-align: center;
                color: brown;
            } */
            .veg:checked {
                background-color: blueviolet;
            }
            .first{
                color: red;
                /* font-size: 30px; */
                text-transform: uppercase;
                /* margin-top: 100px; */
                /* font-weight: bolder; */
                /* background-color: chocolate; */
            }
            .usergrid{
                display: flex;
                justify-content: space-around;
                /* margin-right: 60px; */
                /* margin-left: 60px; */
                background-color:orangered;
                color: white;
                /* width: 100%; */
                height: 65px;
                /* position: fixed; */
                
            }
            .username{
                background-color: khaki;
                border: 1px solid khaki;
                padding: 8px;
                border-radius: 50%;
                margin-top: 12px;
            }
            .username:hover{
                cursor: pointer ;
            }
            .cartgrid{
                display: flex;
                justify-content: flex-end;
                /* width: 300px; */
                /* background-color: aqua; */
                text-align: center;
            }
            .cartgrid > div{
                width: 50px;
                /* border-radius: 50%; */
                margin-left: 40px;
                /* background-color:brown; */
                /* display: inline-block; */
            }
            .cartimg{
                height: 50px;
                width: 50px;
            }
            .cartimg:hover{
                /* display: none; */
                box-shadow:none ;
                /* border-color: none; */
                /* border-radius: unset; */
                
            }
            .user:hover .profile{
                display: block;
                background-color: orangered;
                margin-top: -12px;
                color: black;
                padding: 5px;
            }
            .profile{
                position: absolute;
                display: none;
            }
            .profile:hover{
                cursor: pointer;
                /* color: white; */
            }
            .proflink{
                text-decoration: none;
                color: black;
            }
            .proflink:hover{
                color: white;
            }
            .chose_grid>div a{
                text-decoration: none;
                color: black;
            }
            .chose_grid>div a:hover{
                /* text-decoration: none; */
                color: white;
            }
        </style>
        <!-- <script>
            function veg(){
                var xhttp = new XMLHttpRequest();
                
                xhttp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        document.getElementById("bever").innerHTML = this.responseText;
                    }
                }
                xhttp.open("GET","vegfoods.txt",true);
                xhttp.send();
            }

            function beverage(){
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET","beverage.txt",true);
                xhttp.send();
                xhttp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        document.getElementById("bever").innerHTML = this.responseText;
                    }
                }
                
            }

            function nonveg(){
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET","nv.txt",true);
                xhttp.send();
                xhttp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        document.getElementById("bever").innerHTML = this.responseText;
                    }
                }
                
            }
        </script> -->
    </head>
    <body>
        <div class="usergrid">
            <div><h2>SASUPA</h2></div>
            <div class="cartgrid">
                <div><a href="cart.php"><img src="cart.png" alt="cart" class="cartimg"></a></div>
                <div class="user">
                    <h2 class="username"><span class="first"><?php echo $first ?></span></h2>
                    <div class="profile">
                        <p><a href="profile.php" class="proflink">Profile</a></p>
                        <p><a href="myorders.php" class="proflink">My orders</a></p>
                        <p><a href="loginpage.php" class="proflink">Logout</a></p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="chose_grid">
            <div class="bev"><a href="book.php">Beverages</a></div>
            <div class="veg">Vegetarian</div>
            <!-- <div><button type="button" onclick="veg()">Vegetarian</button></div> -->
            <div class="nv"><a href="non_veg.php">Non-vegetarian</a></div>
        </div>
        <br><br>
        <div class="beverages" id="bever" >
        <div class="v1"><a href="v1.php" target="_blank"><img src="./Vegfoods/1.png" alt="1"></a><h6>SASUPA</h6></div>
            <div class="v2"><a href="v2.php" target="_blank"><img src="./Vegfoods/2.png" alt="1"></a><h6>SASUPA</h6></div>
            <div class="v3"><a href="v3.php" target="_blank"><img src="./Vegfoods/3.png" alt="1"></a><h6>SASUPA</h6></div>
            <div class="v4"><img src="./Vegfoods/4.png" alt="4"><h6>SASUPA</h6></div>
            <div class="v5"><img src="./Vegfoods/5.png" alt="5"><h6>SASUPA</h6></div>
            <div class="v6"><img src="./Vegfoods/6.png" alt="6"><h6>SASUPA</h6></div>
            <div class="v7"><img src="./Vegfoods/7.png" alt="7"><h6>SASUPA</h6></div>
            <div class="v8"><img src="./Vegfoods/8.png" alt="8"><h6>SASUPA</h6></div>
            <div class="v9"><img src="./Vegfoods/9.png" alt="9"><h6>SASUPA</h6></div>
        </div>
        
    </body>
</html>

