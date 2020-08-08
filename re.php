<?php
   session_start();
   if(!isset($_SESSION['pereglog']))
   {
       echo "<script>window.location='login.php'</script>";
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        body{
            background-image: -webkit-linear-gradient(0deg, white 50%, rgb(108, 108, 161) 50%);     
        }
        .box1
        {
            background-image: -webkit-linear-gradient(0deg, white 50%, rgb(108, 108, 161) 50%);  
            display:flex;
            height:200px;
        }
        .box11{
            height:100px;
            width:120px;
            background: url('flight.jpg');
            background-size:120px 100px;
            background-repeat:no-repeat;
        }
        .box12{
            height:100px;
            width:93%;
        }
        h1{
            margin-left:40px;
        }
        #b1,#b2{
            margin-left:1px;
            padding: 10px 10px;
            font-size:35px;
        }
        h2{
            text-align: right;
            margin-top: -50px;
            margin-right:10px;
        }
        #b1{
            margin-top:-70px;
        }
        .nav{
            margin-top:-7px;
            width:100%;
            height:50px;
            background:black;
            color:white;
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
        @media only screen and (min-width:100px) and (max-width:1200px)
        {
            .box11{
            height:100px;
            width:100px;
            background: url('https://drive.google.com/thumbnail?id=12cb-ZRKdaHrFdxnCrfDPke4SBoeD-pBZ');
            background-size:80px 70px;
            background-repeat:no-repeat;
        }
          body,.box1{
            font-size:15px;
          }
          #b1,#b2{
            margin-left:1px;
            padding: 20px 20px;
            font-size:30px;
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
<body id='b'>
    <?php
      //blocking the body content
      $stat = 0;//to print pdf
      echo "<script>document.getElementById('b').style.display='none';</script>";
    ?>
    <?php
       $num = $_POST['booked'];
       $server = "localhost";
       $username = "root";
       $password = "";
       $database = "flightlogin";
       $conn = mysqli_connect($server,$username,$password,$database);
       
    //    ob_clean();
    //   echo $num;
       $sql2 = "SELECT * FROM `flightstable` WHERE serial1 = '$num'";
       $status = mysqli_query($conn,$sql2);
       if($status)
       {
           while($row = mysqli_fetch_assoc($status))
           {
               if($row['fare'] < $_SESSION['peregwallet'])
               {
                   $_SESSION['peregwallet']=$_SESSION['peregwallet']-$row['fare'];
                   $abc=$_SESSION['pereguser'];
                   $cde=$_SESSION['peregpass'];
                   $fgh = $_SESSION['peregwallet'];
                   $sql3="UPDATE `users` SET `wallet` = '$fgh' WHERE `users`.`pass` = '$cde' AND `users`.`users` = '$abc'";
                   $status = mysqli_query($conn,$sql3);
                   $fl = $row['flight'];
                   $sr = $row['sour'];
                   $des = $row['dest'];
                   $dt = $row['date'];
                   $fr = $row['fare'];
                   echo "<script>document.getElementById('b').style.display='block';</script>";
                   $stat = 1;
                   //here also add the details to users database
                   $sql2 = "INSERT INTO `booked` (`serial1`, `users`, `flightn`) VALUES (NULL, '$abc', '$num');";
                   $status2 = mysqli_query($conn,$sql2);
                   if(!$status2)
                   {
                       echo "Details cold not be added";
                   }
                break;
               }
               else
               {
                     echo "<script>alert('Low Wallet Balance');window.location='wallet.php';</script>";
               }
           }
       }
    ?>

    <div class="main">
    <div class="nav">
             <center>
                <a href="book.php" class='a'>Book a Flight</a>
                <a href="booked.php" class='a'>Booked Flights</a>
                <a href="wallet.php" class='a'>Wallet</a>
                <a href="logout.php" class='a'>Logout</a>
            </center>
        </div>
        <div class="box1">
            <div class="box11">

            </div>
            <div class="box12">
                <u><h1>The Peregrine Falcon</h1></u>
            </div>
        </div>
        <div class="box1" id='b1'>
            <?php
              $a=$_SESSION['pereguser'];
              echo "Name : ". "$a" ."<br>";
              echo "Flight : "."$fl"."<br>";
              echo "Source : "."$sr"."<br>";
              echo "Destination : "."$des"."<br>";
              echo "Date of Journey : ". "$dt" ."<br>";
              echo "Fare : ". "$fr" ."<br>";
            ?>
        </div>
        <div class="box1" id='b2'>
            <br>
            <br>
            <br>
            We wish you a happy and a safe Journey
            <?php
               if($stat==1)
               {
                   echo "<script>document.getElementById('b').style.display='block';</script>";
                //    echo "<script>window.print();</script>";
               }
            ?>
        </div>
    </div>
</body>
</html>