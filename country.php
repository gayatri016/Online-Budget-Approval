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
$('#date').datepicker({
            /*format: "dd/mm/yyyy",*/
          dateFormat: 'dd-M-yy',
        }); 
});
</script> 
<script>
$(document).ready(function(){
    $("#add").click(function(){
               $("#addcountry").show();
               $("#viewcountry").hide();
               $("#viewstate").hide();
      });
    $("#view").click(function(){
               $("#addcountry").hide();
               $("#viewcountry").show();
               $("#viewstate").hide();
      });
    $("#views").click(function(){
               $("#addcountry").hide();
               $("#viewcountry").hide();
               $("#viewstate").show();
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
<label class="radio-inline"><input type="radio" id="add" name="optradio"><strong class="text-info">Add Country & State</strong></label>
<label class="radio-inline"><input type="radio" id="view" name="optradio"><strong class="text-danger">View Countries</strong></label>
<label class="radio-inline"><input type="radio" id="views" name="optradio"><strong class="text-warning">View States</strong></label>

   </center> 
      </div>
    </div>
 <div id="addcountry">
<center><h3><strong>Country</strong></h3>
<?php
            if(isset($_GET['error'])==true){
                if($_GET['error']==1){ 
                echo "<b style='color:red'>*&nbsp; Country alreary exist. </b>";       
                }
                elseif($_GET['error']==2){
                echo "<b style='color:red'>*&nbsp; Country is not successfully added . </b>";
                }
                elseif($_GET['error']==3){  
                echo "<b style='color:#3333ff'>*&nbsp; Country is successfully added. </b>";       
                }
            }
            ?>
</center>            
<div class="row">
  <div class="col-xs-12 col-sm-2"></div>
  <div class="col-xs-12 col-sm-10">
<br><br>         
<form method="POST" action="countryaction.php" enctype="multipart/form-data" >

<div class="row">
      <div class="col-xs-12 col-sm-8 form-group">
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-globe"></i></span>
      <input type="text" class="form-control" id="countryname" placeholder="Country" name="countryname" required>
      </div>
    </div>
<!-- </div>      
<div class="row btngrp"> -->
  <div class="col-xs-12 col-sm-2">
      <button type="submit" class="btn btn-success btn-md pull-left" id="submitbtn"><span>Submit</span></button>
  </div>
</div>                

</form>  
</div>
</div>

<br><br>
         
<div class="row">
<center><h3><strong>State</strong></h3>

<?php
            if(isset($_GET['error'])==true){
                if($_GET['error']==4){ 
                echo "<b style='color:red'>*&nbsp; State alreary exist. </b>";       
                }
                elseif($_GET['error']==5){
                echo "<b style='color:red'>*&nbsp; State is not successfully added . </b>";
                }
                elseif($_GET['error']==6){  
                echo "<b style='color:#3333ff'>*&nbsp; State is successfully added. </b>";       
                }
            }
            ?>
</center>
  <div class="col-xs-12 col-sm-2"></div>
  <div class="col-xs-12 col-sm-10">
<br><br>         
<form method="POST" action="stateaction.php" enctype="multipart/form-data" >

<div class="row">
<?php     
$sql=mysqli_query($db,"SELECT * FROM country ")
?>
  <div class="col-xs-12 col-sm-5 form-group">
     <div class="input-group">
     <span class="input-group-addon"><i class ="fa fa-globe"></i></span>
   <select class="form-control" id="countryid" name="countryid" required>
  <option value="">Please Select Country</option> 
     <?php while ($row=mysqli_fetch_array($sql)) { ?>
  <option value=<?php echo $row['id'];?>><?php echo $row['countryname']; ?></option>
<?php } ?>
   </select>    
    </div>
  </div>

  <div class="col-xs-12 col-sm-5 form-group">
    <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-globe"></i></span>
      <input type="text" class="form-control"  id="statename" placeholder="State Name" name="statename" required>
      </div>
    </div>
<!-- </div>       
<div class="row btngrp"> -->
  <div class="col-xs-12 col-sm-10">
      <button type="submit" class="btn btn-success btn-md pull-right" id="submitbtn"><span>Submit</span></button>
  </div>
</div>                

</form>  
</div>
</div>

</div>
  
 <div id="viewcountry" style="display:none">

  <div id="row">
        
        <div class="table-responsive">

        <div class="panel panel-primary filterable">
                <div class="panel-heading"><center><h3 class="panel-title">Country Details</h3></center>
                 <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><strong><span class="glyphicon glyphicon-filter"></span> Filter</strong></button>
                </div>
                </div>
                <div class="panel-body filtertable">
               
          <table class="table table-striped table-bordered">
          
          <thead>
          <tr class="filters">
          <th>Id</th>
          <th><input type="text" class="form-control" placeholder="Country" disabled></th>
          
          </tr>
          </thead>
          
          <tbody>
          <?php
     include "connection.php";

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT * FROM country ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){


                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['countryname'] . "</td>";

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


 <div id="viewstate" style="display:none">

  <div id="row">
        
        <div class="table-responsive">

        <div class="panel panel-primary filterable">
                <div class="panel-heading"><center><h3 class="panel-title">State Details</h3></center>
                 <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><strong><span class="glyphicon glyphicon-filter"></span> Filter</strong></button>
                </div>
                </div>
                <div class="panel-body filtertable">
               
          <table class="table table-striped table-bordered">
          
          <thead>
          <tr class="filters">
          <th>Id</th>
          <th><input type="text" class="form-control" placeholder="Country" disabled></th>
          <th><input type="text" class="form-control" placeholder="State" disabled></th>
          
          </tr>
          </thead>
          
          <tbody>
          <?php
     include "connection.php";

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT s.id, c.countryname, s.statename FROM country c, state s WHERE s.countryid=c.id ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){


                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['countryname'] . "</td>";
                    echo "<td>" . $row['statename'] . "</td>";

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


</div>
</div>
</div>
<?php include "footer.php"; ?>
</body>
</html>
