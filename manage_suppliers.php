<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $supplierName = $_POST['supplierName'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    
    $query = "INSERT INTO suppliers (supplierName, contact, email) VALUES ('$supplierName', '$contact', '$email')";
    if ($conn->query($query)) {
        echo "Supplier added successfully!";
    }
}

$result = $conn->query("SELECT * FROM suppliers");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Suppliers</title>
</head>
<body>
    <h2>Manage Suppliers</h2>
    <form method="POST">
        <input type="text" name="supplierName" placeholder="Supplier Name" required>
        <input type="text" name="contact" placeholder="Contact" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit" name="add">Add Supplier</button>
    </form>

    <table border="1">
        <tr><th>Supplier Name</th><th>Contact</th><th>Email</th><th>Actions</th></tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['supplierName'] ?></td>
                <td><?= $row['contact'] ?></td>
                <td><?= $row['email'] ?></td>
                <td>
                    <a href="edit_supplier.php?id=<?= $row['supplierID'] ?>">Edit</a> |
                    <a href="delete_supplier.php?id=<?= $row['supplierID'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
