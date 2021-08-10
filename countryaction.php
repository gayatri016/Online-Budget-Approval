
<?php
session_start();
     
include('connection.php');

$countryname=$_POST['countryname'];


$check_country = mysqli_query($db, "SELECT * FROM country WHERE countryname = '$countryname' ");
if(mysqli_num_rows($check_country) > 0){
      header('Location:country.php?error=1'); 
}
else{
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
   mysqli_query($db, "INSERT INTO country(countryname) VALUES('$countryname' )");
/*}*/
   if($mysqli_query_execute->num_rows ===0){
          header('Location:country.php?error=2');
        }
else{ 
          header('Location:country.php?error=3');

         }
}

?>