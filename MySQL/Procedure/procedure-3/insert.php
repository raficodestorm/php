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
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
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
        }
        .message { margin: 10px 0; font-weight: bold; }
        a{
            padding: 30px 25px;
            background-color: blue;
            color: white;
            font-size: larger;
            text-decoration: none;
            border-radius: 50%;
            
        }
        .under{
            margin-top: 100px;
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
<div class="under">
    <a href="products_view.php">View Products</a>
</div>
</body>
</html>
