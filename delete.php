<?php
echo $id=$_GET['id'];
 
 include "connection.php";
 
 $del=mysqli_query($db,"delete from register where id=$id")or die(mysqli_error());
if($del)
{
echo "<script>alert('selected row deleted')</script>";
}
 echo "<script>location='register.php'</script>";

?>
