<!DOCTYPE html>
<html>
<head>
    <title>View Expensive Products</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f4f9;
            padding: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background: #007bff;
            color: #fff;
        }
        a{
            padding: 8px 20px;
            background-color: blue;
            color: white;
            text-decoration: none;
        }
        .delete {
    padding: 8px 16px;
    background-color: #dc3545; /* Bootstrap danger red */
    color: #fff;
    border: none;
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px;
    font-weight: bold;
    transition: background-color 0.3s ease, transform 0.2s ease;
    display: inline-block;
}

.delete:hover {
    background-color: #c82333;
    transform: scale(1.05);
}

.delete:active {
    transform: scale(0.97);
    background-color: #a71d2a;
}
    </style>
</head>
<body>
    <a href="insert.php">+Add product</a>

<h2>Products with Price > 5000</h2>

<?php
$connect = new mysqli("localhost", "root", "", "trainee_project");
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

if (isset($_GET['delid'])) {
    $del_id = intval($_GET['delid']);
    $stmt = $connect->prepare("CALL delete_product_by_id(?)");
    $stmt->bind_param("i", $del_id);
    $stmt->execute();
    $stmt->close();
    // Redirect to prevent refresh-based repeat delete
    header("Location: products_view.php");
    exit;
}

$result = $connect->query("SELECT * FROM expensive_products");
if ($result->num_rows > 0) {
    echo "<table><tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Manufacturer</th>
        <th>Manufacturer ID</th>
        <th>Action</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['product_id']}</td>
            <td>{$row['product_name']}</td>
            <td>{$row['price']}</td>
            <td>{$row['manufacturer_name']}</td>
            <td>{$row['manufacturer_id']}</td>
            <td><a class='delete' href='products_view.php?delid={$row['product_id']}' onclick='return confirm(\"Are you sure?\")'>delete</a></td>

        </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No products found above price 5000.</p>";
}
$connect->close();
?>

</body>
</html>
