<?php
// Include the file with the database connection details
include_once("db.connect.php");

// Check if car_id is provided and is numeric
if(isset($_POST['car_id']) && is_numeric($_POST['car_id'])) {
    // Prepare a delete statement
    $delete_query = "DELETE FROM cars WHERE car_id = ?";
    
    // Prepare the statement
    $stmt = $conn->prepare($delete_query);
    
    // Bind parameters
    $stmt->bind_param("i", $_POST['car_id']); // Assuming car_id is an integer
    
    // Execute the statement
    if($stmt->execute()) {
        // Car deleted successfully
        header("Location: delete.php");
    } else {
        // Error occurred
        echo "Error deleting car: " . $stmt->error;
    }
    
    // Close statement
    $stmt->close();
} else {
    // Invalid car_id
    echo "Invalid car_id";
}
?>
