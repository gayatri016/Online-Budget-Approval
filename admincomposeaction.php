<?php
session_start();
     
include('connection.php');

$from=$_POST['from'];
$to=$_POST['to'];
$message=$_POST['message'];

/*$check_email = mysqli_query($db, "SELECT * FROM register WHERE emailid = '$from' AND emailid='$to'  ");
if(mysqli_num_rows($check_email) > 0){
    echo "<script> alert('Email not sent to your account') </script>";
    echo "<script>location='compose.php' </script>"; 

}

else{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
mysqli_query($db, "INSERT INTO mails(fromid, toid,  message) VALUES('$from', '$to', '$message')");

if($mysqli_query_execute->num_rows ===0){
           header('Location:adminmails.php?error=2');
        }
else{  
          /*echo "<script> alert('Mail Sent successfully') </script>";
          echo "<script>location='compose.php' </script>"; */
          header('Location:adminmails.php?error=1');
         }
/* } } */
?>