<?php
include_once("db.connect.php");

$select_query = "SELECT car_id, car_name, car_brand, car_price, car_text, car_image,car_stand, car_year, car_km, car_gearbox, car_fuel,
car_power, car_seats, car_owners, car_wheeldrive, car_range, car_color, car_last_eu_control, car_next_eu_control,
car_weight, car_of_the_week  FROM cars";
// Initialize variables for filters
$filterSort = isset($_POST['sort']) ? $_POST['sort'] : 'all';
$filterBrand = isset($_POST['brand']) ? $_POST['brand'] : 'all';
$filterStand = isset($_POST['stand']) ? $_POST['stand'] : 'all';
$filterColor = isset($_POST['color']) ? $_POST['color'] : 'all';

// Prepare base query
$select_week_query = "SELECT car_id, car_name, car_price, car_text, car_image FROM cars WHERE car_of_the_week = 1";
$stmt_week = $conn->prepare($select_week_query);

$stmt_week->execute();
$result_week = $stmt_week->get_result();


$select_query = "SELECT car_id, car_name, car_price, car_text, car_image FROM cars WHERE 1";

// Add filters to the query
if ($filterSort != 'all') {
    // Modify query based on sort filter
    // Add your logic here for sorting
}

if ($filterBrand != 'all') {
    // Modify query based on brand filter
    $select_query .= " AND car_brand = '$filterBrand'";
}

if ($filterStand != 'all') {
    // Modify query based on stand filter
    $select_query .= " AND car_stand = '$filterStand'";
}

if ($filterColor != 'all') {
    // Modify query based on color filter
    // Ensure to use the correct column name for the color field in your database
    $select_query .= " AND car_color = '$filterColor'";
}



$stmt = $conn->prepare($select_query);

if (!$stmt) {
    // If there's an error in query preparation, output the error message
    die("Error in query preparation: " . $conn->error);
}

$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/css/swiper-icons.css">
    <link rel="stylesheet" href="assets/css/canito-detalle-producto.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark-icons.css">
    <link rel="stylesheet" href="assets/css/Pretty-Header-.css">
    <link rel="stylesheet" href="assets/css/shopping-ecommerce-products.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider-swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/Video-Parallax-Background-video-parallax.css">
    <link rel="stylesheet" href="style.css">
</head>

<body >
    <nav class="navbar navbar-expand-md custom-header navbar-light" style="display:flex !important; justify-content:right !important; width:100% !important;" >
        <div class="container-fluid" style="display:flex !important;justify-content:space-between !important;width:100%;">
            <div><a class="navbar-brand" href="#">Company<span>logo </span> </a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navbar-collapse"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
            
            <div class="dropdown">
            <input type="checkbox" role="button" aria-label="Display the menu" class="menu">
  <div class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  
</div>
                <ul class="navbar-nav ms-auto"></ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid text-center d-lg-flex d-flex justify-content-center align-items-center align-content-center align-items-lg-center video-parallax-container" style="background: url(&quot;assets/img/bil.jpg&quot;) no-repeat;background-size: cover;">
        <div class="col-6 col-lg-6 offset-lg-0">
            <p></p>
        </div><video autoplay="" loop="" muted="">
            <source src="http://thenewcode.com/assets/videos/polina.mp4" type="video/mp4" wp-acf="[{'type':'url','name':'video','label':'Video','wrapper':{'width':30}}]" wp-attr="[{'target':'src','replace':'%1'}]">
        </video>
    </div>
    <style>
          .div-carWeek {
    background-color: grey;
    width: 100%;
    height: 150px;

  }

  .div-carProducts {
    height: 
  }

    </style>
    
    <div class="container mtr-5 mb-2">
        <div class="row">
            <div class="col-md-2 col-12 border" >
                
            <form action="index.php" method="post" >
    <p class="lead text-center mb-0">Sort By:</p>
    <select class="form-control" name="sort">
        <option value="all" <?php if ($filterSort == 'all') echo 'selected'; ?>>Pris: Lav til høy</option>
        <option value="reviews" <?php if ($filterSort == 'reviews') echo 'selected'; ?>>Pris: Høy til lav</option>
        <option value="newest" <?php if ($filterSort == 'newest') echo 'selected'; ?>>Nye</option>
    </select>
    <hr>
    <p class="lead text-center mb-0">Car brand:</p>
    <select class="form-control" name="brand">
        <option value="all" <?php if ($filterBrand == 'all') echo 'selected'; ?>>All</option>
        <option value="BMW" <?php if ($filterBrand == 'BMW') echo 'selected'; ?>>BMW</option>
        <option value="Audi" <?php if ($filterBrand == 'Audi') echo 'selected'; ?>>Audi</option>
        <option value="Toyota" <?php if ($filterBrand == 'Toyota') echo 'selected'; ?>>Toyota</option>
        <option value="Opel" <?php if ($filterBrand == 'Opel') echo 'selected'; ?>>Opel</option>
        <option value="Tesla" <?php if ($filterBrand == 'Tesla') echo 'selected'; ?>>Tesla</option>
        <option value="Volkswagen" <?php if ($filterBrand == 'Volkswagen') echo 'selected'; ?>>Volkswagen</option>
        <option value="Skoda" <?php if ($filterBrand == 'Skoda') echo 'selected'; ?>>Skoda</option>
        <option value="Kia" <?php if ($filterBrand == 'Kia') echo 'selected'; ?>>Kia</option>
        <option value="Hyundai" <?php if ($filterBrand == 'Hyundai') echo 'selected'; ?>>Hyundai</option>
        <!-- Add more options here -->
    </select>
    <hr>
    <p class="lead text-center mb-0">Brukt/Ubrukt:</p>
    <select class="form-control" name="stand">
        <option value="all" <?php if ($filterStand == 'all') echo 'selected'; ?>>All</option>
        <option value="Brukt" <?php if ($filterStand == 'Brukt') echo 'selected'; ?>>Brukt</option>
        <option value="Ubrukt" <?php if ($filterStand == 'Ubrukt') echo 'selected'; ?>>Ubrukt</option>
    </select>
    <hr>
    <p class="lead text-center mb-0">Farge:</p>
    <select class="form-control mb-2" name="color">
        <option value="all" <?php if ($filterColor == 'all') echo 'selected'; ?>>All</option>
        <option value="Svart" <?php if ($filterColor == 'Svart') echo 'selected'; ?>>Svart</option>
        <option value="Hvit" <?php if ($filterColor == 'Hvit') echo 'selected'; ?>>Hvit</option>
        <option value="Grå" <?php if ($filterColor == 'Grå') echo 'selected'; ?>>Grå</option>
        <option value="Rød" <?php if ($filterColor == 'Rød') echo 'selected'; ?>>Rød</option>
        <option value="Grønn" <?php if ($filterColor == 'Grønn') echo 'selected'; ?>>Grønn</option>
        <!-- Add more options here -->
    </select>
    <form action="index.php?filters_applied=true" method="post" id="filterForm" onsubmit="applyFilters()">
    <!-- Your form inputs here -->
   <button type="submit" class="btn btn-primary">Filter</button>
    <button type="button" class="btn btn-secondary" onclick="resetFilters()">Reset Filters</button>
