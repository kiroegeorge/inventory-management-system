<!DOCTYPE html>
<html lang="en">
<head>
    <title>Purchase Orders</title>
</head>
<body>
    <h2>Generate Purchase Order</h2>
    <form method="POST" action="generate_order.php">
        <select name="productID">
            <?php
            include 'db.php';
            $result = $conn->query("SELECT * FROM products");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['productID']}'>{$row['productName']}</option>";
            }
            ?>
        </select>
        <input type="number" name="quantityOrdered" placeholder="Quantity" required>
        <button type="submit">Generate Order</button>
    </form>
</body>
</html>
