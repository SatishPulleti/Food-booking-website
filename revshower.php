

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style>
            body{
                padding: 0;
                margin: 0;
                font-family: Arial, sans-serif;
                line-height: 1.6;
            }
            .name{
                font-size: 30px;
                color: blueviolet;
                text-decoration: underline;
            }
            .rating{
                margin-left: 20px;
                color: gold;
                font-size: 20px;
            }
            .divclass{
                /* margin-top: 400px; */
                border: 1px solid white;
                padding: 20px;
                max-width: 800px;
                margin: auto;
                margin-bottom: 20px;
                box-shadow: 1px 2px 7px 7px lightgrey;
            }
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
            .cont{
                max-width: 1000px;
                /* background-color: #333; */
                padding: 20px;
                margin: 0 auto;
                margin-left: 0px;
                /* margin-bottom: 20px; */
            }
            .navbar {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                background-color: #FF5733;
                padding: 10px 0;
                z-index: 1000;
                margin-bottom: 100px;
                /* To ensure the navbar stays on top of other elements */
            }
            .title{
                list-style: none;
                font-size: 20px;
                color: white;
                float: left;
            }
        </style>
    </head>
    <body>
        <!-- <h1>Reviews</h1> -->
        <nav class="navbar">
            <div class="cont">
                <div class="brand">
                    <li class="title"><img src="sasupalogo.png" alt="sasupa" height="50px" width="220px"></li>
                </div>
                <ul class="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="aboutus.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <!-- <li><a href="foods.html">Best Foods</a></li> -->
                    <li><a href="#reviews">Reviews</a></li>
                </ul>
            </div>
        </nav>
        <div style="height: 110px;"></div>
    </body>
</html>
<?php
$con = mysqli_connect('localhost','root','','hotel');
$sql = "Select * from review;";
$res = mysqli_query($con, $sql);

// echo "<table border=1 width=10%>";
// echo "<tr><th>EMPNAME</th><th>EMPSAL</th><th>EMPSAL</th><th>EMPSAL</th></tr>";
if (mysqli_num_rows($res) > 0){      
    while($row = mysqli_fetch_row($res)) 	{ 
        if($row['0'] != "" && $row['1'] != "" &&$row['2'] != "" && $row['3'] != "" && $row['1'] != "select"){
            // echo "<tr>";		
            echo "<div class='divclass'>";
            echo "<span class='name'>" .$row["0"]. "</span>";	
            echo "<span class='rating'> Rating: " .$row["1"]. "</span>";	
            echo "<h3> Food review: </h3><span>" .$row["2"]. "</span>";
            echo "<h3> Website interface review: </h3><span>" .$row["3"]. "</span>";
            echo "<hr>"	;
            echo "</div>";
            // echo "</tr>";    
        }	
    }
}
mysqli_close($con);
?>