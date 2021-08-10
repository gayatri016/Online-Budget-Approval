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


<div id="loginpage2">
<center><h3><strong>Reply to mail</strong></h3></center>
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
<a href="adminmails.php" class="btn btn-info btn-sm"><i class ="fa fa-angle-double-left"></i> &nbsp; Back</a>
<div class="row">
  <div class="col-xs-12 col-sm-3 form-group"></div>           
            <div class="col-xs-12 col-sm-9 form-group">
           
      <!-- --------------Login Account----------- -->
 
<?php $id=$_GET['id']; ?>
<br>

 <div class="log">
<form method="POST" action="adminreplyaction.php" enctype="multipart/form-data" >


 <div class="row">
      <?php     
     include"connection.php";
$sql=mysqli_query($db,"select * from mails where id='$id' ")
?>    
<?php while ($row=mysqli_fetch_array($sql)) { ?>
<div class="col-xs-12 col-sm-8 form-group">
<input type="hidden" class="form-control" id="mid" placeholder="Id:" name="mid" value="<?php echo $id;?>" readonly>  
<input type="hidden" class="form-control" id="from" placeholder="From:" name="from" value="<?php echo $row['toid'];?>" readonly>
<input type="hidden" class="form-control" id="senddate" placeholder="Send Date:" name="senddate" value="<?php echo $row['senddate'];?>" readonly>           
          </div>  
    </div>
 <div class="row">
    <div class="col-xs-12 col-sm-8 form-group">
     
    <input type="text" class="form-control" id="to" placeholder="To:" name="to" value="<?php echo $row['fromid'];?>" readonly>
    </div>
      
 </div>

<div class="row">
<div class="col-xs-12 col-sm-8 form-group">
       <textarea class="form-control" rows="4" id="message" name="message" placeholder="Type your message." 
       readonly><?php echo $row['message'] ?></textarea> 
        </div> 
    </div>
<?php } ?>
<div class="row">
<div class="col-xs-12 col-sm-8 form-group">
              <textarea class="form-control" rows="4" id="replymsg" name="replymsg"
              placeholder="Type your reply message." required></textarea> 
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




</div>
</div> 
</div>

<?php include "footer.php"; ?>

</body>
</html>
    







