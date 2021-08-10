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
}
</style>
<script>
$(document).ready(function(){
    $("#view").click(function(){
               $("#viewteam").show();
               $("#viewemp").hide();
      });
    $("#views").click(function(){
               $("#viewteam").hide();
               $("#viewemp").show();
      });
});
</script>

</head>
<?php /*include "header.php";*/ ?>
<?php include "employeemenu.php"; ?>
<?php include "connection.php"; ?>
<body>

<div class="container-fluid">
<div class="row">        
<div class="col-xs-12 col-sm-12">


<br><br><br><br><br><br><br><br>

<div class="row">
<div class="col-xs-12 col-sm-12 form-group">
   <center>Please select : &nbsp;&nbsp;&nbsp;
<label class="radio-inline"><input type="radio" id="view" name="optradio"><strong class="text-success">Managers</strong></label>
<label class="radio-inline"><input type="radio" id="views" name="optradio"><strong class="text-danger">Employees</strong></label>
   </center> 
      </div>
    </div>

<div id="viewteam">
<div id="row">      
<div class="table-responsive">

   <div class="panel panel-primary filterable">
     <div class="panel-heading"><center><h3 class="panel-title">Manager Details</h3></center>
       <div class="pull-right">
          <button class="btn btn-default btn-xs btn-filter"><strong><span class="glyphicon glyphicon-filter"></span> Filter</strong></button>
       </div>
      </div>
      <div class="panel-body filtertable">
               
          <table class="table table-striped table-bordered">
          
          <thead>
          <tr class="filters">
          <th>Id</th>
          <th><input type="text" class="form-control" placeholder="Department" disabled></th>
          <th><input type="text" class="form-control" placeholder="Manager Name" disabled></th>
          <th><input type="text" class="form-control" placeholder="Manager Mail" disabled></th>
          <th><input type="text" class="form-control" placeholder="Department Loacation" disabled></th>
          <th><input type="text" class="form-control" placeholder="View" disabled></th>
          
          </tr>
          </thead>
          
          <tbody>
          <?php
  $sql1=mysqli_query($db,"SELECT * FROM assignmanagers WHERE mailid='$email'  ");
while ($row1=mysqli_fetch_array($sql1)) {
$deptid=$row1['deptid'];
}

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }
/*SELECT * FROM register WHERE role='manager' and emailid in(
SELECT mailid FROM assignmanagers WHERE deptid=(SELECT deptid FROM assignmanagers WHERE mailid='employee@gmail.com'))*/


    $sql = "SELECT a.id, d.deptname, d.deptlocation, r.fullname, a.mailid, d.deptdesc FROM assignmanagers a, department d, register r WHERE a.deptid=d.id AND a.mailid=r.emailid AND r.role='manager' AND a.deptid='$deptid' ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['deptname'] . "</td>";
                    echo "<td>" . $row['fullname'] . "</td>";
                    echo "<td>" . $row['mailid'] . "</td>";
                    echo "<td>" . $row['deptlocation'] . "</td>";
?>
<td>
   <button type="button" class="viewmodal btn btn-warning btn-sm" data-toggle="modal">View</button>
</td>

<?php                
                    echo "<td style='display:none'>" . $row['deptdesc' ] . "</td>";

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



<div id="viewemp" style="display:none">
<div id="row">      
<div class="table-responsive">

   <div class="panel panel-primary filterable">
     <div class="panel-heading"><center><h3 class="panel-title">Employee Details</h3></center>
       <div class="pull-right">
          <button class="btn btn-default btn-xs btn-filter"><strong><span class="glyphicon glyphicon-filter"></span> Filter</strong></button>
       </div>
      </div>
      <div class="panel-body filtertable">
               
          <table class="table table-striped table-bordered">
          
          <thead>
          <tr class="filters">
          <th>Id</th>
          <th><input type="text" class="form-control" placeholder="Department" disabled></th>
          <th><input type="text" class="form-control" placeholder="Employee Name" disabled></th>
          <th><input type="text" class="form-control" placeholder="Employee Mail" disabled></th>
          <th><input type="text" class="form-control" placeholder="Department Loacation" disabled></th>
          <th><input type="text" class="form-control" placeholder="View" disabled></th>
          
          </tr>
          </thead>
          
          <tbody>
<?php
include "connection.php";

$sql3=mysqli_query($db,"SELECT * FROM assignmanagers WHERE mailid='$email'  ");
while ($row3=mysqli_fetch_array($sql3)) {
$did=$row3['deptid'];
}

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT a.id, d.deptname, d.deptlocation, r.fullname, a.mailid, d.deptdesc FROM assignmanagers a, department d, register r WHERE a.deptid=d.id AND a.mailid=r.emailid AND r.role='employee' AND a.deptid='$did' ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['deptname'] . "</td>";
                    echo "<td>" . $row['fullname'] . "</td>";
                    echo "<td>" . $row['mailid'] . "</td>";
                    echo "<td>" . $row['deptlocation'] . "</td>";
?>
<td>
   <button type="button" class="viewmodal btn btn-warning btn-sm" data-toggle="modal">View</button>
</td>

<?php                
                    echo "<td style='display:none'>" . $row['deptdesc' ] . "</td>";

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
                <h4 class="modal-title">Details:</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <span id="demomsg"><br></span>

                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Department Name:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="dn"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Name:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="mn"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Mail Id:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="mm"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Department Location:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="bl"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Department Description:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="dd"></span></div>
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
    $('#mn').text($(this).closest("tr").find('td:eq(2)').text());
    $('#mm').text($(this).closest("tr").find('td:eq(3)').text());
    $('#bl').text($(this).closest("tr").find('td:eq(4)').text());
    $('#dd').text($(this).closest("tr").find('td:eq(6)').text());

    $('#myModal').modal('show');

});
</script>