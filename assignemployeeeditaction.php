<?php
session_start();


include "connection.php";

$id=$_POST['aid'];

$mailid=$_POST['mailid'];

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "UPDATE assignmanagers SET mailid='$mailid' WHERE id=$id";

if($db->query($sql) === TRUE){
            header('Location:assignemployeeedit.php?error=1 & id='.$id);
        }
else{ 
            header('Location:assignemployeeedit.php?error=2 & id='.$id);
        }
$db->close();

?> 
