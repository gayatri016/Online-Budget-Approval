<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<title>Budget</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css"/>

<link rel="stylesheet" type="text/css" href="css/style/style1.css"/>
        <script src="js/jquery-3.2.1.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/admin/main.js"></script>    


<script type="text/javascript">
$(document).ready(function(){
$('#startdate').datepicker({
            /*format: "dd/mm/yyyy",*/
          dateFormat: 'dd-M-yy',
        }); 
});
</script>

<style type="text/css">
body{
background-image: url('Images/b1.jpg');
 background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
</head>
<?php /*include "header.php"*/ ?>
<?php include "adminmenu.php" ?>  
<?php include "connection.php"; ?>           
<body>

<div class="container-fluid">
<div class="row">
<div class="col-xs-12 col-sm-12">

<br><br><br><br><br><br><br><br><br>

<?php
$id=$_GET['id'];
$sql1=mysqli_query($db, "SELECT d.deptname FROM assignmanagers a, department d WHERE a.deptid=d.id AND a.id='$id' ");
while ($row1 = mysqli_fetch_array($sql1)){
$deptname = $row1['deptname'];
}

?>
<center>
<h4> Change <strong style="color:red"><?php echo $deptname; ?></strong> Details</h4>
<?php
            if(isset($_GET['error'])==true){
                if($_GET['error']==2){
                    
                echo " <b style='color:red'>*&nbsp; Details not updated. </b>";       

                }
                elseif($_GET['error']==1){
                    
                echo " <b style='color:#3333ff'>*&nbsp; Details updated successfully. </b>";       
                }
                elseif($_GET['error']==3){
                    
                echo " <b style='color:red'>*&nbsp; Details already closed. </b>";       

                }
            }
            ?>
</center>
<a href="assignmanagers.php" class="btn btn-info btn-sm pull-right"><i class ="fa fa-angle-double-left"></i> &nbsp; Back</a>
<br>
<div class="row">
  <div class="col-xs-12 col-sm-2 form-group"></div>           
            <div class="col-xs-12 col-sm-10 form-group">

<?php
    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT a.deptid, d.deptname, a.mailid, r.fullname FROM assignmanagers a, register r, department d WHERE a.mailid=r.emailid AND a.deptid=d.id AND a.id='$id' ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){
?>

<div class=""> 
<form method="post" action="assignemployeeeditaction.php" enctype="multipart/form-data">

<div class="row">
  <div class="col-xs-12 col-sm-5 form-group">
   <input type="hidden" class="form-control" id="aid" name="aid" value='<?php echo $id; ?>' readonly>
  </div>
</div>

<div class="row">
      <div class="col-xs-12 col-sm-5 form-group">
        <label for="">Department:</label>
        <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-home"></i></span>
      <input type="text" class="form-control" id="deptname" placeholder="Department Name" name="deptname" value='<?php echo $row['deptname'] ?>' readonly>
          </div>
      </div>
<div class="col-xs-12 col-sm-5 form-group">
    <label for="">Manager :</label>
    <div class="input-group">
    <span class="input-group-addon"><i class ="fa fa-home"></i></span>
    <select class="form-control" id="mailid" name="mailid" required>
      <option value="<?php echo $row['mailid']; ?>"><?php echo $row['fullname'] ." (". $row['mailid'] . ")"; ?></option>
         <option value="">Please Select Employee</option>
<?php

$sql2=mysqli_query($db, "SELECT * FROM register WHERE role='employee' ");
while ($row2 = mysqli_fetch_array($sql2)){
  ?>
          <option value="<?php echo $row2['emailid']; ?>"><?php echo $row2['fullname']." (".$row2['emailid'] . ")"; ?></option>
<?php } ?>  
      </select>
     </div>
   </div> 
</div>     
<div class="row btngrp">
  <div class="col-xs-12 col-sm-10">
  <button type="submit" class="btn btn-success btn-md pull-right" id="loginbtn"><span>Update</span></button>
  </div>
</div>            
               
</form>
</div>
</div>
<?php          
            }
          
            mysqli_free_result($result);
        } else{
            echo "<center><strong style='color:red'>No records available.</strong></center>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    } 
    // Close connection
    mysqli_close($db);

    ?>

  </div>
  </div>
  </div>

</div>
</div> 
</div>

<?php include "footer.php"; ?>

</body>
</html>