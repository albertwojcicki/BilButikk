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
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="car_name">Car Name:</label><br>
        <input type="text" id="car_name" name="car_name"><br>
        
        <label for="car_price">Car Price:</label><br>
        <input type="number" id="car_price" name="car_price"><br>
        
        <label for="car_text">Description:</label><br>
        <textarea id="car_text" name="car_text" rows="4" cols="50"></textarea><br>
        
        <label for="car_image">Car Image:</label><br>
        <input type="file" id="image" name="image"><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
