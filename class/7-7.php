<!DOCTYPE html>
<html>
<head>
    <title>Store User Data</title>
</head>
<body>
    <h2>User Information Form</h2>
    <form action="save.php" method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>ID:</label><br>
        <input type="text" name="id" required><br><br>

        <label>Address:</label><br>
        <textarea name="address" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
