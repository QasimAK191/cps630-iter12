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
    <script src="./maps.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxZheKX9EPW0-vEmkVUNgBeqCw2WCnWhk&callback=myMap"
        async
    ></script>   
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

    <?php
        echo "
        <style>
            p {
                padding:10px;
                background-color:red;
                font-family: Impact;
                color:white;
                height: 40px;
                vertical-align:center;
            }
        </style>
        ";
        if($_SESSION['loggedIn']) {
            echo "
        <style>
            p {
                padding:10px;
                background-color:lightgreen;
                font-family: Impact;
                color:white;
                height: 40px;
                vertical-align:center;
            }

            p:hover {
                cursor:pointer;
            }

            #map {
                width:800px;
                height:600px;
            }
        </style>
        ";
            echo "<p>Logged in as ". $_SESSION['name'] . "</p>";
        } else echo "<p>Not Logged In!</p>";
    ?>

    <div class="content">
        <div class="header">
            <h2>Pick Items for Delivery</h2>
        </div>
        <br />
        <div class="flowers">
        <h4>Flowers to buy</h4><hr>
        <?php
            include 'php/connect.php';


            //Flowers 

            $result=$conn->query('SELECT flowerid, itemname, price, storename, address FROM flower');
            
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

                    echo "
                        <style>
                    div.item {
                        display:grid;
                        
                        
                        border-padding:10px;
                        
                        font-family: Verdana;
                        
                        width:175px;
                        height:100;
                        text-align: center;
                        font-stretch: 150px;
                        font-style: bold;
                        vertical-align:center;
                        font-size:15px;    
                    }

                    .flower {
                        color:white;
                        background-color:lightgreen;
                    }

                    .flower:hover {
                        border-top:3px solid black;
                        color:white;
                        background-color:green;

                    }

                    .menu {
                        display:grid;
                        padding: 10px;
                        float:left;
                        border-right:2px solid;
                        border-left:2px solid;
                        width:195px;
                        height:230px;
                        background-image: url(\"download.jpg\");
                    }

                    .menu:hover {
                        
                    }

                    div.item:hover {
                        box-shadow: 50 50 10px rgba(0, 0, 1, 100);
                        transform: scale(1.05);
                        cursor:pointer;
                        
                        
                    }

                    img {
                        height: 100px;
                        width: 100px;
                        text-align: center;
                        margin:auto;
                        vertical-align:center;
                        border: 1px solid darkgreen;
                        border-radius:35px;
                        
                        box-shadow: 0px 5px olive;
                    }

                    img:hover {

                    }

                </style>
                    ";
                                      
                    echo "<div class=\"menu\" 
                    ondrop=\"drop(event)\" 
                    ondragover=\"allowDrop(event)\">
                        <div class=\"menu-item menu-grid-item item flower\" id=\"" 
                        . $row["flowerid"] . "\" draggable=\"true\" ondragstart=\"drag(event)\">" 
                        .$row["itemname"] . "<img src=\"db-imgs/" 
                        . $row["itemname"] . ".jpg\" /><br><i class=\"fas fa-fan\"></i>"  
                        . $row["storename"] . "<br>$". $row["price"]."
                        </div>
                    </div>";
                }
            } else {
                echo "0 results";
            }

            ////////////////////

            //Cart

            echo"
            <style>
              div.cart {
                        display:flex-column;
                        float:right;
                        height: 800px;
                        width: 300px;
                        border:3px solid slategrey;
                        background-color:white;
                        vertical-align:center;
                        text-align:center;

                    }

                .cartBtn {
                    
                    justify-content: center;
                    text-align: center;
                    width: 100%;
                    background: sandybrown;
                      font-family: 'Roboto', sans-serif;
                      font-weight: 400;
                      color:white
                }

                .cartBtn:hover {
                    
                      font-weight: 900;
                      letter-spacing: 5px;
  
                      
                        stroke-width: 5;
                        stroke-dasharray: 15, 310;
                        stroke-dashoffset: 48;
                        transition: all 1.35s cubic-bezier(0.19, 1, 0.22, 1);

                }

                .formatspace {
                    padding-bottom:15px;
                    border-bottom: 2px solid orange;
                }

                </style>


            <script>
                function allowDrop(ev) {
                  ev.preventDefault();
                }

                function drag(ev) {
                  ev.dataTransfer.setData(\"text/html\", ev.target.id);
                }
                function drop(ev) {
                  ev.preventDefault();
                  var data = ev.dataTransfer.getData(\"text/html\");
                  ev.target.appendChild(document.getElementById(data));  
                }

                function drop2(ev) {
                  ev.preventDefault();
                  var data = ev.dataTransfer.getData(\"text/html\");
                  ev.target.appendChild(document.getElementById(data));

                }

                </script>
            <form method=\"POST\" action=\"cart.php\">
                <div class=\"cart\" ondrop=\"drop2(event)\" ondragover=\"allowDrop(event)\"><button class=\"cartBtn\" href=\"cart.php\">Add to Cart</button>
                <label><b>Your Address:</b></label><input type=\"text\" placeholder=" . $_SESSION["address"] . " onclick=\"\"></input>
                <div class=\"formatspace\"></div>
                </div>
            </form>
            ";
            ?>
            </div>
            <br />
            <!-- Coffee -->
            <div class="coffees">
            <br /><br />
                <h4>Coffee to buy</h4><hr>


            <?php
            /////////////////

            //Coffee
            include 'php/connect.php';

            $result2=$conn->query('SELECT coffeeid, price, itemname, storename, address FROM coffee');
            
            
            if ($result2->num_rows > 0) {
                // output data of each row
                while($row2 = $result2->fetch_assoc()) {

                    echo "
                    <style>
                    div.coffees {
                        padding-top: 200px;
                        display:block;
                    }

                    hr {
                        width:980px;
                        color:gray;
                    }


                    div.item {
                        display:grid;
                        
                        
                        border-padding:10px;
                        
                        font-family: Verdana;
                        
                        width:175px;
                        height:100;
                        text-align: center;
                        font-stretch: 150px;
                        font-style: bold;
                        vertical-align:center;
                        font-size:15px;    
                    }

                    .coffee {
                        color:white;
                        background-color:brown;
                    }

                    .coffee:hover {
                        border-top:3px solid black;
                        color:white;
                        background-color:maroon;

                    }

                    .menu2 {
                        display:grid;
                        padding: 10px;
                        float:left;
                        border-right:2px solid;
                        border-left:2px solid;
                        width:195px;
                        height:230px;
                        background-image: url(\"coffee.jpg\");
                    }

                    .menu2:hover {
                        
                    }

                    div.item:hover {
                        box-shadow: 50 50 10px rgba(0, 0, 1, 100);
                        transform: scale(1.05);
                        cursor:pointer;
                        
                        
                    }

                    img.coffee {
                        height: 100px;
                        width: 100px;
                        text-align: center;
                        margin:auto;
                        vertical-align:center;
                        border: 1px solid brown;
                        border-radius:35px;
                        
                        box-shadow: 0px 5px brown;
                    }

                    img:hover {

                    }

                    
                </style>
                    ";
                                      
                    echo "<div class=\"menu2\" 
                    ondrop=\"drop(event)\" 
                    ondragover=\"allowDrop(event)\">
                        <div class=\"menu-item menu-grid-item item coffee\" id=\"" 
                        . $row2["coffeeid"] . "\" draggable=\"true\" ondragstart=\"drag(event)\">" 
                        .$row2["itemname"] . "<img class=\"coffee\" src=\"db-imgs/" 
                        . $row2["itemname"] . ".jpg\" /><br><i class=\"fas fa-coffee\"></i>"  
                        . $row2["storename"] . "<br>$". $row2["price"]."
                        </div>
                    </div>";
                }
            } else {
                echo "0 results";
            }

            echo "
                <style>
                    label,.address {
                        padding-right:10px;
                        padding-top:0px;
                        
                    }  
                    
                    input {
                        background-color:dustybrown;
                        border-bottom:1px solid;
                    }


                </style>
            ";



            $conn->close();

        ?>
        
        </div>
    </div>

    <!-- Page Content-->
    <!-- MDB -->
    <script type="text/javascript" src="mdbootstrap/js/mdb.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
</body>
</html>
