<?php
$id=$_REQUEST['id'];
$emailid=$_REQUEST['emailid'];
/*$chiefmailid=$_REQUEST['chiefmailid'];*/
//echo"$country";
include "connection.php";


$sql=mysqli_query($db, "SELECT s.id, s.statename FROM register r, state s WHERE r.state=s.id AND r.country='$id'AND r.emailid='$emailid' ");
while ($row = mysqli_fetch_array($sql)){
$sid = $row[0];
$sname = $row[1];
}

$data=mysqli_query($db,"SELECT s.id, s.statename FROM country c, state s WHERE c.id=s.countryid AND s.countryid='$id' ");
echo "<option value=$sid>$sname</option>";	
echo "<option> Please Select State </option> ";
while($rec=mysqli_fetch_row($data))
{
echo "<option value=$rec[0]>$rec[1]</option>";	
}

?>


<!-- $id=$_REQUEST['id'];
$chiefmailid=$_REQUEST['chiefmailid'];
//echo"$country";
include "connection.php";

$data=mysqli_query($db,"SELECT DISTINCT a.weapontypeid, e.weapontype FROM team t, weapon w, weaponassign a, weapontype e WHERE t.id=a.teamid AND e.id=a.weapontypeid AND w.id=a.weaponid AND t.id=a.teamid AND t.teamlead='$chiefmailid' AND a.weaponid='$id' ");
echo "<option> Please Select Weapon Type </option> ";
while($rec=mysqli_fetch_row($data))
{
echo "<option value=$rec[0]>$rec[1]</option>";	
} -->