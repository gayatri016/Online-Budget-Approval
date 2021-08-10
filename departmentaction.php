<?php
session_start();
     
include('connection.php');

$deptname=$_POST['deptname'];
$deptlocation=$_POST['deptlocation'];
$deptdesc=$_POST['deptdesc'];

date_default_timezone_set("Asia/Kolkata");
$deptdate= date("Y-m-d") . ' ' . date("H:i:s");


$check_dept = mysqli_query($db, "SELECT * FROM department WHERE deptname = '$deptname' AND deptlocation = '$deptlocation' ");
if(mysqli_num_rows($check_dept) > 0){
      header('Location:department.php?error=1'); 
}
else{
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
   mysqli_query($db, "INSERT INTO department(deptname, deptlocation, deptdesc, deptdate) VALUES('$deptname', '$deptlocation', '$deptdesc', '$deptdate')");

/*}*/
   if($mysqli_query_execute->num_rows ===0){
          header('Location:department.php?error=2');
        }
else{ 
          header('Location:department.php?error=3');

        }
}

?>