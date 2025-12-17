<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .menu { display: flex; justify-content: center; gap: 20px; }
        .menu a { text-decoration: none; padding: 10px; border: 1px solid #000; }
    </style>
</head>
<body>
    <h2>Welcome to Inventory Management</h2>
    <div class="menu">
        <a href="manage_stock.php">Manage Stock</a>
        <a href="manage_suppliers.php">Manage Suppliers</a>
        <a href="purchase_orders.php">Purchase Orders</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
