<?php
session_id('mySessionID1');
session_start();
$connection=mysqli_connect('localhost','root');
mysqli_select_db($connection,'payverse');
$usr=$_SESSION['username'];
$q1="select fname,lname,dob,gender,email,phno from info where email='$usr';";
$q2="select walletbal,profpic from login_info where loginid='$usr';";
$q3="select * from bank_account;";
$r1 = $connection->query($q1);
$r2 = $connection->query($q2);
$r3=$connection->query($q3);
//$a=$r2->walletbal;
//echo"$a";
//$row1=$r1->fetch_assoc();
$row1=$r1->fetch_object();
$row2=$r2->fetch_object();
$row3=$r3->fetch_object();
?>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <style>
        body 
        {
            font-family: 'Inter', sans-serif; 
            margin: 0; 
            padding: 0; 
            background:linear-gradient(90deg, blueviolet, rgb(122, 200, 172)); 
            overflow-x:hidden;
        } 
        .dropdown
        {
            float: left;
            overflow: hidden;
        }
        .dropdown .dropbtn
        {
            font-size: 16px;  
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
            height: 110px;
            width:150px;
        }
.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: white;
  color: rgb(233, 41, 98);cursor: pointer;
}

.dropdowncontent {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdowncontent a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdowncontent a:hover {
  background-color: navy;cursor: pointer;
  color: rgb(233, 41, 98);
}

.dropdown:hover .dropdowncontent {
  display: block;cursor: pointer;
}
.main {width: 100%; text-align: center;float: inline-end;}
.image {float: right;}
.rec {width:100%;float: inline-end; text-align: left;}
        #main2
        {
            display: flex;
            justify-content: space-evenly;
        }
        .imgs1{
            color:white;
            height:200px;border: 1px solid black; 
            margin-right: 50px; 
            text-align:center;
            width:16.66%;
           /* border-style: hidden; */
           border: 2px solid rgb(246, 22, 119);
           border-radius: 10px 10px 10px;
           background-image: url(./cool-background.png);
           justify-content: center;align-items: center;
           position: relative; 
        }
        .imgs1:hover{
          color:black;
            height:200px;border: 1px solid black; 
            margin-right: 50px; 
            text-align:center;
            width:16.66%;
           /* border-style: hidden; */
           border: 2px solid rgb(230, 226, 229);
           border-radius: 10px 10px 10px;
           background-color:rgb(225, 126, 192);
           justify-content: center;align-items: center;
           position: relative;
           cursor: pointer;
          
        }
       
        #DownloadApp{
            background-color: white;
            color:navy;
            border-radius: 100px 100px 100px 100px;
            height: 40px;width: 500px;

        }
        #DownloadApp:hover{
            color: white;
            background-color:black;
            font-family: Inter,sans-serif;
            font-size:x-large;
            font-weight: bolder;

        }
        a:hover{color: pink;}
        #navleft{
            width:40%;
            height:100%;
            max-width:max-content;
            max-height: max-content;
            padding: 0px;;
        }
        .details
        {
            background-color: rgba(255, 255, 255, 0.70);
            width: 80%;
            margin: 10%;
            border-radius: 25px;
            display: flex;
            flex-direction: column;
        }
        .linkedba
        {
            background-color: rgba(255, 255, 255, 0.70);
            width: 90%;
            margin-top: 2%;
            border-radius: 25px;
            display: flex;
            flex-direction: column;
            padding-left: 2%;
        }
        .transhis
        {
            background-color: rgba(255, 255, 255, 0.70);
            width: 90%;
            margin-top: 2%;
            border-radius: 25px;
            display: flex;
            flex-direction: column;
            padding-left: 2%;
        }
        .walstats
        {
            background-color: rgba(255, 255, 255, 0.70);
            width: 90%;
            margin-top: 6%;
            border-radius: 25px;
            display: flex;
            flex-direction: column;
            padding-left: 2%;
        }
        .regde
        {
            position: relative;
            left: 7%;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <title>Profile Page</title>
</head>
<body>
    <div style="display:flex;height: 120px;background-image: url(bg1.webp);">
        <div id="navleft">
          <img src="./logo1.jpg" alt="" style="width:100%;
          height:100%;">
        </div>
        <div  class="dropdown" style="overflow:hidden;">
          <a href="./Paybills.html" style="color: white;"><button class="dropbtn"> 
              Pay Bills </button></a><div class="dropdowncontent">  
          <a href="./mobile recharge.html">Mobile Recharge</a>
          <a href="./ElectricityBill.html">Electricity</a>
        </div>
      </div>  
      <div  class="dropdown" style="overflow:hidden;">
        <a href="./BookTickets.html" style="color: white;"><button class="dropbtn"> Book Tickets <i class="fa fa-caret-down"></i></button></a>
           <div class="dropdowncontent">
        <a href="./movieticket.html">Movie Tickets</a>
        <a href="">Flight Tickets</a>
        <a href="">Bus Tickets</a>
        <a href="">Train Tickets</a>
        </div>
      </div>
      <div  class="dropdown" style="overflow:hidden;">
            <a href="./BookTickets.html" style="color: white;"><button class="dropbtn">Help<i class="fa fa-caret-down"></i></button></a>
               <div class="dropdowncontent">
            <a href="">Please call 8888000012</a>
            </div>
      </div>
      <div  class="dropdown" style="overflow:hidden;">
          <a href="./homemain.html"><button class="dropbtn"> Logout <i class="fa fa-caret-down"></i></button>
       </a>
      </div>
      <div  class="dropdown" style="overflow:hidden;">
        <a href="./profile.php" style="color: white;"><button class="dropbtn">  <span class="material-symbols-outlined">
          person
          </span></i></button></a>
      </div>
      
      <div id="navright" >
        <span class="material-symbols-outlined" style="position: absolute;left: 85%; top:7%;">
            house
        </span>
        <a href="./home.html" style="font-family:Inter,sans-serif;position: absolute;left: 87%; top:7%;color:white;">Go to home</a>
     </div>  
    </div>
    <div class="container" style="display: flex;flex-direction: row;">
        <div class="container1" style="width: 70%;">
            <div class="details">
                <!-- <img src="logo1.jpg" alt="" style="clip-path: circle(30%);margin: 3%;width: 80%;height: 80%;position: relative;left: 5%;"> -->
                <?php 
                if($row2->profpic==NULL)
                echo '<img src="default_profile.jpg" style="clip-path: circle(30%);margin: 3%;width: 80%;height: 80%;position: relative;left: 5%;" />';
                else
                echo '<img src="data:image/jpeg;base64,'.base64_encode( $row2->profpic ).'" style="clip-path: circle(30%);margin: 3%;width: 80%;height: 80%;position: relative;left: 5%;" />';?>
                <div class="regde">
                    <h2>Name: <?php echo"$row1->fname $row1->lname";?></h2>
                    <h2>DoB: <?php echo"$row1->dob";?></h2>
                    <h2>Gender: <?php echo"$row1->gender";?></h2>
                    <h2>Phone Number: <?php echo"$row1->phno";?></h2>
                    <h2>E-Mail: <br><?php echo"$row1->email";?></h2>
                </div>
            </div>
        </div>
        <div class="container2" style="width: 130%;">
            <div class="walstats">
                <h2>Wallet Balance: <?php echo"$row2->walletbal";?></h2>
            </div>
            <div class="linkedba">
                <h2>Linked Bank Accounts</h2>
                <div class="banks" style="display: flex;flex-direction: row;">
                    <div class="bank1">
                        <img src="paym.jpg" alt="" style="clip-path: circle(30%);width: 50%;height: 50%;">
                        <h3>State Bank of India</h3>
                        <h4>Acc no: <?php echo"$row3->accno";?></h4>
                    </div>
                    <div class="bank1">
                        <img src="paym.jpg" alt="" style="clip-path: circle(30%);width: 50%;height: 50%;">
                        <h3>Add Bank Account</h3>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>