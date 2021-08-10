<?php
session_start();


include "connection.php";

$id=$_POST['billid'];

$billname=$_POST['billname'];
$billamount=$_POST['billamount'];
$billdesc=$_POST['billdesc'];


if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "UPDATE bills SET billname='$billname', billamount='$billamount',  billdesc='$billdesc' WHERE id=$id";

if($db->query($sql) === TRUE){
            header('Location:billedit.php?error=1 & id='.$id);
        }
else{ 
            header('Location:billedit.php?error=2 & id='.$id);
        }
$db->close();

?> 
