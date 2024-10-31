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

// Handling insert, update, delete actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $item_id = isset($_POST['item_id']) ? (int)$_POST['item_id'] : 0;
    $item_name = isset($_POST['item_name']) ? $_POST['item_name'] : '';
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;
    $price = isset($_POST['price']) ? (float)$_POST['price'] : 0.0;
    $description = isset($_POST['description']) ? $_POST['description'] : '';


if ($action === 'delete') {
        // Check if item_id is provided for deletion
        if ($item_id > 0) {
            $stmt = $conn->prepare("DELETE FROM Menu WHERE Item_ID = ?");
            $stmt->bind_param("i", $item_id);
            if ($stmt->execute()) {
                echo "Item deleted successfully.";
            } else {
                echo "Error deleting item: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error: Item ID is missing for the delete action.";
        }
    }
    // Redirect to the main page to avoid form resubmission issues
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();

}

?>