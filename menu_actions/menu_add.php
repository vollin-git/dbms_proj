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

    if ($action === 'insert') {
        // Insert new item
        $stmt = $conn->prepare("INSERT INTO Menu (Item_Name, Quantity, Price, Description) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sids", $item_name, $quantity, $price, $description);
        if ($stmt->execute()) {
            echo "Item added successfully.";
        } else {
            echo "Error inserting item: " . $stmt->error;
        }
        $stmt->close();
    }
}
// Function to display all menu items in a table
function displayMenu() {
    global $conn;
    $result = $conn->query("SELECT * FROM Menu");

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Item ID</th><th>Name</th><th>Quantity</th><th>Price</th><th>Description</th><th>Actions</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Item_ID'] . "</td>";
            echo "<td>" . htmlspecialchars($row['Item_Name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Quantity']) . "</td>";
            echo "<td>$" . htmlspecialchars($row['Price']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Description']) . "</td>";
            echo "<td>";
            // Update and delete buttons
            echo "<form method='POST' action='' style='display:inline-block;'>";
            echo "<input type='hidden' name='item_id' value='" . $row['Item_ID'] . "'>";
            echo "<input type='hidden' name='item_name' value='" . $row['Item_Name'] . "'>";
            echo "<input type='hidden' name='quantity' value='" . $row['Quantity'] . "'>";
            echo "<input type='hidden' name='price' value='" . $row['Price'] . "'>";
            echo "<input type='hidden' name='description' value='" . $row['Description'] . "'>";
            echo "<button type='submit' name='action' value='delete' class='button'>Delete</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No items found in the menu.</p>";
    }
}
?>
