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

<style type="text/css">
body{
background-image: url('Images/b1.jpg');
 background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
$('#startdate').datepicker({
            /*format: "dd/mm/yyyy",*/
          dateFormat: 'dd-M-yy',
        }); 
});
</script> 
<script>
$(document).ready(function(){
    $("#add").click(function(){
               $("#adddept").show();
               $("#viewdept").hide();
      });
    $("#view").click(function(){
               $("#adddept").hide();
               $("#viewdept").show();
      });
});
</script>

</head>
<?php /*include "header.php";*/ ?>
<?php include "adminmenu.php"; ?>
<?php include "connection.php"; ?>
<body>

<div class="container-fluid">
<div class="row">        
<div class="col-xs-12 col-sm-12">


<br><br><br><br><br><br><br><br>
<div class="row">
<div class="col-xs-12 col-sm-12 form-group">
   <center>Please select : &nbsp;&nbsp;&nbsp;
<label class="radio-inline"><input type="radio" id="add" name="optradio"><strong class="text-success">Add Department</strong></label>
<label class="radio-inline"><input type="radio" id="view" name="optradio"><strong class="text-danger">View Department</strong></label>
   </center> 
      </div>
    </div>
 <div id="adddept">
<center><h3><strong>Department</strong></h3>
<?php
            if(isset($_GET['error'])==true){
                if($_GET['error']==1){ 
                echo "<b style='color:red'>*&nbsp; Department details alreary exist. </b>";       
                }
                elseif($_GET['error']==2){
                echo "<b style='color:red'>*&nbsp; Department details is not successfully added . </b>";
                }
                elseif($_GET['error']==3){  
                echo "<b style='color:#3333ff'>*&nbsp; Department details is successfully done. </b>";       
                }
            }
            ?>
</center>            
<div class="row">
  <div class="col-xs-12 col-sm-2"></div>
  <div class="col-xs-12 col-sm-10">
<br><br>         
<form method="POST" action="departmentaction.php" enctype="multipart/form-data" >
<div class="row">
  <div class="col-xs-12 col-sm-5 form-group">
    <div class="input-group">
     <span class="input-group-addon"><i class ="fa fa-home"></i></span>
      <input type="text" class="form-control" id ="deptname" placeholder="Department Name" name="deptname" required>
    </div>
  </div>
  <div class="col-xs-12 col-sm-5 form-group">
    <div class="input-group">
     <span class="input-group-addon"><i class ="fa fa-area-chart"></i></span>
      <input type="text" class="form-control" id ="deptlocation" placeholder="Department Location" name="deptlocation" title="Enter 200 characters only." required>
  </div>
</div> 
</div> 
<div class="row">
  <div class="col-xs-12 col-sm-10 form-group">
    <textarea class="form-control" rows="3" id="deptdesc" name="deptdesc" placeholder="Describe about the department details in 4000 words." required></textarea> 
  </div> 
</div>   
<div class="row btngrp">
  <div class="col-xs-12 col-sm-10">
      <button type="submit" class="btn btn-success btn-md pull-right" id="submitbtn"><span>Submit</span></button>
  </div>
</div>    


</form>  
</div>
</div>
</div>
  
<div id="viewdept" style="display:none">
  <div id="row">
      <div class="table-responsive">
        <div class="panel panel-primary filterable">
                <div class="panel-heading"><center><h3 class="panel-title">Department Details</h3></center>
                 <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><strong><span class="glyphicon glyphicon-filter"></span> Filter</strong></button>
                </div>
                </div>
                <div class="panel-body filtertable">
               
          <table class="table table-striped table-bordered">
          
          <thead>
          <tr class="filters">
          <th>Id</th>
          <th><input type="text" class="form-control" placeholder="Name" disabled></th>
          <th><input type="text" class="form-control" placeholder="Location" disabled></th>
          <th><input type="text" class="form-control" placeholder="Started Date" disabled></th>
          <th><input type="text" class="form-control" placeholder="View & Update" disabled></th>
          
          </tr>
          </thead>
          
          <tbody>
          <?php
     include "connection.php";

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT * FROM department ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['deptname'] . "</td>";
                    echo "<td>" . $row['deptlocation'] . "</td>";
                    echo "<td>" . $row['deptdate'] . "</td>";
?>
<td>
   <button type="button" class="viewmodal btn btn-warning btn-sm" data-toggle="modal">View</button>
   <a href="deptedit.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-sm">Edit</a>
</td>
<?php
                 echo "<td style='display:none'>" . $row['deptdesc'] . "</td>";

                echo "</tr>";
            }
          
            mysqli_free_result($result);
        } else{
            echo "<center>Records not available.</center>";
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


<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Department Details:</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <span id="demomsg"><br></span>

                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Department Name:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="dn" name="dname" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Department Area:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="dl" name="dlocation" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Started Date:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="dd" name="ddate" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Description:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="ddesc" name="deptdesc" value=""></span></div>
                    </div>
                  
                    <br>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">
                    <i class="fa fa-close"></i>  Close
                </button>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
<?php include "footer.php"; ?>
</body>
</html>


<script type="text/javascript">

$('.viewmodal').click(function () {
    $('#id').text($(this).closest("tr").find('td:eq(0)').text());
    $('#dn').text($(this).closest("tr").find('td:eq(1)').text());
    $('#dl').text($(this).closest("tr").find('td:eq(2)').text());
    $('#dd').text($(this).closest("tr").find('td:eq(3)').text());
    $('#ddesc').text($(this).closest("tr").find('td:eq(5)').text());

    $('#myModal').modal('show');

});
</script>