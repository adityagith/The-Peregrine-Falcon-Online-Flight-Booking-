<?php 
   session_start();
   $server = "localhost";
   $username = "root";
   $password = "";
   $database = "flightlogin";
   $conn = mysqli_Connect($server,$username,$password,$database);   
   if(!isset($_SESSION['pereglog']))
   {
       echo "<script>window.location='https://peregrinelogin.herokuapp.com'</script>";
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My wallet</title>
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
            /* text-decoration:underline; */
            border-bottom: 2px solid blue;
        }
        input{
            color: black;
            border-radius: 25px;
            height:40px;
            width:400px;
            margin-top: 20px;
        }
        button{
            height:50px;
            width:150px;
            margin-top: 30px;
            border-radius: 25px;
            background-color: skyblue;
            border:2px solid skyblue;
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
        .add,.width
        {
           text-align:center;
           display:inline-block;
           border:2px solid black;
           border-radius:25px;
           height:90px;
           width:20%;
        }
        img{
           margin-top:20px;
           height:300px;
           width:350px;
        }
        .main{
           background:white;
        }
        .main{
           display:flex;
           flex-direction:column;
        }
        form{
           display:inline-block;
        }
    @media only screen and (min-width:100px) and (max-width:1200px)
        {
            img{
           margin-top:100px;
           height:120px;
           width:130px;
        }
        .nav{
            width:100%;
            /* height:100px; */
        }
        a{
            margin-left:10px;
            font-size:19px;
        }
            body{
                font-size:28px;
            }
            button{
                height:50px;
            width:70px;
            margin-top: 30px;
            border-radius: 25px;
            background-color: skyblue;
            border:2px solid skyblue;
            }
        }
    
    </style>
</head>
<body>
    <body>
        <div class="nav">
        <center>
                <a href="book.php" class='a'>Book a Flight</a>
                <a href="booked.php" class='a'>Booked Flights</a>
                <a href="wallet.php" class='a'>Wallet</a>
                <a href="logout.php" class='a'>Logout</a>
            </center>
        </div>
        <center>
        <div class="main">
           <div class="mainbox">
           <img src="https://drive.google.com/thumbnail?id=1jYW96kRF4qPgDvg152-j_UWIZW4CH5TZ" alt="WalletImage"> <br>
              Balance : Rs <?php echo $_SESSION['peregwallet']?> 
           </div>
           <div class="mainbox">
            <form action="wallet.php" method='POST'>
                  <button id='add' onclick='add();' name='ad'> Add Cash</button>
            </form>
            <form action="wallet.php" method='POST'>
                  <button id='add' onclick='withd();' name='wid'> Withdraw Cash</button>
            </form>
           </div>
           <br>
           <div class="mainbox">Credit Card Information</div><br>
           <div class="mainbox">Number:xxxx xxxx xxxx 2312</div>
        </div>
        </center>
        <?php
           if(isset($_POST['ad']))
           {
              echo "<script>console.log(3)</script>";
              $abc=$_SESSION['pereguser'];
              $cde=$_SESSION['peregpass'];
              $_SESSION['peregwallet']=$_SESSION['peregwallet']+500; 
              $fgh = $_SESSION['peregwallet'];
              $sql3="UPDATE `users` SET `wallet` = '$fgh' WHERE `users`.`pass` = '$cde' AND `users`.`users` = '$abc'";
              $status = mysqli_query($conn,$sql3);
              header('Refresh: '. 0.1);
           }
           if(isset($_POST['wid']))
           {
            echo "<script>console.log(3)</script>";
            $abc=$_SESSION['pereguser'];
            $cde=$_SESSION['peregpass'];
            $_SESSION['peregwallet']=$_SESSION['peregwallet']-500; 
            $fgh = $_SESSION['peregwallet'];
            $sql3="UPDATE `users` SET `wallet` = '$fgh' WHERE `users`.`pass` = '$cde' AND `users`.`users` = '$abc'";
            $status = mysqli_query($conn,$sql3);
            header('Refresh: '. 0.1);
           }
        ?>
</body>
</html>