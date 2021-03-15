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
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8y3OeOIj2d5g489ZKpeLqtzUXU0X5cMo&callback=myMap"
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
                width:600px;
                height:400px;
            }
        </style>
        ";
            echo "<p>Logged in as ". $_SESSION['name'] . "</p>";
        } else echo "<p>Not Logged In!</p>";
    ?>

    <div class="content">
        <div class="header">
            <h2>Book a Trip with Us!</h2>
        </div>
        <br />
        <div class="trip">
            <h4>Where to?</h4>
            <div id="map"></div>

            <!--Maps Script -->
            <script>
                function myMap() {
                      map = new google.maps.Map(document.getElementById("map"), {
                        center: { lat: 43.6532, lng: -79.3832 },
                        zoom: 15,
                      });
                      infoWindow = new google.maps.InfoWindow();
                      const locationButton = document.createElement("button");
                      locationButton.textContent = "Pan to Current Location";
                      locationButton.classList.add("custom-map-control-button");
                      map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
                      locationButton.addEventListener("click", () => {
                        // Try HTML5 geolocation.
                        if (navigator.geolocation) {
                          navigator.geolocation.getCurrentPosition(
                            (position) => {
                              const pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                              };
                              infoWindow.setPosition(pos);
                              infoWindow.setContent("Location found.");
                              infoWindow.open(map);
                              map.setCenter(pos);
                            },
                            () => {
                              handleLocationError(true, infoWindow, map.getCenter());
                            }
                          );
                        } else {
                          // Browser doesn't support Geolocation
                          handleLocationError(false, infoWindow, map.getCenter());
                        }
                      });

                      const clicked=false;
                      google.maps.event.addListener(map, 'click', function(event) {
                       placeMarker(event.latLng);
                    });

                    function placeMarker(location) {
                        
                    
                        var marker = new google.maps.Marker({
                            position: location, 
                            map: map
                        });


                         }
                    }
            </script>
    
        </div>

        <div class="cars">
               
        </div>
    </div>


    <?php
        include 'php/connect.php';

            $result2=$conn->query('SELECT carid, carcode, model, avail FROM car');
            
            
            if ($result2->num_rows > 0) {
                // output data of each row
                while($row2 = $result2->fetch_assoc()) {

                    echo "
                    <style>
                    div.coffees {
                        padding-top: 200px;
                        display:block;
                    }

                    

                    .car {
                        color:white;
                        background-color:black;
                    }

                    .car:hover {
                        border-top:3px solid black;
                        color:black;
                        background-color:white;

                    }

                    .menu2 {
                        display:grid;
                        padding: 0px;
                        float:left;
                        border-right:2px solid;
                        border-left:2px solid;
                        width:195px;
                        height:230px;
                        background: slategrey;
                    }

                    .menu2:hover {
                        
                    }

                    div.item:hover {
                        box-shadow: 50 50 10px rgba(0, 0, 1, 100);
                        transform: scale(1.05);
                        cursor:pointer;
                        
                        
                    }

                    img.car {
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
                        <div class=\"menu-item menu-grid-item item car\" id=\"" 
                        . $row2["carid"] . "\" draggable=\"true\" ondragstart=\"drag(event)\">" 
                        .$row2["model"] . "<img class=\"car\" src=\"db-imgs/" 
                        . $row2["model"] . ".jpg\" /><br><i class=\"fas fa-car\"></i>"  
                        . $row2["carcode"] . "<br>". $row2["avail"]."
                        </div>
                    </div>";
                }
            } else {
                echo "0 results";
            }
    ?>


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
