<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peregrine Falcon</title>
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
        .logo{
            background:url('https://drive.google.com/thumbnail?id=12cb-ZRKdaHrFdxnCrfDPke4SBoeD-pBZ');
            height:80px;
            width:80px;
            background-repeat:no-repeat;
            background-size:80px 80px;
            border-radius:50%;
        }
        body{
            background-image: -webkit-linear-gradient(0deg, white 50%,rgb(108, 108, 161)50%);
        }
    </style>
</head>
<body>
    <body>
        <!-- <div class="nav">
            <center>
                <a href="" class='a'>Home</a>
                <a href="" class='a'>Book a Flight</a>
                <a href="" class='a'>Booked Flights</a>
                <a href="" class='a'>Wallet</a>
                <a href="" class='a'>Logout</a>
            </center>
        </div> -->
        <div class="main">
          <center>
            <div class="login">
            <div class="logo"></div>
              <form action="login.php" method='POST'>
                <input type="text" placeholer="username" name = 'username' placeholder="Enter your Username" id="username"><br>
                <input type="password" name='pass' placeholder="Enter your Password" id="pwd"><br>
                <button onclick="submit">Sign in</button>
             </form>
             <?php
                //peregwall
                //pereguser
                 //$_SESSION['pereglog']
                 $server = "localhost";
                 $username = "root";
                 $password = "";
                 $database = "flightlogin";
                 $conn = mysqli_connect($server,$username,$password,$database);
             ?>
             <?php
                 $s = "ad";
                 if($conn)
                 {
                    if($_SERVER['REQUEST_METHOD']=='POST')
                    {
                        $name = $_POST['username'];
                        $s = $name;//It doesnt works for external file
                        $pass = $_POST['pass'];
                        // $sql1 = "INSERT INTO `users` (`serial`, `users`, `pass`) VALUES (NULL, '$name', '$pass')";
                        $sql2 = "SELECT * FROM `users` WHERE users='$name' AND pass='$pass'";
                        $status = mysqli_query($conn,$sql2);
                        $num = mysqli_num_rows($status);
                        if($num==1)
                        {
                            $_SESSION['pereguser']=$name;
                            $_SESSION['peregpass']=$pass;
                            $_SESSION['pereglog']=1;//0 hua to logout
                            while($row=mysqli_fetch_assoc($status))
                            {
                                $_SESSION['peregwallet']=$row['wallet'];
                                break;
                            }
                            echo "<script>
                            window.location='wallet.php';
                            </script>";
                        }
                        else{
                            echo "<script>alert('You have entered a wrong Password')</script>";
                        }
    
                    }
                 }
                 else{
                     echo "<script>alert('Our Servers are Busy');</script>";
                 }
             ?>
            </div>
          </center>
        </div>
</body>
</html>