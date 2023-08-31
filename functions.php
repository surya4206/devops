<?php 

session_start();

function signup($data)
{
	$errors = array();
 
	//validate 
	if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
		$errors[] = "Please enter a valid email";
	}

	if(strlen(trim($data['pass1'])) < 4){
		$errors[] = "Password must be atleast 4 chars long";
	}

	if($data['pass1'] != $data['pass2']){
		$errors[] = "Passwords must match";
	}

	$check = database_run("select * from info where email = :email limit 1",['email'=>$data['email']]);
	if(is_array($check)){
		$errors[] = "That email already exists";
	}

	//save
	if(count($errors) == 0){

$arr['fname']=$data['fname'];
$arr['lname']=$data['lname'];
$arr['gender']=$data['Gender'];
$arr['email']=$data['email'];
$arr['dob']=$data['dob'];
$arr['phno']=$data['phono'];
$arr['pwd']=$data['pass1'];

		$query = "insert into info(fname,lname,dob,gender,email,phno,password) values (:fname,:lname,:dob,:gender,:email,:phno,:pwd)";

		database_run($query,$arr);
	}
	return $errors;
}

function login($data)
{
	$errors = array();
 
	//validate 
	if(!filter_var($data['username'],FILTER_VALIDATE_EMAIL)){
		$errors[] = "Please enter a valid email";
	}

	if(strlen(trim($data['pass'])) < 4){
		$errors[] = "Password must be atleast 4 chars long";
	}
 
	//check
	if(count($errors) == 0){

		$arr['email'] = $data['username'];
		$password = hash('sha256', $data['pass']);

		$query = "select * from info where email = :email limit 1";

		$row = database_run($query,$arr);

		if(is_array($row)){
			$row = $row[0];

			if($password === $row->password){
				
				$_SESSION['USER'] = $row;
				$_SESSION['LOGGED_IN'] = true;
			}else{
				$errors[] = "wrong email or password";
			}

		}else{
			$errors[] = "wrong email or password";
		}
	}
	return $errors;
}

function database_run($query,$vars = array())
{
	$string = "mysql:host=localhost;dbname=payverse";
	$con = new PDO($string,'root','');

	if(!$con){
		return false;
	}

	$stm = $con->prepare($query);
	$check = $stm->execute($vars);

	if($check){
		
		$data = $stm->fetchAll(PDO::FETCH_OBJ);
		
		if(count($data) > 0){
			return $data;
		}
	}

	return false;
}

// function check_login($redirect = true){

// 	if(isset($_SESSION['USER']) && isset($_SESSION['LOGGED_IN'])){

// 		return true;
// 	}

// 	if($redirect){
// 		header("Location: login.php");
// 		die;
// 	}else{
// 		return false;
// 	}
	
// }

// function check_verified(){

// 	$id = $_SESSION['USER']->id;
// 	$query = "select * from users where id = '$id' limit 1";
// 	$row = database_run($query);

// 	if(is_array($row)){
// 		$row = $row[0];

// 		if($row->email == $row->email_verified){

// 			return true;
// 		}
// 	}
 
// 	return false;
 	
// }

