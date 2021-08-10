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
$('#dob').datepicker({
            /*format: "dd/mm/yyyy",*/
          dateFormat: 'dd-M-yy',
        }); 
});
</script> 
<script>
$(document).ready(function(){
    $("#compose").click(function(){
               $("#composemail").show();
               $("#sentmails").hide();
               $("#inboxmails").hide();
      });
    $("#sent").click(function(){
               $("#composemail").hide();
               $("#sentmails").show();
               $("#inboxmails").hide();
      });
    $("#inbox").click(function(){
               $("#composemail").hide();
               $("#sentmails").hide();
               $("#inboxmails").show();
      });
});
</script>
<style type="text/css">
body{
background-image: url('Images/b1.jpg');
}
</style>
</head>
<?php /*include "header.php"*/ ?>
<?php include "adminmenu.php" ?>

<body>

<div class="container-fluid">
<div class="row">
<div class="col-xs-12 col-sm-12">

<br><br><br><br><br><br><br><br>  
<div class="row">
<div class="col-xs-12 col-sm-12 form-group">
   <center>Please select : &nbsp;&nbsp;&nbsp;
<label class="radio-inline"><input type="radio" id="compose" name="optradio"><strong class="text-success">Compose Mail</strong></label>
<label class="radio-inline"><input type="radio" id="sent" name="optradio"><strong class="text-danger">Sent Mails</strong></label>
<label class="radio-inline"><input type="radio" id="inbox" name="optradio"><strong class="text-danger">Inbox</strong></label>
   </center>    
 </div>
</div>
<div id="composemail">
<center><h3><strong>Compose Mail</strong></h3></center>

<center><?php
            if(isset($_GET['error'])==true){
                if($_GET['error']==1){
                    
                echo " <b style='color:#B8860B;'>*&nbsp; Your message sent successfully. </b>";       

                }
                elseif($_GET['error']==2){
                    
                echo " <b style='color:red'>*&nbsp; Your message not sent successfully. </b>";       

                }
            }
            ?>
</center>

<div class="row">
  <div class="col-xs-12 col-sm-3 form-group"></div>           
            <div class="col-xs-12 col-sm-9 form-group">
           
      <!-- --------------Login Account----------- -->
 
<br><br>

 <div class="log">
<form method="POST" action="admincomposeaction.php" enctype="multipart/form-data" >


<div class="row">

<div class="col-xs-12 col-sm-8 form-group">
<input type="text" class="form-control" id="from" placeholder="From:" name="from" value="<?php echo $email; ?>" readonly>           
</div>  
</div>
<div class="row">
       <div class="col-xs-12 col-sm-8 form-group">
              <div class="input-group">
          <span class="input-group-addon"><i class ="fa fa-user"></i></span>
             
 <select class="form-control" id="to"  name="to" required>
 <option value=""> Please Select Manager </option> 
<?php     
include"connection.php";
$sql=mysqli_query($db,"SELECT r.emailid, r.fullname, d.deptname, d.deptlocation FROM register r, assignmanagers a, department d WHERE r.emailid=a.mailid AND a.deptid=d.id AND r.role='manager' ");
   
while ($row=mysqli_fetch_array($sql)) { ?>

  <option value=<?php echo $row['emailid'];?> style="color:#D2691E"><?php echo $row['fullname'] ." (". $row['emailid'] .") - ". $row['deptname'] ." (". $row['deptlocation'] .")" ;?></option>
  <?php } ?>
  <option value=""> Please Select Finance Manager </option> 
 <?php     
include"connection.php";
$sql=mysqli_query($db,"SELECT * FROM register WHERE role='fncmanager' ");
   
while ($row=mysqli_fetch_array($sql)) { ?>

  <option value=<?php echo $row['emailid'];?> style="color:#0000ff"><?php echo $row['fullname'] ." - ". $row['emailid'];?></option>
  <?php } ?> 
  <option value=""> Please Select Employee </option> 
 <?php     
include"connection.php";
$sql=mysqli_query($db,"SELECT r.emailid, r.fullname, d.deptname, d.deptlocation FROM register r, assignmanagers a, department d WHERE r.emailid=a.mailid AND a.deptid=d.id AND r.role='employee' ");
   
