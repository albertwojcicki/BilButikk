<?php
include_once("db.connect.php");

// Retrieve the car_id parameter from the URL
$product_id = $_GET['car_id'];

$select_query = "SELECT car_id, car_name, car_price, car_text, car_image FROM cars WHERE car_id = ?";
$stmt = $conn->prepare($select_query);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if product exists
if ($result->num_rows > 0) {
    // Fetch product data
    $row = $result->fetch_assoc();
    $car_id = $row["car_id"];
    $car_name = $row["car_name"];
    $car_price = $row["car_price"];
    $car_text = $row["car_text"];
    $car_image = $row["car_image"];

    // Close statement
    $stmt->close();

    // Now, you can include your template site and replace placeholders with product data
    include_once("ad.php");
} else {
    echo "Product not found";
}

$conn->close();
?>