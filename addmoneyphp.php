<?php
session_id('mySessionID1');
session_start();
$connection=mysqli_connect('localhost','root');
mysqli_select_db($connection,'payverse');
$amt=$_POST['amt'];
$loginid=$_SESSION['username'];

$q1="select balance from bank_account where loginid='$loginid'";
$r1 = $connection->query($q1);
$row1=$r1->fetch_object();
if($row1->balance<=100){
   header('location:tranfailaddmoney.php');
}


else{
mysqli_query($connection, "START TRANSACTION");

$query1 = mysqli_query($connection, "update bank_account set balance=balance-'$amt'  where loginid='$loginid'");
$query2 = mysqli_query($connection, "update login_info set walletbal=walletbal+'$amt' where loginid='$loginid'");

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