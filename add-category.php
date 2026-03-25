<?php
session_start();
include('includes/config.php');

// Session check
if (!isset($_SESSION['aid']) || $_SESSION['aid'] == 0) {
    header('location:logout.php');
    exit();
}

// Add Category Code
if (isset($_POST['submit'])) {
    $catname = htmlspecialchars(trim($_POST['category']));
    $catcode = htmlspecialchars(trim($_POST['categorycode']));

    $stmt = $con->prepare("INSERT INTO tblcategory(CategoryName, CategoryCode) VALUES (?, ?)");
    $stmt->bind_param("ss", $catname, $catcode);

    if ($stmt->execute()) {
        header("Location: add-category.php?status=success");
        exit();
    } else {
        header("Location: add-category.php?status=error");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Add Category</title>
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
<div class="hk-wrapper hk-vertical-nav">
    <?php include_once('includes/navbar.php'); ?>
    <div class="hk-nav">
        <?php include_once('includes/sidebar.php'); ?>
    </div>

    <div class="hk-pg-wrapper">
        <nav class="hk-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light bg-transparent">
                <li class="breadcrumb-item"><a href="#">CATEGORY</a></li>
                <li class="breadcrumb-item active" aria-current="page">ADD</li>
            </ol>
        </nav>

        <div class="container">
            <div class="hk-pg-header">
                <h4 class="hk-pg-title">
                    <span class="pg-title-icon">
                        <span class="feather-icon"><i data-feather="external-link"></i></span>
                    </span>
                    ADD CATEGORY
                </h4>
            </div>

            <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
                <div class="alert alert-success" role="alert">
                    Category added successfully.
                </div>
            <?php elseif (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
                <div class="alert alert-error" role="alert">
                    Something went wrong. Please try again.
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-xl-12">
                    <section class="hk-sec-wrapper">
                        <div class="table-container">
                            <form class="needs-validation" method="post" novalidate>
                                <div class="form-row">
                                    <div class="col-md-6 mb-10">
                                        <label for="category" style="color:red;">CATEGORY NAME</label>
                                        <input type="text" class="form-control" id="category" placeholder="Category" name="category" required>
                                        <div class="invalid-feedback">Please provide a valid category name.</div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-10">
                                        <label for="categorycode" style="color:red;">CATEGORY CODE</label>
                                        <input type="text" class="form-control" id="categorycode" placeholder="Category Code" name="categorycode" required>
                                        <div class="invalid-feedback">Please provide a valid category code.</div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit" name="submit">SUBMIT</button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <?php include_once('includes/footer.php'); ?>
    </div>
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