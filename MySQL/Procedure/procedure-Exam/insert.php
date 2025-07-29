<?php
$connect = new mysqli("localhost", "root", "", "trainee_project");
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Manufacturer & Product</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f4f9;
        }
        .main{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .manufacturer{
            margin-right: 200px
        }
        h2 { color: #333; }
        form {
            background: white;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 8px;
            width: 350px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, select {
            width: 100%;
            margin: 8px 0;
            padding: 10px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            animation: jigjig 5s linear infinite;
        }
        @keyframes jigjig {
            0%{
                background-color: blue;
            }
            25%{
                background-color: #8338ec;
            }
            50%{
                background-color: blue;
            }
            95%{
                background-color: #8338ec;
            }
        }
        .message { margin: 10px 0; font-weight: bold; }

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
        a{
            padding: 8px 20px;
            background-color: blue;
            color: white;
            text-decoration: none;
        }
        .delete {
    padding: 8px 16px;
    background-color: #dc3545;
    color: #fff;
    border: none;
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px;
    font-weight: bold;
    transition: background-color 0.3s ease, transform 0.2s ease;
    transition: 1s ease;
    display: inline-block;
}

.delete:hover {
    background-color: #c82333;
    transform: scale(1.05);
    padding: 8px 30px;
}

.delete:active {
    transform: scale(0.97);
    background-color: #a71d2a;
}
       
    </style>
</head>
<body>
    
    <div class="main">
<div class="manufacturer">
<h2>Add Manufacturer</h2>
<form method="POST" action="">
    <input type="text" name="m_name" placeholder="Name" required>
    <input type="text" name="m_address" placeholder="Address" required>
    <input type="text" name="m_contact" placeholder="Contact No" required>
    <input type="submit" name="add_manufacturer" value="+ Add Manufacturer">
</form>

<?php
if (isset($_POST['add_manufacturer'])) {
    $stmt = $connect->prepare("CALL insert_manufacturer(?, ?, ?)");
    $stmt->bind_param("sss", $_POST['m_name'], $_POST['m_address'], $_POST['m_contact']);
    if ($stmt->execute()) {
        echo "<div class='message'>Manufacturer added successfully!</div>";
    } else {
        echo "<div class='message'>Error: " . htmlspecialchars($connect->error) . "</div>";
    }
    $stmt->close();
}
?>
</div>


<div class="product">
<h2>Add Product</h2>
<form method="POST" action="">
    <input type="text" name="p_name" placeholder="Product Name" required>
    <input type="number" name="p_price" placeholder="Price" step="0.01" required>
    <select name="p_manufacturer_id" required>
        <option value="">-- Select Manufacturer --</option>
        <?php
        $result = $connect->query("SELECT id, name FROM manufacturer");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id']}'>{$row['name']} (ID: {$row['id']})</option>";
        }
        ?>
    </select>
    <input type="submit" name="add_product" value="+ Add Product">
</form>

<div class="delete">
<form action="" method="POST">
<select name="manufacturer_id" required>
        <option value="">-- Select Manufacturer --</option>
        <?php
            echo "<option value='{$row['id']}'>{$row['name']} (ID: {$row['id']})</option>";
        ?>
    </select>
    <input type="submit" name="delete_manufacturer" value="delete9">
</form>
<?php
if(isset($_POST['delete_manufacturer'])){
    $m_id = $_POST['manufacturer_id'];
    $del = $connect->prepare("CALL after_manufacturer_delete($m_id)");
    if($del->execute())

}
?>
</div>

<?php
if (isset($_POST['add_product'])) {
    $stmt = $connect->prepare("CALL insert_productss(?, ?, ?)");
    $stmt->bind_param("sdi", $_POST['p_name'], $_POST['p_price'], $_POST['p_manufacturer_id']);
    if ($stmt->execute()) {
        echo "<div class='message'>Product added successfully!</div>";
        header("Location: products_view.php");
    } else {
        echo "<div class='message'>Error: " . htmlspecialchars($connect->error) . "</div>";
    }
    $stmt->close();
}
$connect->close();
?>
</div>
</div>
<div class="table">
<h2>Products with Price > 5000</h2>

<?php
$connect = new mysqli("localhost", "root", "", "trainee_project");
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
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

if (isset($_GET['delid'])) {
    $del_id = intval($_GET['delid']);
    $stmt = $connect->prepare("CALL delete_product_by_id($del_id)");
    $stmt->execute();
    $stmt->close();
    // Redirect to prevent refresh-based repeat delete
    header("Location: products_view.php");
    exit;
}

$connect->close();

?>
</div>
</body>
</html>
