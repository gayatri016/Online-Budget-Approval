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
$('#dob').datepicker({
            /*format: "dd/mm/yyyy",*/
          dateFormat: 'dd-M-yy',
        }); 
});
</script>


<script type="text/javascript">

/*$(document).ready(function(){
  
  $("#confirmpassword").change(function(){
  
    if($("#newpassword").val()==$("#confirmpassword").val()){
      $("#error").hide();
      
    }
    else{
      $("#error").html("<strong>New and Confirm Password should be same.</strong>");
      $("#error").show();
    }
});
});*/

</script>

</head>
       
<body>

<div class="container-fluid">
<div class="row">
<div class="col-xs-12 col-sm-12">

<?php include "adminmenu.php" ?>   
<?php include "connection.php" ?>   


<br><br><br><br><br><br><br><br>


<center>
<h4>Change <strong style="color:red"><?php echo $email ?></strong> Details</h4>
<?php
            if(isset($_GET['error'])==true){
                if($_GET['error']==1){
                    
                echo " <b style='color:red'>*&nbsp; New password and confirm password should be same. </b>";       

                }
                elseif($_GET['error']==2){
                    
                echo " <b style='color:#3333ff'>*&nbsp; Your password updated successfully. </b>";       

                }
                elseif($_GET['error']==3){
                    
                echo " <b style='color:red'>*&nbsp; Your password updated not successfully. </b>";       

                }
            }
            ?>
</center>
<br>
<div class="row">
  <div class="col-xs-12 col-sm-4 form-group"></div>           
            <div class="col-xs-12 col-sm-8 form-group">


<?php
    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT * FROM register WHERE emailid='$email' ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){
?>

<div class=""> 
<form method="post" action="adminpassword1.php" enctype="multipart/form-data">

 <p id="error" class="text-danger"></p>
 <div class="row">
  <div class="col-xs-12 col-sm-6 form-group">
      <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-envelope"></i></span>
      <input type="email" class="form-control" id="emailid" placeholder="Email Id" name="emailid" value='<?php echo $email ?>' readonly>
            </div>
    </div> 
   </div>   
       <div class="row">
                 <div class="col-xs-12 col-sm-6 form-group">
                 <div class="input-group">
                  <span class="input-group-addon"><small><i class ="fa fa-asterisk"></i></small></span>
              <input type="password" class="form-control" id="newpassword" placeholder="New Password" name="newpassword" required>
               </div>
            </div>
           </div>
             
       <div class="row">
                 <div class="col-xs-12 col-sm-6 form-group">
                 <div class="input-group">
                  <span class="input-group-addon"><small><i class ="fa fa-asterisk"></i></small></span>
              <input type="password" class="form-control" id="confirmpassword" placeholder="Confirm Password" name="confirmpassword" required>
               </div>
            </div>
          </div>       
      <div class="row btngrp">
            <div class="col-xs-12 col-sm-6 form-group">
        <button type="submit" class="btn btn-success btn-sm pull-right">Change Password</button>
            </div>
          </div>         
               
</form>
</div>

<?php
              
            }

            mysqli_free_result($result);
        } else{
            echo "<center>No records available.</center>";
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
    




