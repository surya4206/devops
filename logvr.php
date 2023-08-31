<?php
$connection=mysqli_connect('localhost','root');
// session_unset();
if($connection){
    echo "Connection established";

}
else {
    echo"failed";
}
mysqli_select_db($connection,'payverse');

$uname=$_POST['username'];
$pwd=$_POST['pass'];

$query="select * from login_info where password='$pwd' and loginid='$uname'";
$result=mysqli_query($connection,$query);
if(mysqli_num_rows($result)==1){
    session_id('mySessionID1');
    session_start();
  $_SESSION['username']= $uname;
  $_SESSION['password']= $pwd;
if(isset( $_SESSION['username'] ) )
echo"true";
    echo"Username or Password correct $uname and $pwd";
    header('location:home.html');
}
else{
    echo "Login Unsuccessful";
}

?>



