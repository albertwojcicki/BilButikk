<?php
include_once("db.connect.php");
// Assuming $product_id contains the specific product ID you want to display
if (isset($_GET['car_id'])) {
    // Assuming $product_id contains the specific product ID you want to display
    $product_id = $_GET['car_id'];

    // Rest of your code to fetch and display product details
} else {
    echo "No product ID provided";
}
$select_query = "SELECT car_name, car_brand, car_price, car_text, car_image1, car_image2,  car_image3, car_image4, car_image5, car_image6, car_image7, car_image8, car_image9, car_image10,  car_stand, car_year, car_km, car_gearbox, car_fuel,
car_power, car_seats, car_owners, car_wheeldrive, car_range, car_color, car_last_eu_control, car_next_eu_control,
car_weight, car_of_the_week FROM cars WHERE car_id = ?";
$stmt = $conn->prepare($select_query);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if product exists
if ($result->num_rows > 0) {
    // Fetch product data
    $row = $result->fetch_assoc();
    $car_name = $row["car_name"];
    $car_brand = $row["car_brand"];
    $car_price = $row["car_price"];
    $description = $row["car_text"];
    $car_image1 = $row["car_image1"];
    $car_image2 = $row["car_image2"];
    $car_image3 = $row["car_image3"];
    $car_image4 = $row["car_image4"];
    $car_image5 = $row["car_image5"];
    $car_image6 = $row["car_image6"];
    $car_image7 = $row["car_image7"];
    $car_image8 = $row["car_image8"];
    $car_image9 = $row["car_image9"];
    $car_image10 = $row["car_image10"];
    $car_stand = $row["car_stand"];
    $car_year = $row["car_year"];
    $car_km = $row["car_km"];
    $car_gearbox = $row["car_gearbox"];
    $car_fuel = $row["car_fuel"];
    $car_power = $row["car_power"];
    $car_seats = $row["car_seats"];
    $car_owners = $row["car_owners"];
    $car_wheeldrive = $row["car_wheeldrive"];
    $car_range = $row["car_range"];
    $car_color = $row["car_color"];
    $car_last_eu_control = $row["car_last_eu_control"];
    $car_next_eu_control = $row["car_next_eu_control"];
    $car_weight = $row["car_weight"];
    $car_of_the_week = $row["car_of_the_week"];

    // Close statement
    $stmt->close();
    $carData = array(
        "Modellår" => $car_year,
        "Merke" => $car_brand,
        "Kilometers" => $car_km,
        "Gearbox" => $car_gearbox,
        "Brukt" => $car_stand,
        "Fuel" => $car_fuel,
        "Power" => $car_power,
        "Seats" => $car_seats,
        "Owners" => $car_owners,
        "Wheel Drive" => $car_wheeldrive,
        "Range" => $car_range,
        "Color" => $car_color,
        "Last EU Control" => $car_last_eu_control,
        "Next EU Control" => $car_next_eu_control,
        "Weight" => $car_weight,
        "Car of the Week" => $car_of_the_week
    );
    
    // Function to generate table rows
    function generateTableRow($key, $value) {
        echo "<tr>";
        echo "<td>$key</td>";
        echo "<td>:</td>";
        echo "<td>$value</td>";
        echo "</tr>";
    }
    ?>


<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo $car_name; ?></title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/css/swiper-icons.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/canito-detalle-producto.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark-icons.css">
    <link rel="stylesheet" href="assets/css/Pretty-Header-.css">
    <link rel="stylesheet" href="assets/css/shopping-ecommerce-products.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider-swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/Video-Parallax-Background-video-parallax.css">
    <link rel="stylesheet" href="adStyle.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Video-Parallax-Background-v2-multiple-parallax.css">
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-md custom-header navbar-light"
        style="display:flex !important; justify-content:right !important; width:100% !important;">
        <div class="container-fluid"
            style="display:flex !important;;justify-content:space-between !important;width:100%;">
            <div><a class="navbar-brand" href="index.php">Company<span>logo </span> </a><button data-bs-toggle="collapse"
                    class="navbar-toggler" data-bs-target="#navbar-collapse"><span class="visually-hidden">Toggle
                        navigation</span><span class="navbar-toggler-icon"></span></button></div>
            
                <ul class="navbar-nav ms-auto"></ul>
            </div>
        </div>
    </nav>
    
    <div class="container" style="padding-top:10px;">
    <h1 class="text-center">Produkt detaljer</h1>
    <div class="row text-center" style="height: 600px;">
        <div class="col-md-7">
            <div class="simple-slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php for ($i = 1; $i <= 10; $i++): ?>
                            <?php $imageVar = "car_image" . $i; ?>
                            <?php if (!empty($$imageVar)): ?>
                                <div class="swiper-slide" style="background: url(<?php echo $$imageVar; ?>) center center / cover no-repeat;"></div>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
            <div class="col-md-5">
                
            <h1><?php echo $car_name; ?></h1>
                
                <p><br> <?php echo $description; ?></p>
                <h2 class="text-center text-success"><?php echo $car_price . "kr"; ?><br><br><br></h2>
            </div>
        </div>
    </div>
    <div class="parallax">
        <div class="container d-flex justify-content-center align-items-center parallax-content" style="height:80vh; display:flex;flex-direction:row !important;justify-content:space-evenly;">
            <div class="col-12 col-md-10 col-lg-8 d-flex justify-content-center flex-column">
                
                <div class="col-md-6">
                <table class="table">
                <tbody>
                    <tr>
                        <th>Modellår</th>
                        <td><?php echo $car_year; ?></td>
                    </tr>
                    <tr>
                        <th>Merke</th>
                        <td><?php echo $car_brand; ?></td>
                    </tr>
                    <tr>
                        <th>Farge</th>
                        <td><?php echo $car_color; ?></td>
                    </tr>
                    <tr>
                        <th>Antall km</th>
                        <td><?php echo $car_km . "km"; ?></td>
                    </tr>
                    <tr>
                        <th>Girkasse</th>
                        <td><?php echo $car_gearbox; ?></td>
                    </tr>
                    <tr>
                        <th>Brukt</th>
                        <td><?php echo $car_stand; ?></td>
                    </tr>
                    <tr>
                        <th>Vekt</th>
                        <td><?php echo $car_weight . "kg"; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="col-md-6">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Drivstoff</th>
                        <td><?php echo $car_fuel; ?></td>
                    </tr>
                    <tr>
                        <th>Hestekrefter</th>
                        <td><?php echo $car_power . "hk"; ?></td>
                    </tr>
                    <tr>
                        <th>Antall seter</th>
                        <td><?php echo $car_seats; ?></td>
                    </tr>
                    <tr>
                        <th>Tideligere eiere</th>
                        <td><?php echo $car_owners; ?></td>
                    </tr>
                    <tr>
                        <th>Hjulsdrift</th>
                        <td><?php echo $car_wheeldrive; ?></td>
                    </tr>
                    <tr>
                        <th>Sist EU-Godkjent</th>
                        <td><?php echo $car_last_eu_control; ?></td>
                    </tr>
                    <tr>
                        <th>Neste EU-kontroll</th>
                        <td><?php echo $car_next_eu_control; ?></td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div><video class="parallax-background" autoplay="" loop="" muted="">
            <source src="video.mp4" type="video/mp4" >
        </video>
        <div class="parallax-placeholder" style="background-image:url(uploads/test.jpg);"></div>
    </div>
    </div>
<style>
    th {
        width: 15% !important ;
        background-color: rgba(0,0,0,0) !important;
        color:white !important;
    }
    td {
        width: 15% !important;
        background-color: rgba(0,0,0,0) !important;
        color:white !important;
    }
    .col-md-6 {
        width: 40%;
        background-color: rgba(0,0,0,0) !important
    }
    .flex-column {
        flex-direction: row !important;
    }
    .col-12 {
        /* width: 40%; */
        background-color: rgba(0,0,0,0) !important;
    }
    .div-wholeTable {
        position: relative;
        z-index: 2;
    }
    .col-md-6 {
        background-color: rgba(0,0,0,0) !important;
        width: 40%;
    }
    .parallax {
        color:white;
        background-color: rgba(0,0,0,0) !important;
    }
    .video-container {
        position: relative;
        width: 800px; /* Same width as the video */
        height: 400px; /* Same height as the video */
    }
    .video {
        position: absolute;
        top: 0;
        left: 0;
        width: 800px;
        height: 400px;
        min-width: 50%;
        min-height: 50%;
        z-index: -1; /* Set the video behind the table */
    }
    .table {
        background-color: transparent; /* Set the table background to transparent */
    }
    .footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 60px;
        background-color: #f5f5f5;
        text-align: center;
        line-height: 60px;
        z-index: 3; /* Ensure the footer is above the table and video */
    }
</style>

   
    <footer class="text-center bg-dark  " style="width:100%;">
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
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Video-Parallax-Background-v2-multiple-parallax.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
</body>

</html>

<?php } else {
 echo "No product found";
    }?>