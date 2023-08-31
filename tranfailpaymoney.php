



<!DOCTYPE html>
<?php
        session_start();
        $connection=mysqli_connect('localhost','root');
        mysqli_select_db($connection,'payverse');
        $loginid=$_SESSION['username'];

        $q1="select walletbal from login_info where loginid='$loginid'";
        $r1 = $connection->query($q1);
        $row1=$r1->fetch_object();
        ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Failed</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
      body {font-family: 'Inter', sans-serif; margin: 0; padding: 0;
        background:linear-gradient(45deg, blueviolet, rgb(122, 200, 172)); color: white;}
        .inputt{
            width:200px;height: 20px;
            margin-bottom: 5px;
        }
        #navbar{
            
            width:100%;
            height: 100px;
            

            color: white;
            background-image:url(./bg1.webp);
        }
        #navleft{
            width:40%;
            height:100%;
            max-width:max-content;
            max-height: max-content;
            padding: 0px;;
        }
        #navmid{
            display: flex;
            width:60%;
            height:100%;
            justify-content: center;
            justify-content: space-evenly;
            align-items: center;
            font-family: Inter,sans-serif;
        }
        #navright{
            width:20%;
            height:100%;
            margin: auto;
            justify-content: center;
            align-items: center;
            padding-top:50 px; 
        }
        .dropdown {
  float: left;
  overflow: hidden;
}
.dropdown .dropbtn {
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
    </style>
</head>
<body style=" margin:0;width:100%;height:100vh;">
    <div style="display:flex;height: 120px;background-image: url(bg1.webp);">
        <div id="navleft">
          <img src="./logo1.jpg" alt="" style="width:100%;
          height:100%;">
        </div>
        <!-- <div  class="dropdown" style="overflow:hidden;">
          <a href="./Paybills.html" style="color: white;"><button class="dropbtn"> 
              Pay Bills </button></a><div class="dropdowncontent">  
          <a href="./mobile recharge.html">Mobile Recharge</a>
          <a href="./ElectricityBill.html">Electricity</a>
        </div>
      </div>  
      <div  class="dropdown" style="overflow:hidden;">
        <a href="./BookTickets.html" style="color: white;"><button class="dropbtn"> Book Tickets <i class="fa fa-caret-down"></i></button></a>
           <div class="dropdowncontent">
        <a href="">Movie Tickets</a>
        <a href="">Flight Tickets</a>
        <a href="">Bus Tickets</a>
        <a href="">Train Tickets</a>
        </div>
      </div> -->
      
      <div  class="dropdown" style="overflow:hidden;">
            <a href="./BookTickets.html" style="color: white;"><button class="dropbtn">Help<i class="fa fa-caret-down"></i></button></a>
               <div class="dropdowncontent">
            <a href="">Please call 8888000012</a>
            </div>
      </div>
      <div  class="dropdown" style="overflow:hidden;">
          <a href="./homemain.html"><button class="dropbtn"> Logout <i class="fa fa-caret-down"></i></button>
          <!-- <div class="dropdowncontent"></a> -->
       <!-- </div> -->
       </a>
      </div>
      <div  class="dropdown" style="overflow:hidden;">
        <a href="./BookTickets.html" style="color: white;"><button class="dropbtn">  <span class="material-symbols-outlined">
          person
          </span></i></button></a>
           <div class="dropdowncontent">
        <a href=""> Name:John</a>
        <a href="">Phone:1234567890</a>
        <a href="">Subscription:Regular</a>
        </div>
      </div>
      
      <div id="navright" >
        <span class="material-symbols-outlined" style="position: absolute;left: 85%; top:7%;">
            house
        </span>
        <a href="./home.html" style="font-family:Inter,sans-serif;position: absolute;left: 87%; top:7%;color:white;">Go to home</a>
     </div>
     
       
      </div>
      </div>
    <br><br>
    <div style="display: flex;position: relative;left: 300px;top:5px;">
        <!-- <div style="justify-content: center;align-items: center;"></div> -->
    <table style="background-color: #fff;border-radius: 10px 10px 10px 10px;border:2px;box-shadow: 3px 3px 5px 5px #8888;width:50%;height:50%;font-family: Inter,sans-serif;">
         
        <tr>
         <td> <br></td>
        </tr>
        <tr style="font-size: xx-large;text-align:center;font-weight: bolder;color:purple">
            <td>
            Transaction Failed </td>

        </tr>
        
        <tr> <td style="text-align: center;color: black;"> Your Transaction could not be processed. <br><br><br>
          <img src="redcross.png" width="100px" height="100px"><br><br><br>
          Transaction Unsuccessful due to insufficient payverse wallet balance. <br> 
          Minimum wallet balance to be maintained is INR 100.
        <br><br> <?php echo "Your payverse wallet balance is Rs."." $row1->walletbal"; ?>  <br><br><br><br><br> </td> </tr>

</table>
</div>

</body>
</html>