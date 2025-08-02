!
<div class="table">
<h2>All Products</h2>

<?php
$connect = new mysqli("localhost", "root", "", "trainee_project");
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
$result = $connect->query("SELECT * FROM product");   //----show view 
if ($result->num_rows > 0) {
    echo "<style>
    table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background: #007bff;
            color: #fff;
        }
    </style>
    <table><tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Manufacturer ID</th>
        <th>Date & Time</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['price']}</td>
            <td>{$row['manufacturer_id']}</td>

        </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No products found.</p>";
}