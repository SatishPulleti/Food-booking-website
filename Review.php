<?php
if(isset($_POST['submit'])){
    session_start();
    $food = $_POST['food'];
    $interface = $_POST['inter'];
    $rating = $_POST['rate'];
    $name = $_SESSION['custname'];
    $con = mysqli_connect('localhost', 'root','','hotel');
    // $sql = "create table review(Name varchar(50), Rating varchar(10), Food varchar(100), Interface varchar(100)); ";
    // $result = mysqli_query($con, $sql);

    $ins = "insert into review values('$name', '$rating', '$food', '$interface'); ";
    $insert = mysqli_query($con, $ins);
    mysqli_close($con);

    header("Location:book.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="order-review.css">
    <style>
        .top {
            display: flex;
            /* flex-direction: column; */
            justify-content: space-between;
            text-align: left;
            height: 60px;
            background-color: orangered;
            font-size: 30px;
            padding-left: 30px;
            padding-top: 20px;
            position: fixed;
            color: white;
            top: 0;
            left: 0;
            right: 0;
            
        }
        .anime{
            margin-right: -500px;
            animation: slide 2s 1;
        }
        @keyframes slide{
            0%{
                margin-right: -500px;
            }
            /* 30%{
                margin-right: -100px;
            } */
            60%{
                margin-right: 100px;
            }
            100%{
                margin-right: 20px;
            }
        }
        .btn{
            padding: 10px;
            border: 1px solid orangered;
            border-radius: 10px;
            font-size: 20px;
            color: red;
            cursor: pointer;
        }
        form{
            /* width:400px; */
        }
        .input{
            width: 300px;
        }
        .rate{
            padding: 100px;
            width: 100px;
        }
        .heading{
            margin-top: 100px;
            margin-bottom: -80px;
            text-align: right;
            /* margin: 0 auto; */
            margin-right: 50px;
            font-size: 20px;
            color: blue;
            /* border: 1px solid; */
            /* background-color: aquamarine; */
            /* width: 100px; */
        }
        .heada{
            text-decoration: none;
            cursor: pointer;
            color: blue;
        }
    </style>
</head>
<body>
    <div class="top">
        <div>Sasupa</div>
        <div class="anime">Your payment processed successfully</div>
    </div>
    <div class="heading"><a href="book.php" class="heada">Go back</a></div>
    <div class="flex">
        <div><img src="sasupalogo.png" alt="sasupa"></div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <div class="main" style="margin-top:130px;">
                <label for="">Food ratings:(Out of 5)</label>
                <br>
                <select name="rate" id="rate">
                    <option selected>Select</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                
                <!-- <input class="nam" type="number" name="rate"> -->
                <br>
                <label for="">Food review:</label><br><textarea class="input" name="food" id="" cols="20" rows="5"></textarea><br>
                <label for="">Review about the interface:</label><br><textarea class="input" name="inter" id="" cols="20" rows="5"></textarea><br>
                <label for="">Any suggestions: </label><br><textarea class="input" name="sugg" id="" cols="20" rows="5"></textarea><br>
                <br>
                <input type="submit" name="submit" class="btn">
        </div>
        
    </form>
    </div>
    <div class="end">Enjoy Your Food !!!</div>
</body>
</html>