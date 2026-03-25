<?php
session_start();
include('includes/config.php');

if (!isset($_SESSION['aid']) || strlen($_SESSION['aid']) == 0) {
    header('location:logout.php');
    exit();
} else {  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Dashboard</title>

    <!-- CSS Libraries -->
    <link href="vendors/vectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet">
    <link href="vendors/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet">
    <link href="dist/css/style.css" rel="stylesheet">

    <!-- Custom Dashboard Colors -->
    <style>
        /* Set a background image for the entire page */
        body {
            background-image: url('images/your-background-image.jpg'); /* Replace with your image path */
            background-size: cover; /* Make sure the image covers the entire page */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Don't repeat the image */
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .hk-nav-menu ul li a {
        text-transform: uppercase;
        }

        /* Ensure Sidebar has a color */
        .hk-wrapper .hk-vertical-nav {
            background-color: #3f51b5 !important; /* Indigo color */
        }
        
        /* Additional styles for sidebar content (optional) */
        .hk-vertical-nav .nav-item {
            background-color: #3f51b5 !important; /* Indigo color for sidebar items */
            color: #fff !important; /* White text for the items */
        }

        /* Hover effect for sidebar items */
        .hk-vertical-nav .nav-item:hover {
            background-color: #303f9f !important; /* Darker indigo when hovering */
        }

        /* Styling the active nav item */
        .hk-vertical-nav .nav-item.active {
            background-color: #1a237e !important; /* Even darker indigo for active item */
        }

        /* Optionally, if you want to style the links inside nav items */
        .hk-vertical-nav .nav-link {
            color: #fff !important; /* White text for the links */
        }

        /* Customize icon colors in the sidebar */
        .hk-vertical-nav .nav-icon {
            color: #fff !important; /* White text for the links */
        }

        /* Dashboard card background color styles */
        .bg-blue { background-color: #2196f3; }
        .bg-green { background-color: #4caf50; }
        .bg-orange { background-color: #ff9800; }
        .bg-purple { background-color: #9c27b0; }
        .bg-cyan { background-color: #00bcd4; }
        .bg-red { background-color: #f44336; }
        .bg-indigo { background-color: #3f51b5; }
    </style>
</head>

<body>

<!-- HK Wrapper -->
<div class="hk-wrapper hk-vertical-nav">
    <?php include_once('includes/navbar.php'); ?>
    <?php include_once('includes/sidebar.php'); ?>

    <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>

    <!-- Main Content -->
    <div class="hk-pg-wrapper">
        <div class="container-fluid mt-xl-50 mt-sm-30 mt-15">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hk-row">

                        <?php
                        // Categories
                        $query = mysqli_query($con, "SELECT id FROM tblcategory");
                        $listedcat = mysqli_num_rows($query);
                        ?>
                        
                        <div class="col-lg-3 col-md-6">
                            <div class="card card-sm dashboard-card bg-blue">
                                <div class="card-body">
                                    <div class="text-center">
                                        <span class="d-block font-15 font-weight-500 mb-2">CATEGORIES</span>
                                        <span class="display-4 mb-2"><?php echo htmlspecialchars($listedcat); ?></span>
                                        <small>LISTED CATEGORIES</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        // Companies
                        $ret = mysqli_query($con, "SELECT id FROM tblcompany");
                        $listedcomp = mysqli_num_rows($ret);
                        ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="card card-sm dashboard-card bg-green">
                                <div class="card-body">
                                    <div class="text-center">
                                        <span class="d-block font-15 font-weight-500 mb-2">COMPANIES</span>
                                        <span class="display-4 mb-2"><?php echo htmlspecialchars($listedcomp); ?></span>
                                        <small>LISTED COMPANIES</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        // Products
                        $sql = mysqli_query($con, "SELECT id FROM tblproducts");
                        $listedproduct = mysqli_num_rows($sql);
                        ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="card card-sm dashboard-card bg-orange">
                                <div class="card-body">
                                    <div class="text-center">
                                        <span class="d-block font-15 font-weight-500 mb-2">PRODUCTS</span>
                                        <span class="display-4 mb-2"><?php echo htmlspecialchars($listedproduct); ?></span>
                                        <small>LISTED PRODUCTS</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        // Total Sales
                        $query = mysqli_query($con, "SELECT SUM(tblorders.Quantity * tblproducts.ProductPrice) AS tt FROM tblorders JOIN tblproducts ON tblproducts.id = tblorders.ProductId");
                        $row = mysqli_fetch_array($query);
                        ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="card card-sm dashboard-card bg-purple">
                                <div class="card-body">
                                    <div class="text-center">
                                        <span class="d-block font-15 font-weight-500 mb-2">TOTAL SALES</span>
                                        <span class="display-4 mb-2"><?php echo number_format($row['tt'], 2); ?></span>
                                        <small>TOTAL SALES TILL DATE</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        // Last 7 Days Sales
                        $qury = mysqli_query($con, "SELECT SUM(tblorders.Quantity * tblproducts.ProductPrice) AS tt FROM tblorders JOIN tblproducts ON tblproducts.id = tblorders.ProductId WHERE date(tblorders.InvoiceGenDate) >= (CURDATE() - INTERVAL 7 DAY)");
                        $row = mysqli_fetch_array($qury);
                        ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="card card-sm dashboard-card bg-cyan">
                                <div class="card-body">
                                    <div class="text-center">
                                        <span class="d-block font-15 font-weight-500 mb-2">LAST 7 DAYS SALES</span>
                                        <span class="display-4 mb-2"><?php echo number_format($row['tt'], 2); ?></span>
                                        <small>LAST 7 DAYS TOTAL SALES</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        // Yesterday Sales
                        $qurys = mysqli_query($con, "SELECT SUM(tblorders.Quantity * tblproducts.ProductPrice) AS tt FROM tblorders JOIN tblproducts ON tblproducts.id = tblorders.ProductId WHERE date(tblorders.InvoiceGenDate) = CURDATE() - INTERVAL 1 DAY");
                        $rw = mysqli_fetch_array($qurys);
                        ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="card card-sm dashboard-card bg-red">
                                <div class="card-body">
                                    <div class="text-center">
                                        <span class="d-block font-15 font-weight-500 mb-2">YESTERDAY SALES</span>
                                        <span class="display-4 mb-2"><?php echo number_format($rw['tt'], 2); ?></span>
                                        <small>YESTERDAY TOTAL SALES</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        // Today's Sales
                        $quryss = mysqli_query($con, "SELECT SUM(tblorders.Quantity * tblproducts.ProductPrice) AS tt FROM tblorders JOIN tblproducts ON tblproducts.id = tblorders.ProductId WHERE date(tblorders.InvoiceGenDate) = CURDATE()");
                        $rws = mysqli_fetch_array($quryss);
                        ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="card card-sm dashboard-card bg-indigo">
                                <div class="card-body">
                                    <div class="text-center">
                                        <span class="d-block font-15 font-weight-500 mb-2">TODAY's SALES</span>
                                        <span class="display-4 mb-2"><?php echo number_format($rws['tt'], 2); ?></span>
                                        <small>TODAY's TOTAL SALES</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- /hk-row -->
                </div>
            </div>
        </div>
        <?php include_once('includes/footer.php'); ?>
    </div> <!-- /Main Content -->

</div> <!-- /HK Wrapper -->

<!-- JS Libraries -->
<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="dist/js/jquery.slimscroll.js"></script>
<script src="dist/js/dropdown-bootstrap-extended.js"></script>
<script src="dist/js/feather.min.js"></script>
<script src="vendors/jquery-toggles/toggles.min.js"></script>
<script src="dist/js/toggle-data.js"></script>
<script src="vendors/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="vendors/jquery.counterup/jquery.counterup.min.js"></script>
<script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
<script src="vendors/vectormap/jquery-jvectormap-2.0.3.min.js"></script>
<script src="vendors/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="dist/js/vectormap-data.js"></script>
<script src="vendors/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="vendors/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<script src="vendors/apexcharts/dist/apexcharts.min.js"></script>
<script src="dist/js/irregular-data-series.js"></script>
<script src="dist/js/init.js"></script>

</body>
</html>
<?php } ?>