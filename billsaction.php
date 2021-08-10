<?php
session_start();
     
include('connection.php');

$billname=$_POST['billname'];
$billamount=$_POST['billamount'];
$billdesc=$_POST['billdesc'];

date_default_timezone_set("Asia/Kolkata");
$billenterdate= date("Y-m-d") . ' ' . date("H:i:s");


$check_bills = mysqli_query($db, "SELECT * FROM bills WHERE billname = '$billname' ");
if(mysqli_num_rows($check_bills) > 0){
      header('Location:bills.php?error=1'); 
}
else{
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
   mysqli_query($db, "INSERT INTO bills(billname, billamount, billdesc, billenterdate) VALUES('$billname', '$billamount', '$billdesc', '$billenterdate')");

/*}*/
   if($mysqli_query_execute->num_rows ===0){
          header('Location:bills.php?error=2');
        }
else{ 
          header('Location:bills.php?error=3');

        }
}

?>