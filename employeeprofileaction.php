<?php
session_start();


include "connection.php";

$id=$_POST['id'];

$fullname=$_POST['fullname'];
$gender=$_POST['gender'];
$emailid=$_POST['emailid'];
$password=$_POST['password'];
$mobile=$_POST['mobile'];
$dob=$_POST['dob'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$country=$_POST['country'];
$postal=$_POST['postal'];


if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "UPDATE register SET fullname='$fullname', gender='$gender',  emailid='$emailid', password='$password',
 mobile='$mobile', dob='$dob', address='$address', city='$city', state='$state', country='$country',
  postal='$postal' WHERE id=$id";

if($db->query($sql) === TRUE){
           header('Location:employeeprofile.php?error=1');
        }
else{ 
            header('Location:employeeprofile.php?error=2');
         }
$db->close();

?> 
