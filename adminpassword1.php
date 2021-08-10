<?php
session_start();

include "connection.php";

$emailid=$_POST['emailid'];
$currentpassword=$_POST['currentpassword'];
$newpassword=$_POST['newpassword'];
$confirmpassword=$_POST['confirmpassword'];



/*$sql=mysqli_query($db,"SELECT * FROM register WHERE emailid='$emailid' ");
while ($row=mysqli_fetch_array($sql)) { 
 $password  = $row['password'];
}
*/
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if($newpassword != $confirmpassword){    
      header('Location:adminpassword.php?error=1'); 
}
else{

$sql = "UPDATE register SET password='$newpassword' WHERE emailid='$emailid' ";


if ($db->query($sql) === TRUE) {
   
  header('Location: adminpassword.php?error=2');

} else {
   header('Location: adminpassword.php?error=3');
}
}
$db->close();


?> 
