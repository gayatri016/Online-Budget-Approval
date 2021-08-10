<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "budjet";
$prefix = "";
     
$db = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysqli_select_db($db, $mysql_database) or die("Could not select database");

/*if (mysqli_connect_errno($db))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{
echo "Successfully connected to your database";
}*/
error_reporting(0);
?>


