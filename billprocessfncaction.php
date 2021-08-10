<?php
session_start();


include "connection.php";

$id=$_POST['billrequestid'];

$fncmanagermailid=$_POST['fncmanagermailid'];
$status=$_POST['status'];
$fncmanagerdesc=$_POST['fncmanagerdesc'];


date_default_timezone_set("Asia/Kolkata");
$fncmanagerdate= date("Y-m-d") . ' ' . date("H:i:s");


if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$check_email = mysqli_query($db, "SELECT * FROM billrequest WHERE status = 'Sanction' OR status = 'Not-Sanction' AND id='$id' ");
if(mysqli_num_rows($check_email) > 0){
      header('Location:billprocessfinance.php?error=1 & id='.$id); 
}
else{


$sql = "UPDATE billrequest SET fncmanagermailid='$fncmanagermailid', status='$status',  fncmanagerdate='$fncmanagerdate', fncmanagerdesc='$fncmanagerdesc' WHERE id=$id";

if($db->query($sql) === TRUE){
           header('Location:billprocessfinance.php?error=2 & id='.$id);
        }
else{ 
            header('Location:billprocessfinance.php?error=3 & id='.$id);
         }
}
$db->close();

?> 
