
<?php
session_start();
     
include('connection.php');

$managermailid=$_POST['managermailid'];
$deptid=$_POST['deptid'];

date_default_timezone_set("Asia/Kolkata");
$regdate= date("Y-m-d") . ' ' . date("H:i:s");

$check_email = mysqli_query($db, "SELECT * FROM assignmanagers WHERE mailid = '$managermailid' AND deptid = '$deptid' ");
if(mysqli_num_rows($check_email) > 0){
      header('Location:assignmanagers.php?error=1'); 
}
else{
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
  mysqli_query($db, "INSERT INTO assignmanagers(mailid, deptid) VALUES('$managermailid', '$deptid' )");

/*}*/
   if($mysqli_query_execute->num_rows ===0){
          header('Location:assignmanagers.php?error=2');
        }
else{ 
          header('Location:assignmanagers.php?error=3');

         }
}

?>