<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Manage Products</title>
    <!-- Data Table CSS -->
    <link href="vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
    <style>
    /* Light blue background for sidebar */
    .hk-nav {
      background-color: lightgoldenrodyellow !important;
    }
    /* Uppercase letters for sidebar navigation */
    .hk-nav-menu ul li a {
      text-transform: uppercase;
    }
    /* Light blue background for form/table area */
    .hk-sec-wrapper {
      background-color: lightskyblue !important;
      border-radius: 10px;
      padding: 25px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      border-top: 2px solid lightskyblue !important;
      border-right: 2px solid lightskyblue !important;
      border-bottom: 2px solid lightskyblue !important;
      border-left: 2px solid lightskyblue !important;
    }
    .table-container {
      background-color: lightcyan;
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
    table th {
      background-color: #e6f1ff;
      color: lightskyblue;
      padding: 10px;
      text-align: left;
    }
    table td {
      padding: 10px;
      text-align: left;
    }

    /* Colors for specific even rows (2, 4, 6, 8, 10) - Matching Manage Companies */
    table tbody tr:nth-child(2) {
      background-color: #f9a825; /* Orange */
      color: #000;
    }
    table tbody tr:nth-child(4) {
      background-color: #90ee90; /* LightGreen */
      color: #000;
    }
    table tbody tr:nth-child(6) {
      background-color: #ffb6c1; /* LightPink */
      color: #000;
    }
    table tbody tr:nth-child(8) {
      background-color: #d3d3d3; /* LightGray */
      color: #000;
    }
    table tbody tr:nth-child(10) {
      background-color: #afeeee; /* PaleTurquoise */
      color: #000;
    }

    /* Style for Action icons with blue boxes */
    .table-wrap table tbody td a {
        color: #fff; /* White text color for visibility */
        background-color: #007bff; /* Blue background for the box */
        padding: 5px;
        border-radius: 3px;
        margin-right: 5px;
        text-decoration: none; /* Remove underline from links */
    }
    .table-wrap table tbody td a:hover {
       background-color: #0056b3; /* Darker blue on hover */
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
<li class="breadcrumb-item"><a href="#">PRODUCTS</a></li>
<li class="breadcrumb-item active" aria-current="page">MANAGE</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">

                <!-- Title -->
<div class="hk-pg-header">
 <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>MANAGE PRODUCTS</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <table id="datable_1" class="table table-hover w-100 display pb-30">
                                            <thead>
                                                <tr>
                                                    <th style="color:red;">#</th>
                                                    <th style="color:red;">CATEGORY</th>
                                                    <th style="color:red;">COMPANY</th>
                                                    <th style="color:red;">PRODUCT</th>
                                                    <th style="color:red;">PRICING</th>
                                                    <th style="color:red;">POSTING DATE</th>
                                                    <th style="color:red;">ACTION</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
$rno=mt_rand(10000,99999);  
$query=mysqli_query($con,"select * from tblproducts");
$cnt=1;
while($row=mysqli_fetch_array($query))
{    
?>                                                
<tr>
<td><?php echo $cnt;?></td>
<td><?php echo $row['CategoryName'];?></td>
<td><?php echo $row['CompanyName'];?></td>
<td><?php echo $row['ProductName'];?></td>
<td><?php echo $row['ProductPrice'];?></td>
<td><?php echo $row['PostingDate'];?></td>
<td>
<a href="edit-product.php?pid=<?php echo base64_encode($row['id'].$rno);?>" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil"></i></a>
</td>
</tr>
<?php 
$cnt++;
} ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
                <!-- /Row -->

            </div>
            <!-- /Container -->

            <!-- Footer -->
<?php include_once('includes/footer.php');?>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->
    </div>
    <!-- /HK Wrapper -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/jquery.slimscroll.js"></script>
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="dist/js/dataTables-data.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>
    <script src="dist/js/init.js"></script>
</body>
</html>
<?php } ?>