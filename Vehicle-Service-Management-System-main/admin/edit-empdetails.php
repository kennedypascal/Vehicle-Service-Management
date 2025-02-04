<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['adid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
  $empname=$_POST['empname'];
     $mobno=$_POST['mobilenumber'];
     $email=$_POST['email'];
     $address=$_POST['empadd'];
     $password=$_POST['password'];
$epid=substr(base64_decode($_GET['empid']),0,-5);

    $query=mysqli_query($con, "update  tblpickup set FullName='$empname', MobileNumber='$mobno',Email= '$email', Address='$address',Password='$password' where ID=$epid"  );
    if ($query) {
    $msg="Employee detail has been update.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }


}
  ?>


<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>VIP Monitoring and Maintainance Service System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

          <?php include_once('includes/sidebar.php');?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                 <?php include_once('includes/header.php');?>

                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Update Employee Details</h4>
                                    <p class="text-muted m-b-30 font-14">

                                    </p>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
   <?php
$epid=substr(base64_decode($_GET['empid']),0,-5);
$ret=mysqli_query($con,"select * from tblpickup where ID='$epid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

                                               <form class="form-horizontal" role="form" method="post" name="submit">

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Employee Name</label>
                                                        <div class="col-10">
                                                            <input type="text" id="empname" name="empname" class="form-control" placeholder="Full Name" required="true" value="<?php echo $row['FullName'];?>" >
                                                        </div>
                                                    </div>

                                                      <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Employee Contact Number</label>
                                                        <div class="col-10">
                                                            <input type="text" id="mobilenumber" name="mobilenumber" class="form-control" maxlength="10" required="true" value="<?php echo $row['MobileNumber'];?>" >
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Employee Email</label>
                                                        <div class="col-10">
                                                            <input type="email" id="email" name="email" class="form-control"  required="true" value="<?php echo $row['Email'];?>" >
                                                        </div>
                                                    </div>


<div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Employee Address</label>
                                                        <div class="col-10">
                                                            <input type="text" id="empadd" name="empadd" class="form-control"  required="true" value="<?php echo $row['Address'];?>" >
                                                        </div>
                                                    </div>

<?php } ?>
<div class="form-group row">
    <label class="col-2 col-form-label" for="example-email">Password</label>
    <div class="col-10">
        <input type="password" id="password" name="password" class="form-control"  required="true">
    </div>
</div>







           <div class="form-group row">

                                                        <div class="col-12">
                                                            <p style="text-align: center;"> <button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Update</button></p>
                                                        </div>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>

                                    </div>
                                    <!-- end row -->

                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->






                        <!-- end row -->





                    </div> <!-- container -->

                </div> <!-- content -->

             <?php include_once('includes/footer.php');?>
            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
<?php }  ?>
