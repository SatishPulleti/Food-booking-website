<html>
	<head>
		<style>
			table,th,td{
				border-collapse: collapse;
				padding: 20px;
				/* margin: 0 auto; */
			}
            table{
                margin-top: 20px;
                margin-left: 20px;
            }
			body{
				background-color: antiquewhite;
                margin: 0;
                padding: 0;

			}
            .sub{
                border: 1px solid black;
                padding: 10px;
                border-radius: 10px;
                background-color: orangered;
                color: white;
            }
            form{
                font-size: 20px;
                margin-top: 30px;
                margin-left: 20px;
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
            .home{
                text-decoration: none;
                color: white;
                font-size: 20px;
                /* text-align: center; */
                /* margin-top: 200px; */
                /* border: 1px orangered solid; */
                /* border-radius: 50%; */
            }
		</style>

	</head>
	<body>
        <div class="usergrid">
            <div><h2>SASUPA</h2></div>
            <div class="cartgrid">
                <div><a href="book.php" class="home">Home</a></div>
                <div class="user">
                    
                    <!-- <div class="profile">
                        <p><a href="profile.php" class="proflink">Profile</a></p>
                        <p><a href="myorders.php" class="proflink">Your orders</a></p>
                        <p><a href="loginpage.php" class="proflink">Logout</a></p>
                    </div> -->
                </div>
            </div>
        </div>
	</body>
</html>

<?php
session_start();
$name = $_SESSION['name'];
$first = substr($name,0,1);
$conn = mysqli_connect("localhost", "root", "", "hotel");
$cust = $_SESSION['custname'];
$sql = "SELECT distinct * FROM cartorders where Name ='$cust'";
$result = mysqli_query($conn,$sql);
$cust = $_SESSION['custname'];
$totprice = 0;
echo "<table border=1 width=50%>";
echo "<tr><th>Product</th><th>Price</th><th>Charges</th><th>Total cost</th><th>Quantity</th></tr>"; 
if (mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_row($result))
	{		
    $co = $row[1];
    // $to = $co * $row[4]
    $sql1 = "SELECT count(name) FROM cartorders where product ='$co'";
    $result1 = mysqli_query($conn,$sql1);
    $count = mysqli_fetch_row($result1);
    $tot = $count[0] * $row[4];
	echo "<tr>";		
	echo "<td>" .$row["1"]. "</td>";
	echo "<td>" .$row["2"]. "</td>";
	echo "<td>" .$row["3"]. "</td>";
	echo "<td>" .$tot. "</td>";
    echo "<td>" .$count["0"]. "</td>";
	echo "</tr>";	
    $totprice = $totprice + $tot;
	} 	
}		
else	{			
echo "No orders found in cart";	
}		
echo "</table>";

// $sql = "SELECT distinct * FROM cartorders where Name ='$cust'";
// $result = mysqli_query($conn,$sql);

mysqli_close($conn);

if(isset($_POST['submit'])){
    $_SESSION['price'] = $totprice;
    $_SESSION['product'] = "All items in cart";
    header('Location:order.php');
}
?>

<html>

    <body>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div>
            <label for="">Total Price: </label>&nbsp;
            <?php echo $totprice?><br><br>
            <input type="submit" name="submit" value="Buy all" class="sub">
            </div>
        </form>
    </body>
</html>