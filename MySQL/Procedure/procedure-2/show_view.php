<!DOCTYPE html>
<html>
<head>
    <title>View Products</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f9;
            padding: 30px;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 16px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<h2>Products with Price Greater Than 5000</h2>

<?php
$connect = new mysqli("localhost", "root", "", "trainee_table");

$query = "CALL view_productss";
$result = $connect->query($query);

if ($result) {
    echo "<table>
    <tr><th>ID</th><th>Name</th><th>Price</th><th>Manufacturer Name</th><th>Manufacturer ID</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['product_id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['price']}</td>
            <td>{$row['manufacturer_name']}</td>
            <td>{$row['manufacturer_id']}</td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No records found.</p>";
}
?>

</body>
</html>
