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
					header("Location: bankacct.html");
					die;
				}else{
					echo "Code expired";
				}

			}else{
				echo "wrong code";
			}
		
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Verify</title>
</head>
<body>

	<h1>Verify</h1>
	<br><br>
 	<div>
			<br>an email was sent to your address. paste the code from the email here<br>
		<div>
			<?php if(count($errors) > 0):?>
				<?php foreach ($errors as $error):?>
					<?= $error?> <br>	
				<?php endforeach;?>
			<?php endif;?>

		</div><br>
		<div></div>
		<form method="post">
			<input type="text" name="code" placeholder="Enter your Code"><br>
 			<br>
			<input type="submit" value="Verify">
		</form>
	</div>

</body>
</html>