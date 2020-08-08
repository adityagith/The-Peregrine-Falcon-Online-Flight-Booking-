<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book flight</title>
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
        
        /* button{
            height:50px;
            width:150px;
            margin-top: 30px;
            border-radius: 25px;
            background-color: skyblue;
            border:2px solid skyblue;
        } */
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
        #s3,.search,#sear{
            width:55px;
            background:url('https://drive.google.com/thumbnail?id=1-Hsc6H29j5UYaLNv6EexxH9Hkg4YXgvu');

            /* URL FOR SEARCH BUTTON*/
            background-size:55px 55px;
            background-repeat:no-repeat;
            height:55px;
        }
        select,option{
            border:2px solid blue;
        }
        .table{
            display:flex;
            flex-direction:column;
            font-size:27px;
            margin-top:-600px;
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
        #booked{
            display:none;
        }
        #selser{
            margin-top:-10px;
            border:0px solid white;
        }
        @media only screen and (min-width:100px) and (max-width:1200px){
            form{
                font-size:23px;
            }
            select,option{
            font-size:19px; 
        }
        .nav{
            width:100%;
            /* height:100px; */
        }
        a{
            margin-left:10px;
            font-size:19px;
        }
            .table{
            display:flex;
            flex-direction:column;
            font-size:19px;
            margin-top:-600px;
        }
        .select,.search{
            margin-left:5px;
            height:40px;
            width:300px; 
            border:2px solid black; 
            font-size:24px;   
        }
        .ab{
            text-decoration:underline;
            /* background:skyblue; */
            padding:10px;
        }
            /* button{
                height:50px;
            width:70px;
            margin-top: 30px;
            border-radius: 25px;
            background-color: skyblue;
            border:2px solid skyblue;
            } */
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
        <div class="main">
          <div class="select" id="s1">
          <form action="book.php" method='POST'>
            Select 1st City
            <select name="sour" id="sour">
              <option value="City">City</option>
              <option value="Delhi">Delhi</option>
              <option value="Bhopal">Bhopal</option>
              <option value="Raipur">Raipur</option>
           </select>
          </div>
          
          <div class="select" id="s2">
             Select 2nd City
           <select name="dest" id="dest">
              <option value="City">City</option>
              <option value="London">London</option>
              <option value="Nagpur">Nagpur</option>
              <option value="Sydney">Sydney</option>
           </select>
           </div>

           

           <!-- <button class="search"></button> -->
           <div class="select" id='selser'>
               <button id='sear' onclick='submit' name='searchf'></button>
           </div>
           </form>
           <!-- <button class="search"></button> -->

        </div>
        <div class="table">
            <table>
                <tr id='tablehead' class=mainhead>
                    <th class='ab'>Flight</th>
                    <th class='ab'>Fare</th>
                    <th class='ab'>JourneyDt</th>
                    <th class='ab'>Destination</th>
                    <th class='ab'>Book the Flight</th>
                </tr>
                <?php
                     $server = "localhost";
                     $username = "root";
                     $password = "";
                     $database = "flightlogin";
                     $conn = mysqli_Connect($server,$username,$password,$database);     
                ?>
                <?php
                    if(isset($_POST['searchf']))
                    {
                        echo "<script>console.log(4)</script>";
                        $sourc = $_POST['sour'];
                        $destc = $_POST['dest'];
                        $sql2 = "SELECT * FROM `flightstable` WHERE sour='$sourc' AND dest='$destc'";//add where the city has been selected
                        $status = mysqli_query($conn,$sql2);
                        //setcookie("");
                        while($row = mysqli_fetch_assoc($status))  
                        {
                        echo "<tr>";
                        echo "<th>".$row['flight']."</th>";
                        echo "<th>".$row['fare']."</th>";
                        echo "<th>".$row['date']."</th>";
                        echo "<th>".$row['dest']."</th>";
                        echo "<th><form action='re.php' method='POST'><input id='booked' name='booked'"."value='".$row['serial1']."'>"."<button class='book' id='book".$row['serial1']."'" ."onclick='submit'>"."Book</button>"."</form></th>";
                        
                        //echo "<th><button class='book' id='book".$row['serial11']."'>"."Book</button>"."</th>"; working in 179 line
                        echo "</tr>";
                        // "<script> function book".$row['serial11']."() {"."document.cookie='proq=".$row['serial11']."';acook=1;window.location='http://localhost/The%20Peregrine%20Falcon/book.php';"."console.log('book".$row['serial11']."');}"."</script>";//100%true
                        }
                        echo "</table></div>";
                    }
                ?>
</body>
<script>
    let acook = 0;
</script>
</html>