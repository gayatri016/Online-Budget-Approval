<?php
session_start();
     
include('connection.php');

echo $id=$_POST['mid'];
echo $from=$_POST['from'];
/*$itemname=$_POST['itemname'];
$item= preg_replace('/\s+/', '', $itemname);*/

echo $to=$_POST['to'];
echo $senddate=$_POST['senddate'];
echo $message=$_POST['message'];
echo $replymsg=$_POST['replymsg'];


mysqli_query($db, "INSERT INTO inbox(fromid, toid, message, replymsg, senddate) VALUES('$from', '$to', 
	 '$message', '$replymsg', '$senddate')");
mysqli_query($db, "INSERT INTO mails(fromid, toid, message) VALUES('$from', '$to', '$replymsg')");

if($mysqli_query_execute->num_rows ===0){
           header('Location:adminreply.php?error=2 & id='.$id);
        }
else{  
          /*echo "<script> alert('Mail Sent successfully') </script>";
          echo "<script> location='admininbox.php' </script>"; */
           header('Location:adminreply.php?error=1 & id='.$id);
         }
?>