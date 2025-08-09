<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
    }

    body {
      background: #f0f4f8;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .reg-box {
      background: #fff;
      padding: 30px 25px;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    .reg-box h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: 600;
      margin-bottom: 6px;
      color: #555;
    }

    input, select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      transition: border-color 0.3s;
    }

    input:focus, select:focus {
      border-color: #007BFF;
      outline: none;
    }

    .submit-reg {
      width: 100%;
      padding: 10px;
      background-color: #007BFF;
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .submit-reg:hover {
      background-color: #0056b3;
    }

    .links {
      text-align: center;
      margin-top: 15px;
    }

    .links a {
      margin: 0 10px;
      text-decoration: none;
      color: #007BFF;
      font-size: 14px;
    }

    .links a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="reg-box">
    
    <form action="#" method="POST" enctype="multipart/form-data">
    <h2>Login</h2>
      <div class="form-group">
        <label for="fullname">fullname</label>
        <input type="text" id="fullname" name="fullname" required>
      </div>

      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="username">Phone</label>
        <input type="number" id="phone" name="phone" required>
      </div>

      <div class="form-group">
        <label for="username">Branch</label>
        <input type="text" id="branch" name="branch" required>
      </div>

      

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>

      <div class="form-group">
        <label for="role">Select Role</label>
        <select name="role" id="role" required>
          <option value="" disabled selected hidden>Select role</option>
          <option value="admin">Admin</option>
          <option value="pharmacist">Pharmacist</option>
        </select>
      </div>

      <div class="form-group">
        <label for="image">Profile Image</label>
        <input type="file" id="image" name="image" accept="image/*" required>
    </div>

      <button type="submit" class="submit-reg">Submit</button>

      <div class="links">
        <a href="#">Login</a>
      </div>
    </form>
  </div>

</body>
</html>

<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rainstar_pharma";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize form values
    $fullname = trim($_POST['fullname']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $branch = trim($_POST['branch']);
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Handle image upload
    // Handle image upload
$imageName = $_FILES['image']['name'];
$imageTmp = $_FILES['image']['tmp_name'];
$imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

// Allowed file types
$allowedExt = ['jpg', 'jpeg', 'png', 'gif'];

// Rename file to avoid overwriting
$newImageName = uniqid("IMG_", true) . '.' . $imageExt;
$imageFolder = "uploads/" . $newImageName;

if (!is_dir("uploads")) {
    mkdir("uploads", 0777, true);
}

if (in_array($imageExt, $allowedExt) && $_FILES['image']['size'] <= 2 * 1024 * 1024) {
    if (move_uploaded_file($imageTmp, $imageFolder)) {
        // Insert with the new image name
        $stmt = $conn->prepare("INSERT INTO users (fullname, username, email, phone, branch, password, role, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $fullname, $username, $email, $phone, $branch, $password, $role, $newImageName);

        if ($stmt->execute()) {
            echo "<p style='color:green;'>Registration successful!</p>";
        } else {
            echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p style='color:red;'>Image upload failed!</p>";
    }
} else {
    echo "<p style='color:red;'>Invalid file type or file too large (Max: 2MB)</p>";
}

}

$conn->close();
?>

