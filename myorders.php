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
            .col{
                background-color: lightgrey;
                border: 1px solid black;
            }
            .col1{
                background-color: lightsalmon;
                border: 1px solid black;
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
$conn = mysqli_connect("localhost", "root", "", "hotel");
$cust = $_SESSION['custname'];
$sql = "SELECT * FROM orderplaced where Name ='$cust'";
$result = mysqli_query($conn,$sql);
$cust = $_SESSION['custname'];
echo "<table border=1 width=50%>";
echo "<tr><th class='col'>Product</th><th class='col1'>Price</th><th class='col'>Charges</th><th class='col1'>Total cost</th></tr>"; 
if (mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_row($result))
	{		
	echo "<tr>";		
	echo "<td class='col'>" .$row["1"]. "</td>";
	echo "<td class='col1'>" .$row["2"]. "</td>";
	echo "<td class='col'>" .$row["3"]. "</td>";
	echo "<td class='col1'>" .$row["4"]. "</td>";
	echo "</tr>";	
	} 	
}		
else	{			
echo "No orders found";	
}		
echo "</table>";
mysqli_close($conn);
?>
