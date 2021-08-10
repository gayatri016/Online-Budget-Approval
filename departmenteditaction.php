<?php
session_start();


include "connection.php";

$id=$_POST['deptid'];

$deptname=$_POST['deptname'];
$deptlocation=$_POST['deptlocation'];
$deptdesc=$_POST['deptdesc'];


if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "UPDATE department SET deptname='$deptname', deptlocation='$deptlocation',  deptdesc='$deptdesc' WHERE id=$id";

if($db->query($sql) === TRUE){
            header('Location:deptedit.php?error=1 & id='.$id);
        }
else{ 
            header('Location:deptedit.php?error=2 & id='.$id);
        }
$db->close();

?> 
