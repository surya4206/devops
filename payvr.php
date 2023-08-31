<?php
session_id('mySessionID1');
session_start();
// if(isset( $_SESSION['username'] ) )
// echo"true";
// else
// echo"false";
// $a=$_SESSION['username'];
// echo"$a";
$connection=mysqli_connect('localhost','root');
mysqli_select_db($connection,'payverse');
$amt=$_POST['amt'];
$phno=$_POST['rphno'];
$loginid=$_SESSION['username'];

$q1="select walletbal from login_info where loginid='$loginid'";
$r1 = $connection->query($q1);
$row1=$r1->fetch_object();
if($row1->walletbal<=100|| $row1->walletbal-$amt<100 ){
   header('location:tranfailpaymoney.php');
}


else {
mysqli_query($connection, "START TRANSACTION");

$query1 = mysqli_query($connection, "update login_info set walletbal=walletbal-'$amt' where loginid='$loginid'");
$query2 = mysqli_query($connection, "update login_info set walletbal=walletbal+'$amt' where loginid=(select email from info where phno='$phno')");

if ($query1 and $query2) {
   mysqli_query($connection, "COMMIT");
   header('location:transuccess.html');
    //Commits the current ////transaction
} else {        
   mysqli_query($connection, "ROLLBACK");//Even if any one of the query fails, the changes will be undone
   header('location:Tranfail.html');
}
}
?>