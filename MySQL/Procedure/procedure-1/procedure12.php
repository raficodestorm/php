<?php
// Connect to database
$connect = mysqli_connect("localhost", "root", "", "trainee_table");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle Vendor form submission
if (isset($_POST['vsubmit'])) {
    $vname = $_POST['vname'];
    $cont = $_POST['cont'];

    $query = "CALL insert_vendor('$vname', '$cont')";
    if (!$connect->query($query)) {
        echo "Vendor Insert Error: " . $connect->error;
    }
}

// Handle Product form submission
if (isset($_POST['psubmit'])) {
    $name = $_POST['pname'];
    $price = $_POST['price'];
    $company = $_POST['company'];

    $query = "CALL insert_product('$name', '$price', '$company')";
    if (!$connect->query($query)) {
        echo "Product Insert Error: " . $connect->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor & Product</title>
    <style>
        .conmain {
            height: 90vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
        }
        .container, .container2 {
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px #aaa;
            margin-right: 50px;
        }
        input, select {
            width: 400px;
            height: 40px;
            border-radius: 6px;
            border: 1px solid gray;
            margin-bottom: 10px;
        }
        input:focus, select:focus {
            border: 2px solid green;
        }
        .btn {
            background-color: #06923E;
            border-radius: 6px;
            width: 410px;
            height: 40px;
            color: white;
            border: none;
        }
        .btn:hover {
            background-color: rgb(47, 136, 5);
            cursor: pointer;
        }
        h2 {
            text-align: center;
        }

        .nav{
            width: 100%;
            height: 50px;
            background-color: black;
            color: gray;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        ul{
            position: relative;
            list-style: none;
        }
        li{
            display: inline-block;
            padding: 5px 10px 5px 10px;
            margin: 0 20px;
        }
        a{
            text-decoration: none;
            color: gray;
            font-size: x-large;
            padding: 5px 10px 5px 10px;
        }
        ul li a:hover{
            color: white;
            
        }

    </style>
</head>
<body>
    <nav>
        <div class="nav">
            <ul>
                <li><a href="procedure12.php">Add product</a></li>
                <li><a href="procedure12.php">Add vendor</a></li>
                <li><a href="view-vendor.php">view vendor</a></li>
                <li><a href="view-product.php">view product</a></li>
            </ul>
        </div>
    </nav>
        <div class="conmain">
    <div class="container">
        <h2>Add Vendor</h2>
        <form action="" method="POST">
            <p>Name:</p>
            <input type="text" name="vname" required>
            <p>Contact:</p>
            <input type="text" name="cont" required><br>
            <input class="btn" type="submit" name="vsubmit" value="Add Vendor">
        </form>
    </div>

    <div class="container2">
        <h2>Add Product</h2>
        <form action="" method="POST">
            <p>Product Name:</p>
            <input type="text" name="pname" required>
            <p>Price:</p>
            <input type="text" name="price" required>
            <p>Company:</p>
            <select name="company" required>
                <option value="">-- Select Vendor --</option>
                <?php
                // Fetch vendors for dropdown
                $result = $connect->query("SELECT name FROM vendor");
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . htmlspecialchars($row['name']) . "'>" . htmlspecialchars($row['name']) . "</option>";
                    }
                } else {
                    echo "<option disabled>No vendors found</option>";
                }
                ?>
            </select><br>
            <input class="btn" type="submit" name="psubmit" value="Add Product">
        </form>
    </div>
    </div>
</body>
</html>
