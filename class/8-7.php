<!DOCTYPE html>
<html>
<head>
    <title>OOP User Form</title>
</head>
<body>
    <h2>User Information Form</h2>
    <form action="#" method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>ID:</label><br>
        <input type="text" name="id" required><br><br>

        <label>Phone:</label><br>
        <input type="number" name="phone" required><br><br>

        <label>Address:</label><br>
        <textarea name="address" required></textarea><br><br>

        <input type="submit" value="Submit" name="submit">
    </form>

    <?php
    if($_POST["submit"]){
        $name = $_POST["name"];
        $id = $_POST["id"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

         if (preg_match('/^\d{11}$/', $phone)) {
        echo "✅ Valid phone number.";
    } else {
        echo "❌ Invalid phone number. It must be exactly 11 digits.";
    }
}
    
    ?>
</body>
</html>