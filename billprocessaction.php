<?php
session_start();


include "connection.php";

$id=$_POST['billrequestid'];

$managermailid=$_POST['managermailid'];
$status=$_POST['status'];
$managerdesc=$_POST['managerdesc'];


date_default_timezone_set("Asia/Kolkata");
$managerdate= date("Y-m-d") . ' ' . date("H:i:s");


if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$check_email = mysqli_query($db, "SELECT * FROM billrequest WHERE status = 'Reject' AND id='$id' ");
if(mysqli_num_rows($check_email) > 0){
      header('Location:billprocess.php?error=1 & id='.$id); 
}
else{


$sql = "UPDATE billrequest SET managermailid='$managermailid', status='$status',  managerdate='$managerdate',
 managerdesc='$managerdesc' WHERE id=$id";

if($db->query($sql) === TRUE){
           header('Location:billprocess.php?error=2 & id='.$id);
        }
else{ 
            header('Location:billprocess.php?error=3 & id='.$id);
         }
}
$db->close();

?> 
