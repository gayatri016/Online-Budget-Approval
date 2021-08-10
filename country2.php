<?php
$id=$_REQUEST['id'];
/*$chiefmailid=$_REQUEST['chiefmailid'];*/
//echo"$country";
include "connection.php";

$data=mysqli_query($db,"SELECT id, statename FROM state WHERE countryid='$id' ");
echo "<option> Please Select State </option> ";
while($rec=mysqli_fetch_row($data))
{
echo "<option value=$rec[0]>$rec[1]</option>";	
}

?>
