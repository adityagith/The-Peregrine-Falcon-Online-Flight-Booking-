<?php
   session_start();
   if(!isset($_SESSION['pereglog']))
   {
       echo "<script>window.location='login.php';</script>";
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Booked Flights</title>
    <style>
        body{
            margin: 0px 0px;
            color:black;
            font-size:30px;
        }
        .nav{
            width:100%;
            height:50px;
        }
        .main{
            width:100%;
            height:700px;
        }
        .nav{
            background:black;
        }
        a{
            text-decoration: none;
            color:white;
            margin-left: 100px;
            font-size: 25px;
            margin-bottom: 100px;
        }
        a:hover{
            border-bottom:2px solid blue;
        }
        input{
            color: black;
            border-radius: 25px;
            height:40px;
            width:400px;
            margin-top: 20px;
        }
        .login{
            margin-top: 100px;
        }
        #pwd,#username{
            text-align: center;
        }
        .a{
            padding-top: 10px;
            margin-top: 200px;
        }
        .main{
            display:flex;
            flex-direction:row;
        }
        .select,.search{
            margin-left:20px;
            height:40px;
            width:300px; 
            border:2px solid black; 
            font-size:24px;   
        }
        select,option{
            font-size:24px; 
        }
        #s3,.search{
            width:55px;
            background:url('s11.jpg');
            background-size:55px 40px;
            background-repeat:no-repeat;
        }
        select,option{
            border:2px solid blue;
        }
        .table{
            display:flex;
            flex-direction:column;
            font-size:27px;
        }
        .ab{
            text-decoration:underline;
            /* background:skyblue; */
            padding:20px;
        }
        .book{
            background:white;
            height:40px;
            width:60px;
        }
        form{
            display:inline-block;
        }
        @media only screen and (min-width:100px) and (max-width:1200px)
        {
            .table{
            font-size:19px;
        }
            .ab{
                padding:10px 10px;
            }
            .nav{
            width:100%;
            /* height:100px; */
        }
        a{
            margin-left:10px;
            font-size:19px;
        }
        }
    </style>
</head>           
    <body>
        <div class="nav">
        <center>
                <a href="book.php" class='a'>Book a Flight</a>
                <a href="booked.php" class='a'>Booked Flights</a>
                <a href="wallet.php" class='a'>Wallet</a>
                <a href="logout.php" class='a'>Logout</a>
            </center>
        </div>
        <br>
        <div class="table">
            <table>
                <tr id='tablehead' class=mainhead>
                    <th class='ab'>Flight</th>
                    <th class='ab'>Fare</th>
                    <th class='ab'>JourneyDt</th>
                    <th class='ab'>Source</th>
                    <th class='ab'>Destination</th>
                </tr>
                <?php
                    $server = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "flightlogin";
                    $conn = mysqli_Connect($server,$username,$password,$database);      
                ?>
                <?php
                        $abc = $_SESSION['pereguser'];
                        $numb=2;
                        $sql2 = "SELECT * FROM `booked` WHERE users='$abc'";
                        $status = mysqli_query($conn,$sql2);
                        while($row = mysqli_fetch_assoc($status)) 
                        {
                            $pq = $row['serial1'];
                            $sql3 = "SELECT * FROM `flightstable` WHERE serial1='$pq'"; 
                            $status3 = mysqli_query($conn,$sql3); 
                            while($row = mysqli_fetch_assoc($status3))
                            {
                                echo "<tr>";
                                echo "<th>".$row['flight']."</th>";
                                echo "<th>".$row['fare']."</th>";
                                echo "<th>".$row['date']."</th>";
                                echo "<th>".$row['sour']."</th>";
                                echo "<th>".$row['dest']."</th>";
                                echo "</tr>";
                            }  
                        }
                    echo "</table></div>";
                ?>
</body>
</html>
