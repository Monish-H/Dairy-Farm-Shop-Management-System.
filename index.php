<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (isset($_POST['login'])) {
    $adminuser = trim($_POST['username']);
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $con->prepare("SELECT ID, Password FROM tbladmin WHERE UserName = ?");
    $stmt->bind_param("s", $adminuser);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Use password_verify for checking hashed passwords (assumes password_hash used during registration)
        if (password_verify($password, $row['Password'])) {
            $_SESSION['aid'] = $row['ID'];
            header('location:add-category.php');
            exit;
        } else {
            echo "<script>alert('Password Incorrect. Please try again.');</script>";
            echo "<script>window.location.href='dashboard.php'</script>";
        }
    } else {
        echo "<script>alert('Invalid details. Please try again.');</script>";
        echo "<script>window.location.href='dashboard.php'</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Login Page</title>
    <meta name="description" content="Dairy Farm Shop Management System Login" />

    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link href="dist/css/style.css" rel="stylesheet" type="text/css">

    <style>
        .custom-heading {
            color: #ff9800; /* Orange */
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            width: 100%;
        }

        .custom-login-btn {
            background-color: #009688; /* Teal */
            color: #fff;
            border: none;
        }

        .custom-login-btn:hover {
            background-color: #00796b; /* Darker teal on hover */
        }

        /* Add background color to the left banner */
        .auth-cover-img {
            background-color: #f0f8ff !important; /* AliceBlue - a light blue */
        }

        /* Add background color to the right side background */
        .col-xl-7.pa-0 {
            background-color: #FAF0E6 !important; /* Linen - a light yellowish color */
            display: flex; /* To center the form vertically */
            align-items: center; /* To center the form vertically */
            justify-content: center; /* To center the form horizontally */
            min-height: 100vh; /* Ensure it takes full viewport height */
        }

        .auth-form-wrap {
            display: flex; /* To center the form vertically */
            align-items: center; /* To center the form vertically */
            justify-content: center; /* To center the form horizontally */
            width: 100%; /* Make sure it takes the full width of the column */
            height: 100%; /* Make sure it takes the full height of the column */
        }

        .auth-form {
            background-color: #fff; /* Background color for the form itself */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* Optional: Add a subtle shadow */
            width: 80%; /* Adjust width of the form as needed */
            max-width: 400px; /* Set a maximum width for the form */
        }
    </style>
</head>

<body>

    <div class="hk-wrapper">

        <div class="hk-pg-wrapper hk-auth-wrapper">
            <header class="d-flex justify-content-center align-items-center px-3">
                <span class="custom-heading">DAIRY FARM SHOP MANAGEMENT SYSTEM</span>
            </header>

            <div class="container-fluid">
                <div class="row">

                    <div class="col-xl-5 pa-0">
                        <div id="owl_demo_1" class="owl-carousel dots-on-item owl-theme">
                            <div class="fadeOut item auth-cover-img overlay-wrap" style="background-image:url(dist/img/banner2.png);">
                                <div class="auth-cover-info py-xl-0 pt-100 pb-50"></div>
                                <div class="bg-overlay bg-trans-dark-50"></div>
                            </div>
                            <div class="fadeOut item auth-cover-img overlay-wrap" style="background-image:url(dist/img/banner1.png);">
                                <div class="auth-cover-info py-xl-0 pt-100 pb-50"></div>
                                <div class="bg-overlay bg-trans-dark-50"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-7 pa-0">
                        <div class="auth-form-wrap py-xl-0 py-50">
                            <div class="auth-form w-xxl-55 w-xl-75 w-sm-90 w-xs-100">
                                <form method="post">
                                    <h1 class="display-4 mb-10" style="color:red;">Welcome Back :)</h1>

                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" type="text" name="username" required>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Password" type="password" name="password" required autocomplete="off">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <span class="feather-icon"><i data-feather="eye-off"></i></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn custom-login-btn btn-block" type="submit" name="login">Login</button>
                                    <p class="font-14 text-center mt-15">Having trouble logging in?</p>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/jquery.slimscroll.js"></script>
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="vendors/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="dist/js/init.js"></script>
    <script src="dist/js/login-data.js"></script>

</body>
</html>