<?php
include_once("db.connect.php");

$select_query = "SELECT car_id, car_name, car_price, car_text, car_image FROM cars";

$stmt = $conn->prepare($select_query);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="col-md-10 col-12">
                <div class="shopping-grid">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-6" style="width:100%;">
                                <div class="product-grid7">
                                   <?php
                                     
                                     
                                     
                                     while ($row = $result->fetch_assoc()) {
                                        echo '<div class="product-grid">';
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<div class="product-box">';
                                            echo '<div class="div-image">';
                                            echo '<a href="ad.php?car_id=' . $row["car_id"] . '" style="width:100%;"><img src="' . $row["car_image"] . '"class="image-car" style="width:100%;"></a>';
                                            echo '</div>';
                                            echo '<div class="product-details">';
                                            echo '<form method="POST" action="delete_car.php">
        <!-- Input hidden field to store the car ID -->
        <input type="hidden" name="car_id" value="' . $row['car_id'] . '">
        
        <!-- Delete button -->
        <button type="submit" name="delete_car" class="btn btn-danger">Delete Car</button>
      </form>';

                                            echo '<h6>' . $row["car_name"] . '</h6>';
                                            echo '<h6> ' . $row["car_price"] . '</h6>';
                                            echo '';
                                            echo '</div>';
                                            echo '</div>';
                                        }
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
                                            width: 100%; /* Adjust width for three columns with some spacing */
                                            margin-bottom: 20px;
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
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    // Attach click event listener to delete buttons
    $('.delete-btn').on('click', function(){
        var carId = $(this).data('car-id'); // Get car_id from data attribute
        // Send AJAX request to delete_car.php
        $.ajax({
            url: 'delete_car.php',
            method: 'POST',
            data: { car_id: carId },
            success: function(response){
                // Handle success response
                console.log('Car deleted successfully.');
                // Remove the product box from the DOM
                $(this).closest('.product-box').remove();
            },
            error: function(xhr, status, error){
                // Handle error response
                console.error('Error deleting car:', error);
            }
        });
    });
});
</script>

</body>
</html>