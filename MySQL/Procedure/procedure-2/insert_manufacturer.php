<?php
$connect = new mysqli("localhost", "root", "", "trainee_table");
?>




<!DOCTYPE html>
<html>
<head>
    <title>Insert Manufacturer</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f9;
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        h2 {
            color: #333;
        }
        form {
            background: white;
            padding: 25px;
            border-radius: 12px;
            width: 350px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 20px;
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>
<div clss="manuf">
<h2>Add Manufacturer</h2>
<form method="POST" action="">
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="text" name="address" placeholder="Address" required><br>
    <input type="text" name="contact" placeholder="Contact No" required><br>
    <input type="submit" name="submit" value="+Add">
</form>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    // $query = "CALL insert_manufacturer('$name','$address','$contact')";
    // if(!$connect->query($query)){
    //     echo "Error;"$connect->error;
    // }
    $stmt = $connect->prepare("CALL insert_manufacturer(?, ?, ?)");
    $stmt->bind_param("sss", $name, $address, $contact);
    $stmt->execute();

    echo "<div class='message'>Data inserted successfully!</div>";
}
?>
</div>


<div clss="pro">
<h2>Add Product</h2>
<form method="POST" action="">
    <input type="text" name="pname" placeholder="Name" required><br>
    <input type="text" name="price" placeholder="price" required><br>
    <select name="mid" id="">
        <option>-- select manufacturer id --</option>
        <?php
                // Fetch vendors for dropdown
                $result = $connect->query("SELECT id FROM manufacturer");
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['id']) . "</option>";
                    }
                } else {
                    echo "<option disabled>No vendors found</option>";
                }
                ?>
    </select>
    <input type="submit" name="psubmit" value="+Add">
</form>
<?php
if (isset($_POST['psubmit'])) {
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $mid = $_POST['mid'];

    // $query = "CALL insert_manufacturer('$name','$address','$contact')";
    // if(!$connect->query($query)){
    //     echo "Error;"$connect->error;
    // }
    $stmt = $connect->prepare("CALL insert_productss(?, ?, ?)");
    $stmt->bind_param("sss", $pname, $price, $mid );
    $stmt->execute();

    echo "<div class='message'>Data inserted successfully!</div>";
    header('Location: show_view.php');
}
?>
</div>

</body>
</html>