while ($row=mysqli_fetch_array($sql)) { ?>

  <option value=<?php echo $row['emailid'];?> style="color:#cc0000"><?php echo $row['fullname'] ." (". $row['emailid'] .") - ". $row['deptname'] ." (". $row['deptlocation'] .")" ;?></option>
  <?php } ?> 
</select>
</div>
</div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-8 form-group">
      <textarea class="form-control" rows="4" id="message" name="message" placeholder="Type your message." required></textarea> 
  </div> 
</div>

<div class="row btngrp">
  <div class="col-xs-12 col-sm-8">
 <button type="submit" class="btn btn-success btn-md pull-right" id="submitbtn"><span>Submit</span></button>
  </div>
</div>                

</form>  
</div>
                  
  </div>
</div>
</div>
<!-- Compose mail closed -->
<!-- Start the sent mails -->

 <div id="sentmails" style="display:none">

  <div id="row">
        
        <div class="table-responsive">

        <div class="panel panel-primary filterable">
                <div class="panel-heading"><h3 class="panel-title">Details</h3>
                 <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><strong><span class="glyphicon glyphicon-filter"></span> Filter</strong></button>
                </div>
                </div>
                <div class="panel-body filtertable">
               
          <table class="table table-striped table-bordered">
          
          <thead>
          <tr class="filters">
          <th>Id</th>
          <!-- <th><input type="text" class="form-control" placeholder="From" disabled></th> -->
          <th><input type="text" class="form-control" placeholder="To" disabled></th>
          <th><input type="text" class="form-control" placeholder="Message" disabled></th>
          <th><input type="text" class="form-control" placeholder="Date" disabled></th>
          <!-- <th><input type="text" class="form-control" placeholder="Delete" disabled></th> -->


          </tr>
          </thead>
          
          <tbody>
          <?php
     include "connection.php";

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT * FROM mails WHERE fromid='$email' ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                echo "<tr>";
                
                    echo "<td>" . $row['id'] . "</td>";
                    /*echo "<td>" . $row['fromid'] . "</td>";*/
                    echo "<td>" . $row['toid'] . "</td>";
                    echo "<td>" . $row['message'] . "</td>";
                    echo "<td>" . $row['senddate'] . "</td>";

                echo "</tr>";
            }
            mysqli_free_result($result);
        } else{
            echo "<center><strong style='color:red'>No records available.</strong></center>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }
    mysqli_close($db);
    ?>
          
          
          </tbody>
          </table>
          </div>
          </div>

        </div>
        </div>
        </div>

<!-- Close the sent mails -->
<!-- Start the Inbox mails -->

 <div id="inboxmails" style="display:none">

  <div id="row">
        
        <div class="table-responsive">

        <div class="panel panel-primary filterable">
                <div class="panel-heading"><h3 class="panel-title">Details</h3>
                 <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><strong><span class="glyphicon glyphicon-filter"></span> Filter</strong></button>
                </div>
                </div>
                <div class="panel-body filtertable">
               
          <table class="table table-striped table-bordered">
          
          <thead>
          <tr class="filters">
          <th>Id</th>
          <th><input type="text" class="form-control" placeholder="From" disabled></th>
          <!-- <th><input type="text" class="form-control" placeholder="To" disabled></th> -->
          <th><input type="text" class="form-control" placeholder="Message" disabled></th>
          <th><input type="text" class="form-control" placeholder="Date" disabled></th>
          <th><input type="text" class="form-control" placeholder="Reply" disabled></th>


          </tr>
          </thead>
          
          <tbody>
          <?php
     include "connection.php";

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT * FROM mails WHERE toid='$email' ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['fromid'] . "</td>";
                    /*echo "<td>" . $row['toid'] . "</td>";*/
                    echo "<td>" . $row['message'] . "</td>";
                    echo "<td>" . $row['senddate'] . "</td>";
?>

<td>
    <a href="adminreply.php?id=<?php echo  $row['id'] ?>" class="btn btn-warning btn-sm">Reply</a>
</td>

<?php
                echo "</tr>";
            }
            mysqli_free_result($result);
        } else{
            echo "<center><strong style='color:red'>Details not available.</strong></center>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }
    mysqli_close($db);
    ?>
          
          
          </tbody>
          </table>
          </div>
          </div>

        </div>
        </div>
        </div>

<!-- Close the Inbox mails -->
</div>
</div> 
</div>

<?php include "footer.php"; ?>

</body>
</html>