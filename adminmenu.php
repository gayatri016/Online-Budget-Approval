<?php
session_start();
$role=$_SESSION['role'];
$role;
if($role!='admin')
{
  header('Location: login.php');
}
?>
<?php $email=$_SESSION['emailid']; ?>

<?php     
include "connection.php";
$sql=mysqli_query($db,"SELECT * FROM register WHERE emailid='$email' ");
while ($row=mysqli_fetch_array($sql)) { 
  $image=$row['image'];
}
?>

<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">

<center><h1><strong style="color:#ffffff; font-style: oblique; text-shadow: 10px 10px 10px #ff9900;"> &nbsp; &nbsp; &nbsp; ONLINE BUDGET APPROVAL MANAGEMENT SYSTEM</strong></h1></center>
<br> <p style="margin-left:10px; color:#ffffff"><strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php date_default_timezone_set("Asia/Kolkata");
echo date("d F, Y") ;  ?></strong></p>

                  <!--   <a class="nav-btn btn-dark btn-lg accordion-toggle pull-left" title="Follow Us" role="tab" id="social-collapse" data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"></a> -->
                    <a id="menu-toggle" href="#" class="nav-btn btn-dark btn-lg toggle">
                        <?php echo '<img src="Users/'.$image.'" style="border-radius: 50%;" height="30"; width="50">' ?> &nbsp; <i class="fa fa-bars" style="color:#fff;"></i>
                    </a>
                    <a id="to-top" class="btn btn-lg btn-inverse" href="#top" style="background-color:#000000">
                        <span class="sr-only">Toggle to Top Navigation</span>
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <a id="menu-close" href="#" class="btn btn-danger pull-right hidden-md hidden-lg toggle"><i class="fa fa-times"></i></a>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li> 
                <li class="sidebar-brand">
                    <a href="#top"> <strong><?php echo $email ?></strong></a>
                </li>
                <li>
                    <a href="adminhome.php">Home</a>
                </li>
                <li>
                    <a href="country.php">Country & State</a>
                </li>
                <li>
                    <a href="register.php">Users Registration</a>
                </li>
                <li>
                    <a href="department.php">Department</a>
                </li>
                <li>
                    <a href="bills.php">Bills</a>
                </li>
                <li>
                    <a href="assignmanagers.php">Assign Users</a>
                </li>
                <li>
                    <a href="billrequestadmin.php">Bills Request</a>
                </li>
                <li>
                    <a href="adminmails.php">Mails</a>
                </li>
                <li>
                    <a href="adminpassword.php">Password</a>
                </li>
                <li>
                    <a href="logout.php">Sign-out</a>
                </li>

            </ul>
        </nav>

       <!--  <aside id="accordion" class="social text-vertical-center">
            <div class="accordion-social">
                <ul class="panel-collapse collapse in nav nav-stacked" role="tabpanel" aria-labelledby="social-collapse" id="collapseOne">
                    <li><a href="https://www.facebook.com/soldierupdesigns" target="_blank"><i class="fa fa-lg fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/soldierupdesign" target="_blank"><i class="fa fa-lg fa-twitter"></i></a></li>
                    <li><a href="https://www.plus.google.com/+soldierupdesigns" target="_blank"><i class="fa fa-lg fa-google-plus"></i></a></li>
                    <li><a href="https://github.com/blayderunner123" target="_blank"><i class="fa fa-lg fa-github"></i></a></li>
                    <li><a href="https://linkedin.com/in/blayderunner123" target="_blank"><i class="fa fa-lg fa-linkedin"></i></a></li>
                    <li><a href="skype:live:soldierupdesigns?call"><i class="fa fa-lg fa-skype" target="_blank"></i></a></li>
                    <li><a href="http://stackexchange.com/users/4992378/blayderunner123" target="_blank"><i class="fa fa-lg fa-stack-exchange"></i></a></li>
                </ul>
            </div>
        </aside> -->
        
       

            </div>
        </div>
        
        <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
        <script>
            $(document).ready(function(){
                $("[rel='tooltip']").tooltip();
            });
        </script>

