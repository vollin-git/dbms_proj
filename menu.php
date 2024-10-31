
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
        }
        form {
            margin: 20px 0;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
        .button {
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
        }
        .update, .delete {
            display: inline-block;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Order Management</h2>

    <!-- Form to Insert or Update Item -->
    <form method="POST" action="">
        <input type="hidden" name="item_id" id="item_id">
        <label for="item_id">Item id:</label>
        <input type="text" id="item_id" name="item_id" required>

        <label for="item_name">Item Name:</label>
        <input type="text" id="item_name" name="item_name" required>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>

        <label for="price">Price:</label>
        <input type="number" step="0.01" id="price" name="price" required>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description">

        <button type="submit" name="action" value="insert" class="button">Add Item</button>
        <button type="submit" name="action" value="update" class="button">Update Item</button>
    </form>

    <!-- Display Menu Items in a Table -->
    <?php include 'menu_actions/menu_add.php'; displayMenu(); ?>
    <?php include 'menu_actions/menu_delete.php'?>
    <?php include 'menu_actions/menu_update.php'?>
</div>

</body>
</html>