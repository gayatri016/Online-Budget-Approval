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

</head>
<?php /*include "header.php";*/ ?>
<?php include "adminmenu.php"; ?>
<?php include "connection.php"; ?>
<body>

<div class="container-fluid">
<div class="row">        
<div class="col-xs-12 col-sm-12">

<br><br><br><br><br><br><br><br>


<div id="viewbill" >
  <div id="row">
      <div class="table-responsive">
        <div class="panel panel-primary filterable">
                <div class="panel-heading"><center><h3 class="panel-title">Bill Details</h3></center>
                 <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><strong><span class="glyphicon glyphicon-filter"></span> Filter</strong></button>
                </div>
                </div>
                <div class="panel-body filtertable">
               
          <table class="table table-striped table-bordered">
          
          <thead>
          <tr class="filters">
          <th>Id</th>
          <th><input type="text" class="form-control" placeholder="Bill" disabled></th>
          <th><input type="text" class="form-control" placeholder="Amount" disabled></th>
          <th><input type="text" class="form-control" placeholder="Expense Date" disabled></th>
          <th><input type="text" class="form-control" placeholder="Status" disabled></th>
          <th><input type="text" class="form-control" placeholder="Report" disabled></th>
          <th><input type="text" class="form-control" placeholder="View" disabled></th>
          
          </tr>
          </thead>
          
          <tbody>
          <?php


    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT q.id, q.empmailid, q.amount, q.expensedate, q.billreport, q.bankname, q.accountnumber, q.bankaddress, q.paymenttype, q.billdesc, q.billdate, q.status, q.managerdate, q.managerdesc, q.managermailid, q.fncmanagermailid, q.fncmanagerdate, q.fncmanagerdesc, d.deptname, d.deptlocation, b.billname, b.billamount, r.fullname FROM billrequest q, bills b, register r, department d, assignmanagers a WHERE q.billid=b.id AND q.empmailid=r.emailid AND q.empmailid=a.mailid AND a.deptid=d.id ORDER BY q.expensedate DESC ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['billname'] . "</td>";
                    echo "<td>" . $row['amount'] . "</td>";
                    echo "<td>" . $row['expensedate'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
?>
<td>
<a href="Bills/<?php echo $row['billreport'] ?>" class="btn btn-info btn-sm"><i class ="fa fa-download"></i> Download</a>
</td>
<td>
<button type="button" class="viewmodal btn btn-warning btn-sm" data-toggle="modal"><i class ="fa fa-eye"></i> View</button>
</td>
<?php


                 echo "<td style='display:none'>" . $row['bankname'] ." - ". $row['accountnumber'] . " - " . $row['bankaddress'] . "</td>";
                 echo "<td style='display:none'>" . $row['paymenttype'] . "</td>";
                 echo "<td style='display:none'>" . $managername ." - " . $row['managermailid'] . "</td>";
                 echo "<td style='display:none'>" . $row['managerdate'] . "</td>";
                 echo "<td style='display:none'>" . $fncmanagername ." - " . $row['fncmanagermailid'] . "</td>";
                 echo "<td style='display:none'>" . $row['fncmanagerdate'] . "</td>";
                 echo "<td style='display:none'>" . $row['billdesc'] . "</td>";
                 echo "<td style='display:none'>" . $row['managerdesc'] . "</td>";
                 echo "<td style='display:none'>" . $row['fncmanagerdesc'] . "</td>";
                 echo "<td style='display:none'>" . $row['fullname'] ."( ". $row['empmailid'] . " )" . "</td>";
                 echo "<td style='display:none'>" . $row['deptname']."( ". $row['deptlocation'] . " )"  . "</td>";
                 echo "<td style='display:none'>" . $row['billamount'] . "</td>";


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
                        <div class="col-xs-4 text-info"><strong>Employee Name:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="en"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Bill Name:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="bn"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Amount:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="amt"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Bill Max - Amount:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="bmamt"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Expense Date:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="ed"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Status:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="sts"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Department:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="dpt"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Banck Details:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="bd"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Payment Type:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="pt"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Bill Decription:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="bdesc"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Manager:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="mn"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Manager Accept Date:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="mad"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Manager Description:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="mdesc"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Finance Manager:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="fm"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Finance Manager Accept Date:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="fmad"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Finance Manager Description:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="fmdesc"></span></div>
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
    $('#bn').text($(this).closest("tr").find('td:eq(1)').text());
    $('#amt').text($(this).closest("tr").find('td:eq(2)').text());
    $('#ed').text($(this).closest("tr").find('td:eq(3)').text());
    $('#sts').text($(this).closest("tr").find('td:eq(4)').text());
    $('#bd').text($(this).closest("tr").find('td:eq(7)').text());
    $('#pt').text($(this).closest("tr").find('td:eq(8)').text());
    $('#mn').text($(this).closest("tr").find('td:eq(9)').text());
    $('#mad').text($(this).closest("tr").find('td:eq(10)').text());
    $('#fm').text($(this).closest("tr").find('td:eq(11)').text());
    $('#fmad').text($(this).closest("tr").find('td:eq(12)').text());
    $('#bdesc').text($(this).closest("tr").find('td:eq(13)').text());
    $('#mdesc').text($(this).closest("tr").find('td:eq(14)').text());
    $('#fmdesc').text($(this).closest("tr").find('td:eq(15)').text());
    $('#en').text($(this).closest("tr").find('td:eq(16)').text());
    $('#dpt').text($(this).closest("tr").find('td:eq(17)').text());
    $('#bmamt').text($(this).closest("tr").find('td:eq(18)').text());

    $('#myModal').modal('show');

});
</script>