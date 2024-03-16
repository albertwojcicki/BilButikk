<?php
include_once("db.connect.php");

// Function to generate table rows
function generateTableRow($key, $value) {
    echo "<tr>";
    echo "<td>$key</td>";
    echo "<td>:</td>";
    echo "<td>$value</td>";
    echo "</tr>";
}

// Database connection and query to fetch car data
$select_query = "SELECT car_id, car_name, car_price, car_text, car_image, car_year, car_km, car_gearbox, car_fuel, car_power, car_seats, car_owners, car_wheeldrive, car_range, car_color, car_last_eu_control, car_next_eu_control, car_weight, car_of_the_week FROM cars";
$stmt = $conn->prepare($select_query);
$stmt->execute();
$result = $stmt->get_result();

// Create an array to store car data
$carData = array();
while ($row = $result->fetch_assoc()) {
    $carData[] = $row;
}

// Handle form submission to change displayed product
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["selected_car"])) {
    $selectedCarIndex = $_POST["selected_car"];
    if (isset($carData[$selectedCarIndex])) {
        $selectedCar = $carData[$selectedCarIndex];
    }
}

// Handle form submission to update car information
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_car"])) {
    $carId = $_POST["car_id"];
    // Prepare an SQL query to update the car information
    $update_query = "UPDATE cars SET ";
    foreach ($_POST as $key => $value) {
        if ($key !== 'update_car' && $key !== 'car_id') {
            $update_query .= "$key = '$value', ";
        }
    }
    $update_query = rtrim($update_query, ", "); // Remove the last comma and space
    $update_query .= " WHERE car_id = $carId";
    
    // Execute the update query
    if ($conn->query($update_query) === TRUE) {
        // Redirect to the same page to refresh the displayed data
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Car Information</title>
</head>
<body>
    <h2>Car Information</h2>
    <a href="admin.php">tilbake til admin</a>
    <form method="post">
        <label for="selected_car">Select a car:</label>
        <select name="selected_car" id="selected_car">
            <?php
            // Generate options for the select dropdown
            foreach ($carData as $index => $car) {
                echo "<option value=\"$index\">{$car['car_name']}</option>";
            }
            ?>
        </select>
        <button type="submit">View Car</button>
    </form>

    <?php
    // Display selected car information in a form with input fields
    if (isset($selectedCar)) {
        echo "<form method=\"post\">";
        echo "<input type=\"hidden\" name=\"car_id\" value=\"{$selectedCar['car_id']}\">";
        echo "<table>";
        foreach ($selectedCar as $key => $value) {
            echo "<tr>";
            echo "<td>$key</td>";
            echo "<td>:</td>";
            echo "<td><input type=\"text\" name=\"$key\" value=\"$value\"></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<button type=\"submit\" name=\"update_car\">Update Car</button>";
        echo "</form>";
    }
    ?>
</body>
</html>
