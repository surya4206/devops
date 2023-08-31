<?php

$connection=mysqli_connect('localhost','root');
session_id('mySessionID');
session_start();

if($connection){
    echo "Connection established";

}
else {
    echo"failed";
}
mysqli_select_db($connection,'payverse');
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['Gender'];
$email=$_POST['email'];
$dob=$_POST['dob'];
$phno=$_POST['phono'];
$pwd=$_POST['pass1'];

$_SESSION['email']=$email;
echo "hi";


$data="insert into info(fname,lname,dob,gender,email,phno,password) values ('$fname','$lname','$dob','$gender','$email','$phno','$pwd')";

mysqli_query($connection,$data);

$data="insert into login_info(loginid,password) values ('$email','$pwd')";

mysqli_query($connection,$data);

$data="insert into bank_account(loginid) values ('$email')";

mysqli_query($connection,$data);

header('location:verifynew.php');

?>