</form>


</form>
<script>
    function applyFilters() {
        // Store the current scroll position in localStorage
        localStorage.setItem('scrollPosition', window.scrollY);
    }

    // Check if there's a stored scroll position and scroll to it
    window.onload = function() {
        var scrollPosition = localStorage.getItem('scrollPosition');
        if (scrollPosition) {
            window.scrollTo(0, scrollPosition);
            localStorage.removeItem('scrollPosition'); // Remove the stored scroll position
        }
    }

    function resetFilters() {
        // Reload the page to reset filters
        window.location.href = 'index.php';
    }
</script>








            </div>
            <div class="col-md-10 col-12" id="articles">
                <div class="shopping-grid">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-6" style="width:100%;">
                                <div class="product-grid7">
                                <?php
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product-box">';
        echo '<div class="div-image">';
        echo '<a href="ad.php?car_id=' . $row["car_id"] . '" style="width:100%;"><img src="' . $row["car_image"] . '"class="image-car" style="width:100%;"></a>';
        echo '</div>';
        echo '<div class="product-details">';
        
        echo '<h6>' . $row["car_name"] . '</h6>';
        echo '<h6> ' . $row["car_price"] ."kr". '</h6>';
       
        echo '</div>';
        echo '</div>';
    }
    ?>
                                     <style>
                                         .product-grid7 {
                                            display: flex;
                                            flex-wrap: wrap;
                                            justify-content: flex-start;
                                            margin-bottom: 20px;
                                        }

                                        .product-box {
                                            display: flex;
                                            justify-content: center;
                                            flex-direction: column;
                                            align-items: center;
                                            width: 30%; /* Adjust width for three columns with some spacing */
                                            margin: 15px;
                                            /* overflow: hidden; */
                                            border: 1px solid #ccc; /* Add border for better visualization */
                                            box-sizing: border-box; /* Ensure padding and border are included in width */
                                        }

                                        .div-image {
                                            overflow: hidden;
                                            height: 150px; /* Adjust height for the top half */
                                        }

                                        .product-image img {
                                            width: 100%;
                                            height: 100%;
                                            object-fit: cover;
                                        }

                                        .product-details {
                                            padding: 10px;
                                            display: flex;
                                            width: 90%;
                                            justify-content: space-between;

                                        }

                                        .product-details p {
                                            margin: 5px 0;
                                        }

                                        .product-grid {
                                            display: grid;
                                            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                                            grid-gap: 20px;
                                            width: 100%;
                                        }

                                        .product-box {
                                            border: 1px solid #ccc;
                                            padding: 10px;
                                        }

                                        .product-image img {
                                            width: 200%;
                                            max-width: 200px;
                                            height: auto;
                                        }

                                        .product-details {
                                            text-align: center;

                                        }

                                     </style>
                                    
                                      
                                
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer  class="text-center bg-dark">
        <div class="container text-white py-4 py-lg-5">
            <ul class="list-inline">
                <li class="list-inline-item me-4"><a class="link-light" href="#">Web design</a></li>
                <li class="list-inline-item me-4"><a class="link-light" href="#">Development</a></li>
                <li class="list-inline-item"><a class="link-light" href="#">Hosting</a></li>
            </ul>
            <ul class="list-inline">
                <li class="list-inline-item me-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook text-light">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"></path>
                    </svg></li>
                <li class="list-inline-item me-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-twitter text-light">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15"></path>
                    </svg></li>
                <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram text-light">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"></path>
                    </svg></li>
            </ul>
            <p class="text-muted mb-0">Copyright © 2024 Brand</p>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Simple-Slider-swiper-bundle.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
    <script src="assets/js/Video-Parallax-Background-video-parallax.js"></script>
<?php

// Include database connection and fetch products logic here
// Filter and sort products based on form submission


// Display products here

?>

</body>

</html>