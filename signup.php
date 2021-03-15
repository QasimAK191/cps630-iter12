<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <!-- Font Awesome -->
    <title>P2S Systems</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="mdbootstrap/css/mdb.min.css" />
    <link rel="stylesheet" href="index.css" />
</head>
<body>
    <!-- Start your project here-->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Navbar brand -->
            <div class="navbar-brand">P2S <i class="fas fa-car"></i> Systems</div>

            <!-- Toggle button -->
            <button class="navbar-toggler"
                    type="button"
                    data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                    </li>

                    <!-- Navbar dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"
                           href="#"
                           id="navbarDropdown"
                           role="button"
                           data-mdb-toggle="dropdown"
                           aria-expanded="false">
                            Types of Services
                        </a>
                        <!-- Dropdown menu -->
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="ride.php">Ride to Destination</a></li>
                            <li><a class="dropdown-item" href="deliver.php">Deliver Item</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="reviews.html">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="aboutus.html">About us</a>
                    </li>
                </ul>
                <!-- Left links -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" id="tooltip1" href="cart.php"><i class="fas fa-shopping-cart"></i><span class="tt1">Checkout</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" id="tooltip2" href="signup.php"><i class="fas fa-user"></i><span class="tt2">Sign Up</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" id="tooltip3" href="aboutus.html"><i class="fas fa-envelope"></i><span class="tt3">Contact Us</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" id="tooltip1" href="http://localhost/phpmyadmin/db_structure.php?server=1&db=project"><i class="fas fa-wrench"></i><span class="tt1">System Access</span></a>
                    </li>
                </ul>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
    <!-- Page Content-->
    <div class="signup-form">
    <form action="php/loginProcess.php" method="post" enctype="multipart/form-data">
		<h2>Login</h2>
		<p class="hint-text">Enter Login Details</p>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="pass" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Login</button>
        </div>
        <div class="text-center">Don't have an account? <a href="php/register.php">Register Here</a></div>
    </form>
</div>
    <!-- Page Content-->


    <!-- MDB -->
    <script type="text/javascript" src="mdbootstrap/js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
</body>
</html>
