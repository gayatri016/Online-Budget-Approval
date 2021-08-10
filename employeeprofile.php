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
$('#dob').datepicker({
            /*format: "dd/mm/yyyy",*/
          dateFormat: 'dd-M-yy',
        }); 
});
</script>
<script type="text/javascript">
function fun1(val)
{
//alert("val");
obj=new XMLHttpRequest();


 var emailid = document.getElementById("emailid").value;

 console.log("id--"+val+"- emailid----"+emailid);
/*obj.open("post","addassigntask.php?ids="+val,true)*/
obj.open("post","country3.php?id="+val+"&emailid="+emailid,true)
obj.send()
      obj.onreadystatechange=fun2
      
      }
      function fun2()
{
if(obj.readyState==4)
{
//alert("obj.responseText")
document.getElementById('state').innerHTML=(obj.responseText)
}
}
</script>
</head>
<?php /*include "header.php"*/ ?>
<?php include "employeemenu.php" ?>   
<?php include "connection.php" ?>          
<body>

<div class="container-fluid">
<div class="row">
<div class="col-xs-12 col-sm-12">


<br><br><br><br><br><br><br><br>


<center>
<h4>Change <strong style="color:red"><?php echo $email; ?></strong> Details</h4>
<?php
            if(isset($_GET['error'])==true){
                if($_GET['error']==2){
                    
                echo " <b style='color:red'>*&nbsp; Your details not updated. </b>";       

                }
                elseif($_GET['error']==1){
                    
                echo " <b style='color:#3333ff'>*&nbsp; Your details updated successfully. </b>";       

                }
            }
            ?>
</center>
<br>
<div class="row">
  <div class="col-xs-12 col-sm-2 form-group"></div>           
            <div class="col-xs-12 col-sm-10 form-group">


<?php
    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT c.id, s.id, r.id, r.fullname, r.gender, r.emailid, r.password, r.mobile, r.image, r.dob, r.address, r.city, r.postal, r.regdate, c.countryname, s.statename FROM country c, state s, register r WHERE r.country=c.id AND r.state=s.id AND r.emailid='$email' ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){
?>

<div class=""> 
<form method="post" action="employeeprofileaction.php" enctype="multipart/form-data">

<div class="row">
<div class="col-xs-12 col-sm-5 form-group">
      
   <input type="hidden" class="form-control" id="id" placeholder="Id" name="id" value='<?php echo $row['id'] ?>' readonly>
      </div>
</div>

<div class="row">
      <div class="col-xs-12 col-sm-5 form-group">
          <label>Fullname:</label>
        <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-user"></i></span>
      <input type="text" class="form-control" id="fullname" placeholder="Full Name" name="fullname" value='<?php echo $row['fullname'] ?>' readonly>
          </div>
      </div>
<div class="col-xs-12 col-sm-5 form-group">
  <label>Gender:</label>
    <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-user"></i></span>        
              <select class="form-control" id="gender" name="gender" readonly>
                <option value='<?php echo $row['gender'] ?>'><?php echo $row['gender'] ?></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
       </div>
    </div> 
  </div>

  <div class="row"> 
      <div class="col-xs-12 col-sm-5 form-group">
        <label>Email:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-envelope"></i></span>
      <input type="email" class="form-control" id="emailid" placeholder="Email Id" name="emailid" value='<?php echo $row['emailid'] ?>' readonly>
            </div>
    </div>  
           <div class="col-xs-12 col-sm-5 form-group">
            <label>Password:</label>
          <div class="input-group">
            <span class="input-group-addon"><i class ="fa fa-unlock"></i></span>
          <input type="text" class="form-control" id="password" placeholder="Password" name="password" value='<?php echo $row['password'] ?>' required>
                 </div>
         </div> 
        </div>

  <div class="row">
     <div class="col-xs-12 col-sm-5 form-group">
      <label>Mobile:</label>
        <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-phone"></i></span>
      <input type="text" class="form-control" id="mobile" placeholder="Contact Number" name="mobile" required maxlength="10" title="The contact number must enter 10 digits number" value='<?php echo $row['mobile'] ?>' oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
      </div>
  </div>

<div class="col-xs-12 col-sm-5 form-group">
  <label>DOB:</label>
    <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-calendar"></i></span>
    <input type="date" class="form-control " data-date-format="dd-mm-yyyy" id="dobb" placeholder="Date of Joining" name="dob" value='<?php echo $row['dob'] ?>' required>
          </div>
    </div>            
       </div>       
      <div class="row">
          <div class="col-xs-12 col-sm-5 form-group">
            <label>Address:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
      <input type="text" class="form-control" id="address" placeholder="Address" name="address" value='<?php echo $row['address'] ?>' required>
      </div>
    </div> 
<div class="col-xs-12 col-sm-5 form-group">
  <label>Towm / City:</label>
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
      <input type="text" class="form-control" id="city" placeholder="Town / City" name="city" value='<?php echo $row['city'] ?>' required>
    </div>
   </div>
             
    </div>
   <div class="row">
    <?php     
$sql2=mysqli_query($db,"SELECT * FROM country ")
?>
     <div class="col-xs-12 col-sm-5 form-group">
      <label>Country:</label>
        <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>        
          <select class="form-control" id="country" name="country" onChange="fun1(this.value)" required>
            <option value='<?php echo $row[0] ?>'><?php echo $row['countryname'] ?></option>
            <option value="">Please Select Country</option> 
                 <?php while ($row2=mysqli_fetch_array($sql2)) { ?>
  <option value=<?php echo $row2['id'];?>><?php echo $row2['countryname']; ?></option>
<?php } ?>
          </select>
        </div>
     </div> 
<div class="col-xs-12 col-sm-5 form-group">
  <label>State:</label>
    <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>         
<select class="form-control" id="state" name="state" required>
 <option value=""> Please Select State </option>   
</select>
    </div>
</div> 
    </div>
    
<div class="row">
  <div class="col-xs-12 col-sm-5 form-group">
    <label>Postal:</label>
    <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
  <input type="text" class="form-control" id="postal" placeholder="Postal Code" name="postal" value='<?php echo $row['postal'] ?>' required maxlength="6" title="The postal number must enter 6 digits number"
  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
            </div>
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
    




