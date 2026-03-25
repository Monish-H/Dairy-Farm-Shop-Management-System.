<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
// Add company Code
if(isset($_POST['update']))
{
 $adminid=$_SESSION['aid'];   
//Getting Post Values
$adminname=$_POST['adminname'];  
$emailid=$_POST['emailid'];  
$mobileno=$_POST['mobilenumber'];   
$query=mysqli_query($con,"update tbladmin set AdminName='$adminname',MobileNumber='$mobileno',Email='$emailid' where id='$adminid'"); 
if($query){
echo "<script>alert('Admin details updated successfully.');</script>";   
echo "<script>window.location.href='profile.php'</script>";
} 
}

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Admin profile</title>
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
    <style>

       
       /* Light background for sidebar */
       .hk-nav {
           background-color: lightgoldenrodyellow !important; /* very light blue-gray */
       }
       /* Uppercase letters for sidebar navigation */
       .hk-nav-menu ul li a {
           text-transform: uppercase;
       }
   
   
       /* Light background for form/table area */
       .hk-sec-wrapper {
           background-color: lightskyblue !important; /* light off-white */
           border-radius: 10px;
           padding: 25px;
           box-shadow: 0 2px 8px rgba(0,0,0,0.05);
           border-top: 2px solid lightskyblue !important; /* Explicitly set top border */
           border-right: 2px solid lightskyblue !important; /* Explicitly set right border */
           border-bottom: 2px solid lightskyblue !important; /* Explicitly set bottom border */
           border-left: 2px solid lightskyblue !important; /* Explicitly set left border */
       }
   
       .table-container {
           background-color:lightcyan; /* very light blue */
           padding: 20px;
           border-radius: 8px;
       }
       .hk-wrapper {
               background-color:cyan;
               min-height: 100vh;
               padding: 20px;
           }
   
       /* Custom border and background color for table */
       table {
           width: 100%;
           border-collapse: collapse;
           border: 2px solid lightpink;
       }
   
       table th, table td {
           border: 1px solid lightpink;
           padding: 10px;
           text-align: left;
       }
   
       table th {
           background-color: #e6f1ff;
           color: lightskyblue;
       }
   
       table td {
           background-color: #f7faff;
       }
   </style>

</head>

<body>
    
    
	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-vertical-nav">

<!-- Top Navbar -->
<?php include_once('includes/navbar.php');
include_once('includes/sidebar.php');
?>
       


        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->



        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
<li class="breadcrumb-item"><a href="#">PROFILE</a></li>
<li class="breadcrumb-item active" aria-current="page">ADMIN</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span>UPDATE ADMIN PROFILE</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
<section class="hk-sec-wrapper">

<div class="row">
<div class="col-sm">
<form class="needs-validation" method="post" novalidate>
<?php 
//Getting admin name
$adminid=$_SESSION['aid'];
$query=mysqli_query($con,"select * from tbladmin where id='$adminid'");
while($row=mysqli_fetch_array($query)){
?>   

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03" style="color:red;"> REG. DATE</label>
<?php echo $row['AdminRegdate'];?>
</div>
</div>
<?php if($row['UpdationDate']!=""){?>
<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03" style="color:red;"> LAST  UPDATION DATE Updation </label>
<?php echo $row['UpdationDate'];?>
</div>
</div>
<?php } ?>
<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03" style="color:red;"> NAME</label>
<input type="text" class="form-control" id="validationCustom03" value="<?php echo $row['AdminName'];?>" name="adminname" required>
<div class="invalid-feedback">Please provide a valid  name.</div>
</div>
</div>

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03" style="color:red;"> USERNAME</label>
<input type="text" class="form-control" id="validationCustom03" value="<?php echo $row['UserName'];?>" name="username" readonly>
</div>
</div>

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03" style="color:red;">EMAIL ID</label>
<input type="text" class="form-control" id="validationCustom03" value="<?php echo $row['Email'];?>" name="emailid" required>
<div class="invalid-feedback">Please provide a valid  Email id.</div>
</div>
</div>

<div class="form-row">
<div class="col-md-6 mb-10">
<label for="validationCustom03" style="color:red;"> MOBILE NUMBER</label>
<input type="text" class="form-control" id="validationCustom03" value="<?php echo $row['MobileNumber'];?>" name="mobilenumber" required>
<div class="invalid-feedback">Please provide a valid  mobile number.</div>
</div>
</div>



<?php } ?>
                                 
<button class="btn btn-primary" type="submit" name="update" style="color:red;">UPDATE</button>
</form>
</div>
</div>
</section>
                     
</div>
</div>
</div>


            <!-- Footer -->
<?php include_once('includes/footer.php');?>
            <!-- /Footer -->

        </div>
        <!-- /Main Content -->

    </div>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
    <script src="dist/js/jquery.slimscroll.js"></script>
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>
    <script src="dist/js/init.js"></script>
    <script src="dist/js/validation-data.js"></script>

</body>
</html>
<?php } ?>