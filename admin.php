<?php
include_once("db.connect.php");


?>


<!DOCTYPE html>
<html>
<head>
    <title>Car Information Form</title>
</head>
<body>
    <h2>Last opp bilar</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="car_name">Navn på bilen:</label><br>
        <input type="text" id="car_name" name="car_name"><br>
        
        <label for="car_price">Prisen:</label><br>
        <input type="text" id="car_price" name="car_price"><br>
        
        <label for="car_text">Beskrivelse:</label><br>
        <textarea id="car_text" name="car_text" rows="4" cols="50"></textarea><br>
        
        <label for="car_image">Bilde:</label><br>
        <input type="file" id="image" name="image"><br>
        
        <input type="radio" id="brukt" name="brukt" value="brukt">
        <label for="brukt">Brukt</label><br>
        <input type="radio" id="ubrukt" name="ubrukt" value="ubrukt">
        <label for="ubrukt">Ubrukt</label><br>
        
        <label for="car_year">Modellår:</label><br>
        <input type="text" id="car_year" name="car_year"><br>
        
        <label for="car_km">Kjørte kilometer:</label><br>
        <input type="text" id="car_km" name="car_km"><br>
        
        <label for="car_gearbox">Girkasse:</label><br>
        <input type="text" id="car_gearbox" name="car_gearbox"><br>
        
        <label for="car_fuel">Drivstoff:</label><br>
        <input type="text" id="car_fuel" name="car_fuel"><br>
        
        <label for="car_power">Hestekrefter:</label><br>
        <input type="text" id="car_power" name="car_power"><br>
        
        <label for="car_seats">Antall seter:</label><br>
        <input type="text" id="car_seats" name="car_seats"><br>
        
        <label for="car_owners">Tideligere eiere:</label><br>
        <input type="text" id="car_owners" name="car_owners"><br>
        
        <label for="car_wheeldrive">Tohjulsdrift/firehjulsdrift:</label><br>
        <input type="text" id="car_wheeldrive" name="car_wheeldrive"><br>
        
        <label for="car_range">Rekkevidde (hvis elbil):</label><br>
        <input type="text" id="car_range" name="car_range"><br>
        
        <label for="car_color">Bil farge:</label><br>
        <input type="text" id="car_color" name="car_color"><br>
        
        <label for="car_last_eu_control">Dato på sist EU-kontroll:</label><br>
        <input type="text" id="car_last_eu_control" name="car_last_eu_control"><br>
        
        <label for="car_next_eu_control">Dato på neste EU-kontroll:</label><br>
        <input type="text" id="car_next_eu_control" name="car_next_eu_control"><br>
        
        <label for="car_weight">Vekt på bilen:</label><br>
        <input type="text" id="car_weight" name="car_weight"><br>
        
        <label for="car_of_the_week">Ukens bil:</label><br>
        <input type="text" id="car_of_the_week" name="car_of_the_week"><br>
        
        <input type="submit" value="Submit"><br>
    </form>
    <a href="delete.php">Slett</a>
</body>
</html>

<?php
include_once("db.connect.php");

function uploadFile($file) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($file["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Check file size
    if ($file["size"] > 500000) {
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        return false;
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            return false;
        }
    }
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_name = $_POST["car_name"];
    $car_price = $_POST["car_price"];
    $description = $_POST["car_text"];
    $car_image = $_POST["car_image"];
    $car_year = $_POST["car_year"];
    $car_km = $_POST["car_km"];
    $car_gearbox = $_POST["car_gearbox"];
    $car_fuel = $_POST["car_fuel"];
    $car_power = $_POST["car_power"];
    $car_seats = $_POST["car_seats"];
    $car_owners = $_POST["car_owners"];
    $car_wheeldrive = $_POST["car_wheeldrive"];
    $car_range = $_POST["car_range"];
    $car_color = $_POST["car_color"];
    $car_last_eu_control = $_POST["car_last_eu_control"];
    $car_next_eu_control = $_POST["car_next_eu_control"];
    $car_weight = $_POST["car_weight"];
    $car_of_the_week = $_POST["car_of_the_week"];

    // Upload image
    $image = uploadFile($_FILES["image"]);

    if ($image) {
        // Insert data into database
        $sql = "INSERT INTO cars (car_name, car_price, car_text, car_image,car_year, car_km, car_gearbox, car_fuel,
        car_power, car_seats, car_owners, car_wheeldrive, car_range, car_color, car_last_eu_control, car_next_eu_control,
        car_weight, car_of_the_week )
        VALUES ('$car_name', '$car_price', '$description', '$image', '$car_year',
'$car_km',
'$car_gearbox',
'$car_fuel', 
'$car_power',
'$car_seats',
'$car_owners',
'$car_wheeldrive',
'$car_range',
'$car_color',
'$car_last_eu_control',
'$car_next_eu_control',
'$car_weight',
'$car_of_the_week')";

        if ($conn->query($sql) === TRUE) {
           
            header("admin.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>
