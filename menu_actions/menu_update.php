<?php
// Database connection
$servername ="localhost";
$username ="root";
$password ="";
$database="customers";

//create a connection
$conn = mysqli_connect($servername,$username,$password,$database); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Update action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update') {
    $item_id = isset($_POST['item_id']) ? (int)$_POST['item_id'] : 0;
    $item_name = isset($_POST['item_name']) ? trim($_POST['item_name']) : '';
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;
    $price = isset($_POST['price']) ? (float)$_POST['price'] : 0.0;
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';

    // Validate input values
    if ($item_id > 0 && !empty($item_name) && $quantity >= 0 && $price >= 0) {
        // Debugging output
        echo "Updating Item ID: $item_id, Name: $item_name, Quantity: $quantity, Price: $price, Description: $description<br>";

        // Prepare the SQL statement
        $stmt = $conn->prepare("UPDATE Menu SET Item_Name = ?, Quantity = ?, Price = ?, Description = ? WHERE Item_ID = ?");
        
        if (!$stmt) {
            echo "Error preparing statement: " . $conn->error;
            exit();
        }

        // Bind parameters
        $stmt->bind_param("sidsi", $item_name, $quantity, $price, $description, $item_id);

        // Execute the statement
        if (!$stmt->execute()) {
            echo "Error executing statement: " . $stmt->error;
        } else {
            echo "Item updated successfully. Affected rows: " . $stmt->affected_rows;
        }
        $stmt->close();
    } else {
        echo "Error: Missing or invalid values for item name, quantity, price, or item ID.";
    }
}

// Close the database connection
//$conn->close();
?>
