
<?php
session_start();
     
include('connection.php');

$empmailid=$_POST['empmailid'];
$deptid=$_POST['deptid'];

date_default_timezone_set("Asia/Kolkata");
$regdate= date("Y-m-d") . ' ' . date("H:i:s");

$check_email = mysqli_query($db, "SELECT * FROM assignmanagers WHERE mailid = '$empmailid' AND deptid = '$deptid' ");
if(mysqli_num_rows($check_email) > 0){
      header('Location:assignmanagers.php?error=4'); 
}
else{
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
  mysqli_query($db, "INSERT INTO assignmanagers(mailid, deptid) VALUES('$empmailid', '$deptid' )");

/*}*/
   if($mysqli_query_execute->num_rows ===0){
          header('Location:assignmanagers.php?error=5');
        }
else{ 
          header('Location:assignmanagers.php?error=6');

         }
}

?>