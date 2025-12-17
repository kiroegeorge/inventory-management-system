<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $productName = $_POST['productName'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    
    $query = "INSERT INTO products (productName, quantity, price) VALUES ('$productName', '$quantity', '$price')";
    if ($conn->query($query)) {
        echo "Stock added successfully!";
    }
}

$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Stock</title>
</head>
<body>
    <h2>Manage Stock</h2>
    <form method="POST">
        <input type="text" name="productName" placeholder="Product Name" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <input type="number" name="price" placeholder="Price" required>
        <button type="submit" name="add">Add Stock</button>
    </form>

    <table border="1">
        <tr><th>Product Name</th><th>Quantity</th><th>Price</th><th>Actions</th></tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['productName'] ?></td>
                <td><?= $row['quantity'] ?></td>
                <td><?= $row['price'] ?></td>
                <td>
                    <a href="edit_stock.php?id=<?= $row['productID'] ?>">Edit</a> |
                    <a href="delete_stock.php?id=<?= $row['productID'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
