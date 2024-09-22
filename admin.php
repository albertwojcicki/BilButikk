<?php
include_once("db.connect.php");

if (isset($_COOKIE['guid'])) {
    $checkGuidQuery = "SELECT guid FROM cockie";
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = $conn->query($checkGuidQuery);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $guidFromDB = $row['guid'];
        }
    } else {
        echo "Internal Error.\nContact System Administrator. ";
    }
    if ($_COOKIE['guid'] == $guidFromDB) {
        echo "yessss";
        echo '<h2>Last opp bilar</h2>';
        echo '<form action="" method="post" enctype="multipart/form-data">';
        echo '<label for="car_name">Navn på bilen:</label><br>';
        echo '<input type="text" id="car_name" name="car_name"><br>';
        echo '<label for="car_price">Prisen:</label><br>';
        echo '<input type="number" id="car_price" name="car_price"><br>';
        echo '<label for="car_brand">Merket:</label><br>';
        echo '<input type="text" id="car_brand" name="car_brand"><br>';
        echo '<label for="car_text">Beskrivelse:</label><br>';
        echo '<textarea id="car_text" name="car_text" rows="4" cols="50"></textarea><br>';
        
        for ($i = 1; $i <= 16; $i++) {
            echo "<label for='car_image$i'>Bilde $i:</label><br>";
            echo "<input type='file' id='car_image$i' name='car_image$i'><br>";
        }

        echo '<label for="car_stand">Brukt/ubrukt:</label><br>';
        echo '<input type="text" id="car_stand" name="car_stand"><br>';
        echo '<label for="car_year">Modellår:</label><br>';
        echo '<input type="text" id="car_year" name="car_year"><br>';
        echo '<label for="car_km">Kjørte kilometer:</label><br>';
        echo '<input type="text" id="car_km" name="car_km"><br>';
        echo '<label for="car_gearbox">Girkasse:</label><br>';
        echo '<input type="text" id="car_gearbox" name="car_gearbox"><br>';
        echo '<label for="car_fuel">Drivstoff:</label><br>';
        echo '<input type="text" id="car_fuel" name="car_fuel"><br>';
        echo '<label for="car_power">Hestekrefter:</label><br>';
        echo '<input type="text" id="car_power" name="car_power"><br>';
        echo '<label for="car_seats">Antall seter:</label><br>';
        echo '<input type="text" id="car_seats" name="car_seats"><br>';
        echo '<label for="car_owners">Tideligere eiere:</label><br>';
        echo '<input type="text" id="car_owners" name="car_owners"><br>';
        echo '<label for="car_wheeldrive">Tohjulsdrift/firehjulsdrift:</label><br>';
        echo '<input type="text" id="car_wheeldrive" name="car_wheeldrive"><br>';
        echo '<label for="car_range">Rekkevidde (hvis elbil):</label><br>';
        echo '<input type="text" id="car_range" name="car_range"><br>';
        echo '<label for="car_color">Bil farge:</label><br>';
        echo '<input type="text" id="car_color" name="car_color"><br>';
        echo '<label for="car_last_eu_control">Dato på sist EU-kontroll:</label><br>';
        echo '<input type="date" id="car_last_eu_control" name="car_last_eu_control"><br>';
        echo '<label for="car_next_eu_control">Dato på neste EU-kontroll:</label><br>';
        echo '<input type="date" id="car_next_eu_control" name="car_next_eu_control"><br>';
        echo '<label for="car_weight">Vekt på bilen:</label><br>';
        echo '<input type="text" id="car_weight" name="car_weight"><br>';
        echo '<label for="car_of_the_week">Ukens bil:</label><br>';
        echo '<input type="text" id="car_of_the_week" name="car_of_the_week"><br>';
        echo '<input type="submit" value="Submit"><br>';
        echo '</form>';
        echo '<a href="delete.php">Slett</a>';
        echo '<a href="change_ad.php">Ende på annonser</a>';
    } else {
        echo "<p>Error during authentication<br>Please try to log in again</p>";
    }
} else {
    echo "<p>Error during authentication<br>Please try to log in again</p>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Function to handle file uploads
    foreach ($_FILES as $file) {
        echo "File Name: " . htmlspecialchars($file["name"]) . "<br>";
        echo "File Size: " . htmlspecialchars($file["size"]) . "<br>";
        echo "File Type: " . htmlspecialchars($file["type"]) . "<br>";
        echo "Temporary Path: " . htmlspecialchars($file["tmp_name"]) . "<br>";
        echo "Error Code: " . htmlspecialchars($file["error"]) . "<br><br>";
        
        // Add detailed debug info for images
        if ($file["error"] === UPLOAD_ERR_OK) {
            echo "File Details:<br>";
            echo "Name: " . htmlspecialchars($file["name"]) . "<br>";
            echo "Size: " . htmlspecialchars($file["size"]) . "<br>";
            echo "Type: " . htmlspecialchars($file["type"]) . "<br>";
            echo "Temporary Name: " . htmlspecialchars($file["tmp_name"]) . "<br>";
            echo "Error Code: " . htmlspecialchars($file["error"]) . "<br>";
        } else {
            echo "Error uploading file. Code: " . htmlspecialchars($file["error"]) . "<br>";
        }
    }
    function uploadFile($file) {
        if ($file["error"] != 0) {
            echo "Error Code: " . $file["error"] . "<br>";
            switch ($file["error"]) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    echo "File size exceeds limit.<br>";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo "File only partially uploaded.<br>";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo "No file uploaded.<br>";
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    echo "Missing temporary folder.<br>";
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    echo "Failed to write file to disk.<br>";
                    break;
                case UPLOAD_ERR_EXTENSION:
                    echo "File upload stopped by extension.<br>";
                    break;
                default:
                    echo "Unknown error.<br>";
            }
            return false;
        }

        if (empty($file["tmp_name"])) {
            echo "Temporary file path is empty.<br>";
            return false;
        }

        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $target_file = $target_dir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a valid image
        $check = getimagesize($file["tmp_name"]);
        if ($check !== false) {
            echo "File is an image. ";
        } else {
            echo "File is not an image. ";
            $uploadOk = 0;
        }

        // Check file size
        if ($file["size"] > 50000000) {
            echo "File is too large. ";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
            echo "File format not allowed. ";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "File was not uploaded. ";
            return false;
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                echo "File uploaded successfully. ";
                return $target_file;
            } else {
                echo "Error uploading file. ";
                return false;
            }
        }
    }

    // Function to get MIME type
    function getMimeType($file) {
        if (isset($file["tmp_name"]) && !empty($file["tmp_name"])) {
            return mime_content_type($file["tmp_name"]);
        } else {
            echo "Temporary file path is empty.<br>";
            return false;
        }
    }

    // Debug output of file information
    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';

    foreach ($_FILES as $file) {
        echo "File Name: " . htmlspecialchars($file["name"]) . "<br>";
        echo "File Size: " . htmlspecialchars($file["size"]) . "<br>";
        echo "File Type: " . htmlspecialchars($file["type"]) . "<br>";
        echo "Temporary Path: " . htmlspecialchars($file["tmp_name"]) . "<br>";
        echo "Error Code: " . htmlspecialchars($file["error"]) . "<br><br>";
    }

    // Process form data and images
    $car_name = $_POST["car_name"] ?? null;
    $car_brand = $_POST["car_brand"] ?? null;
    $car_price = $_POST["car_price"] ?? null;
    $description = $_POST["car_text"] ?? null;
    $car_year = $_POST["car_year"] ?? null;
    $car_stand = $_POST["car_stand"] ?? null;
    $car_km = $_POST["car_km"] ?? null;
    $car_gearbox = $_POST["car_gearbox"] ?? null;
    $car_fuel = $_POST["car_fuel"] ?? null;
    $car_power = $_POST["car_power"] ?? null;
    $car_seats = $_POST["car_seats"] ?? null;
    $car_owners = $_POST["car_owners"] ?? null;
    $car_wheeldrive = $_POST["car_wheeldrive"] ?? null;
    $car_range = $_POST["car_range"] ?? null;
    $car_color = $_POST["car_color"] ?? null;
    $car_last_eu_control = $_POST["car_last_eu_control"] ?? null;
    $car_next_eu_control = $_POST["car_next_eu_control"] ?? null;
    $car_weight = $_POST["car_weight"] ?? null;
    $car_of_the_week = $_POST["car_of_the_week"] ?? null;

    // Array to store image paths
    $images = [];
    for ($i = 1; $i <= 10; $i++) {
        if (isset($_FILES["car_image$i"]) && $_FILES["car_image$i"]["error"] == 0) {
            $image_path = uploadFile($_FILES["car_image$i"]);
            if ($image_path) {
                $images["car_image$i"] = $image_path;
            } else {
                $images["car_image$i"] = null;
            }
        } else {
            $images["car_image$i"] = null;
        }
    }

    // SQL query to insert data
    $sql = "INSERT INTO cars (car_name, car_brand, car_price, car_text, car_year, car_stand, car_km, car_gearbox, car_fuel, car_power, car_seats, car_owners, car_wheeldrive, car_range, car_color, car_last_eu_control, car_next_eu_control, car_weight, car_of_the_week";

    // Add image columns
    for ($i = 1; $i <= 10; $i++) {
        $sql .= ", car_image$i";
    }

    $sql .= ") VALUES ('$car_name', '$car_brand', '$car_price', '$description', '$car_year', '$car_stand', '$car_km', '$car_gearbox', '$car_fuel', '$car_power', '$car_seats', '$car_owners', '$car_wheeldrive', '$car_range', '$car_color', '$car_last_eu_control', '$car_next_eu_control', '$car_weight', '$car_of_the_week'";

    // Add image values
    for ($i = 1; $i <= 10; $i++) {
        $sql .= ", '" . $images["car_image$i"] . "'";
    }

    $sql .= ")";

    if ($conn->query($sql) === TRUE) {
        echo "Successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
