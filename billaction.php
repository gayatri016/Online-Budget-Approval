
<?php
session_start();
     
include('connection.php');

$empmailid=$_POST['empmailid'];
$billid=$_POST['billid'];
$amount=$_POST['amount'];
$expensedate=$_POST['expensedate'];
$bankname=$_POST['bankname'];
$accountnumber=$_POST['accountnumber'];
$bankaddress=$_POST['bankaddress'];
$paymenttype=$_POST['paymenttype'];
$billdesc=$_POST['billdesc'];

$name=$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'],"Bills/$name");


date_default_timezone_set("Asia/Kolkata");
$billdate= date("Y-m-d") . ' ' . date("H:i:s");

/*$check_email = mysqli_query($db, "SELECT * FROM billrequest WHERE emailid = '$emailid' ");
if(mysqli_num_rows($check_email) > 0){
      header('Location:billrequest.php?error=1'); 
}
else{*/
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
mysqli_query($db, "INSERT INTO billrequest(empmailid, billid, amount, expensedate, billreport, bankname, accountnumber, bankaddress, paymenttype, billdesc, billdate, status) VALUES('$empmailid', '$billid', '$amount', '$expensedate', '$name', '$bankname', '$accountnumber', '$bankaddress', '$paymenttype', '$billdesc', '$billdate', 'Pending')");

/*}*/
   if($mysqli_query_execute->num_rows ===0){
          header('Location:billrequest.php?error=2');
        }
else{ 
          header('Location:billrequest.php?error=3');

        }
/*}*/

?>