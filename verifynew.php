<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            
            display: flex;
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
<?php

require "mail.php";
require "functions.php";
$errors = array();

if($_SERVER['REQUEST_METHOD'] == "GET"){

    //send email
    $vars['code'] =  rand(10000,99999);

    //save to database
    date_default_timezone_set('Asia/Kolkata');
    $d=date("Y/m/d H:i:s",time());
    $endtime=strtotime("+10 minutes", strtotime($d));
    $vars['expires'] = date("Y/m/d H:i:s",$endtime);
    $vars['email'] = $_SESSION['email'];

    $query = "insert into verify (code,expires,email) values (:code,:expires,:email)";
    database_run($query,$vars);

    $message = "your code is " . $vars['code'];
    $subject = "Email verification";
    $recipient = $vars['email'];
    send_mail($recipient,$subject,$message);
}

if($_SERVER['REQUEST_METHOD'] == "POST"){

    

        $vars = array();
        $vars['email'] = $_SESSION['email'];
        $vars['code'] = $_POST['code'];
        $query = "select * from verify where code = :code && email = :email";


        $row = database_run($query,$vars);

        if(is_array($row)){
            $row = $row[0];
            $time = time();
             echo "$row->expires";
             echo"$time";
            if($row->expires > $time){

                // $id = $_SESSION['USER']->id;
                header("Location: emailverification.html");
                die;
            }else{
              header("Location: emailfailed.html");
            }

        }else{
          header("Location: emailfailed.html");
        }
    
}

?>


</head>
<body style="margin: 0;height:100vh;">
    <div style="display:flex;height: 120px;background-image: url(bg1.webp);">
        <div id="navleft">
          <img src="./logo1.jpg" alt="" style="width:100%;
          height:100%;">
        </div>
        
      <div  class="dropdown" style="overflow:hidden;">
            <a href="./BookTickets.html" style="color: white;"><button class="dropbtn">Help<i class="fa fa-caret-down"></i></button></a>
               <div class="dropdowncontent">
            <a href="">Please call 8888000012</a>
            </div>
      </div>
      
      
      
      <div id="navright" >
        <span class="material-symbols-outlined" style="position: absolute;left: 85%; top:7%;">
            house
        </span>
        <a href="./homemain.html" style="font-family:Inter,sans-serif;position: absolute;left: 87%; top:7%;color:white;">Go to home</a>
     </div>
     
       
      </div>
    
    <div style="overflow: hidden;position:absolute;width: 72%;left: 22%;top: 21%;">
        <!-- <div style="justify-content: center;align-items: center;"></div> -->
        <br><br><br><br><br>
    <table style="background-color: #fff;border-radius: 10px 10px 10px 10px;border:2px;box-shadow: 3px 3px 5px 5px #8888;width:70%;height:50%;">
         
        <tr> 
        <td style="width:100px;">
        <img src="./draw2.svg" alt="" style="width:270px;height:300px;max-width:fit-content;max-height: max-content;"></td>
    <td>

     
      <!-- <form name="myform" action="./bankinp.php" method="post" style="color:black;">    
    <input type="text" placeholder="Enter bank account number" class="inputt" name="accno"> <br>
    <input type="text" placeholder="Enter bank account balance" class="inputt" name="balance"> <br>
    <input type="submit" style="background-color: #3B71CA;color:white;border-radius: 1px 1px 1px 1px; width:200px;height: 20px;border: none;"> 
</td></form> -->

<div>
			<?php if(count($errors) > 0):?>
				<?php foreach ($errors as $error):?>
					<?= $error?> <br>	
				<?php endforeach;?>
			<?php endif;?>

		</div>
		
    <h4 style="color:black;">Please enter the otp sent to your email</h4>
    <br><h5 style="color:black;">The otp is valid only for 15 minutes</h5>
		<form method="post" style="color:black;" name="myform">
			<input type="text" name="code"  class="inputt" placeholder="Enter your Code"><br>
 			<br>
			<input type="submit" value="Verify" style="background-color: #3B71CA;color:white;border-radius: 1px 1px 1px 1px; width:200px;height: 20px;border: none;" >
		</form>
	</div>

</body>
</html>

</tr>  
</table>
</div>

</body>
</html>