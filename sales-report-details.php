<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
// Code for deletion   
if(isset($_GET['del'])){    
$cmpid=substr(base64_decode($_GET['del']),0,-5);
$query=mysqli_query($con,"delete from tblcategory where id='$cmpid'");
echo "<script>alert('Category record deleted.');</script>";   
echo "<script>window.location.href='manage-categories.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Manage Invoices</title>
    <!-- Data Table CSS -->
    <link href="vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css"><style>
       
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
<li class="breadcrumb-item"><a href="#">Reports</a></li>
<li class="breadcrumb-item active" aria-current="page">SALES REPORT DETAILES</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">

                <!-- Title -->
<div class="hk-pg-header">
 <h4 class="hk-pg-title"><span class="pg-title-icon">
<?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
?>

    <span class="feather-icon"><i data-feather="database"></i></span></span>Sales report from <?php echo $fdate?> to <?php echo $tdate?></h4>
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
                                                    <th style="color: red;">#</th>
                                                    <th style="color: red;">MONTH / YEAR</th>
                                                    <th style="color: red;">SALE AMOUNT</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$rno=mt_rand(10000,99999); 
$query=mysqli_query($con,"select month(tblorders.InvoiceGenDate) as mnth,year(tblorders.InvoiceGenDate) as yearr,sum(tblorders.Quantity*tblproducts.ProductPrice) as tt  from tblorders join tblproducts on tblproducts.id=tblorders.ProductId  where date(tblorders.InvoiceGenDate) between '$fdate' and '$tdate' group by mnth,yearr");
$cnt=1;
while($row=mysqli_fetch_array($query))
{    
?>                                                
<tr>
<td><?php echo $cnt;?></td>
<td><?php echo $row['mnth']."/".$row['yearr'];?></td>
<td><?php echo $row['tt'];?></td>

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