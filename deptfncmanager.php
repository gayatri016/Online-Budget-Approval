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
    $("#view").click(function(){
               $("#viewdept").show();
               $("#viewmanagers").hide();
               $("#viewemployees").hide();
      });
    $("#manager").click(function(){
               $("#viewdept").hide();
               $("#viewmanagers").show();
               $("#viewemployees").hide();
      });
    $("#employee").click(function(){
               $("#viewdept").hide();
               $("#viewmanagers").hide();
               $("#viewemployees").show();
      });
});
</script>

</head>
<?php /*include "header.php";*/ ?>
<?php include "fncmanagermenu.php"; ?>
<?php include "connection.php"; ?>
<body>

<div class="container-fluid">
<div class="row">        
<div class="col-xs-12 col-sm-12">


<br><br><br><br><br><br><br><br>
<div class="row">
<div class="col-xs-12 col-sm-12 form-group">
   <center>Please select : &nbsp;&nbsp;&nbsp;
<label class="radio-inline"><input type="radio" id="view" name="optradio"><strong class="text-danger">View Department</strong></label>
<label class="radio-inline"><input type="radio" id="manager" name="optradio"><strong class="text-danger">View Managers</strong></label>
<label class="radio-inline"><input type="radio" id="employee" name="optradio"><strong class="text-danger">View Employees</strong></label>
   </center> 
      </div>
    </div>

<div id="viewdept">
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
          <th><input type="text" class="form-control" placeholder="View" disabled></th>
          
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


<div id="viewmanagers" style="display:none">
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
          <th><input type="text" class="form-control" placeholder="Name" disabled></th>
          <th><input type="text" class="form-control" placeholder="Email" disabled></th>
          <th><input type="text" class="form-control" placeholder="Mobile" disabled></th>
          <th><input type="text" class="form-control" placeholder="Department" disabled></th>
          <th><input type="text" class="form-control" placeholder="View" disabled></th>

          </tr>
          </thead>
          
          <tbody>
          <?php
     include "connection.php";

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT r.*, d.deptname, d.deptlocation FROM register r, assignmanagers a, department d WHERE r.emailid=a.mailid AND a.deptid=d.id AND r.role='manager' ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){
$dob = $row['dob'];
$dobb = date("d-M-Y", strtotime($dob));

                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['fullname'] . "</td>";
                    echo "<td>" . $row['emailid'] . "</td>";
                    echo "<td>" . $row['mobile'] . "</td>";
                    echo "<td>" . $row['deptname'] . " - " . $row['deptlocation'] . "</td>";
?>
<td>
   <button type="button" class="viewmodal1 btn btn-warning btn-sm" data-toggle="modal">View</button>
</td>

<td style="display:none"><?php
 echo '<img src="Images/'.$row['image'].'" height="50px"; width="100px">';
 ?></td>
<?php
                    
                    echo "<td style='display:none'>" . $row['gender' ] . "</td>";
                    echo "<td style='display:none'>" . $dobb . "</td>";

echo "<td style='display:none'>" . $row['address' ] . ",&nbsp;" . $row['city' ] . ",<br>" . $row['state' ] .",&nbsp;" . $row['country' ] . ",<br>" . $row['postal' ] .   "</td>";
                    echo "<td style='display:none'>" . $row['role' ] . "</td>";
                    

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



<div id="viewemployees" style="display:none">
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
          <th><input type="text" class="form-control" placeholder="Name" disabled></th>
          <th><input type="text" class="form-control" placeholder="Email" disabled></th>
          <th><input type="text" class="form-control" placeholder="Mobile" disabled></th>
          <th><input type="text" class="form-control" placeholder="Department" disabled></th>
          <th><input type="text" class="form-control" placeholder="View" disabled></th>

          </tr>
          </thead>
          
          <tbody>
          <?php
     include "connection.php";

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT r.*, d.deptname, d.deptlocation FROM register r, assignmanagers a, department d WHERE r.emailid=a.mailid AND a.deptid=d.id AND r.role='employee' ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){
$dob = $row['dob'];
$dobb = date("d-M-Y", strtotime($dob));

                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['fullname'] . "</td>";
                    echo "<td>" . $row['emailid'] . "</td>";
                    echo "<td>" . $row['mobile'] . "</td>";
                    echo "<td>" . $row['deptname'] . " - " . $row['deptlocation'] . "</td>";
?>
<td>
   <button type="button" class="viewmodal1 btn btn-warning btn-sm" data-toggle="modal">View</button>
</td>

<td style="display:none"><?php
 echo '<img src="Images/'.$row['image'].'" height="50px"; width="100px">';
 ?></td>
<?php
                    
                    echo "<td style='display:none'>" . $row['gender' ] . "</td>";
                    echo "<td style='display:none'>" . $dobb . "</td>";

echo "<td style='display:none'>" . $row['address' ] . ",&nbsp;" . $row['city' ] . ",<br>" . $row['state' ] .",&nbsp;" . $row['country' ] . ",<br>" . $row['postal' ] .   "</td>";
                    echo "<td style='display:none'>" . $row['role' ] . "</td>";
                    

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


<div id="myModal1" class="modal fade" role="dialog">
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
                        <div class="col-xs-4 text-info"><strong>Department:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="dept" name="dept" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Full Name:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="name" name="fullname" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Gender:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="gndr" name="gender" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Email Id:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="eid" name="emailid" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Mobile:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="mbl" name="mobile" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>DOB:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="db" name="dob" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Address:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="addr" name="address" value=""></span></div>
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


<script type="text/javascript">

$('.viewmodal1').click(function () {
    $('#id').text($(this).closest("tr").find('td:eq(0)').text());
    $('#name').text($(this).closest("tr").find('td:eq(1)').text());
    $('#eid').text($(this).closest("tr").find('td:eq(2)').text());
    $('#mbl').text($(this).closest("tr").find('td:eq(3)').text());
    $('#dept').text($(this).closest("tr").find('td:eq(4)').text());
    $('#gndr').text($(this).closest("tr").find('td:eq(7)').text());
    $('#db').text($(this).closest("tr").find('td:eq(8)').text());
    $('#addr').text($(this).closest("tr").find('td:eq(9)').text());
    $('#rl').text($(this).closest("tr").find('td:eq(10)').text());
    
    $('#myModal1').modal('show');

});
</script>