<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
        }
        .container{
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px #aaa;
            margin-right: 100px;
        }
        .container2{
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px #aaa;
        }
        input{
            width: 400px;
            height: 40px;
            border-radius: 6px;
            border: 1px solid gray;
        }
        input:focus{
            border: 2px solid green;
        }
        .btn{
            background-color: #06923E;
            border-radius: 6px;
            width: 410px;
            color: white;
        }
        .btn:hover{
            background-color:rgb(47, 136, 5);
        }
        h2{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Vendor</h2>
        <form action="" method='POST'>
            
            <p>Name:</p>
            <input type="text" name="vname" required><br>
            <p>Contact:</p>
            <input type="text" name="cont" required><br><br>
            <input class="btn" type="submit" name="vsubmit">
        </form>
    </div>



    <div class="container2">
        <h2>Add Product</h2>
        <form action="" method='POST'>
            
            <p>Product Name:</p>
            <input type="text" name="pname" required><br>
            <p>Price:</p>
            <input type="text" name="price" required><br><br>
            <p>Company:</p>
            <select name="company" id="">
                <?php
                    $sel = $connect->query("select * from vendor");
                    
                    while(list($name, $con)=$sel->fetch_row()){
                        echo"<option value='$name'>$name</option>";
                    }
                ?>
            </select>
            <br><br>
            <input class="btn" type="submit" name="psubmit">
        </form>
    </div>

</body>
</html>

<?php
$connect = mysqli_connect("localhost", "root", "", "trainee_table");

if(isset($_POST['vsubmit'])){
   
    $vname = $_POST['vname'];
    $cont = $_POST['cont'];

    $connect->query("call insert_vendor('$vname', '$cont')");
}


if(isset($_POST['psubmit'])){
   
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $company = $_POST['company'];

    $connect->query("call insert_product('$pname', '$price', '$company')");
}
?>