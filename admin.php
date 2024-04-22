<?php
include_once ("db.connect.php");

if (isset($_COOKIE['guid'])) {
    $checkGuidQuery = "SELECT guid FROM cockie";
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = $conn->query($checkGuidQuery);
    if ($result->num_rows > 0) {
        // output data of each row
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
echo '<input type="text" id="car_price" name="car_price"><br>'; 
echo '<label for="car_brand">Merket:</label><br>'; 
echo '<input type="text" id="car_brand" name="car_brand"><br>'; 
echo '<label for="car_text">Beskrivelse:</label><br>'; 
echo '<textarea id="car_text" name="car_text" rows="4" cols="50"></textarea><br>'; 
echo '<label for="car_image">Bilde:</label><br>'; 
echo '<input type="file" id="image" name="image"><br>'; 
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
?>


<!DOCTYPE html>
<html>

<head>
    <title>Car Information Form</title>
</head>

<body>


</body>

</html>

<?php
include_once ("db.connect.php");

function uploadFile($file)
{
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($file["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Check file size
    if ($file["size"] > 500000) {
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
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
    $car_brand = $_POST["car_brand"];
    $car_price = $_POST["car_price"];
    $description = $_POST["car_text"];
    $car_image = $_POST["car_image"];
    $car_stand = $_POST["car_stand"];
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
        $sql = "INSERT INTO cars (car_name, car_brand, car_price, car_text, car_image,car_year, car_stand, car_km, car_gearbox, car_fuel,
        car_power, car_seats, car_owners, car_wheeldrive, car_range, car_color, car_last_eu_control, car_next_eu_control,
        car_weight, car_of_the_week )
        VALUES ('$car_name', '$car_brand', '$car_price', '$description', '$image', '$car_year',
'$car_stand',
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

            echo "Succesful";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>