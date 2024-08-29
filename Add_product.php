<?php
session_start();
include 'connection.php';

if (isset($_POST) && !empty($_POST)) {
    $grade = $_POST["grade"];
    $namepro = $_POST["nmp"];
    $detailpro = $_POST["dp"];
    $price = $_POST["price"];
    $discount = $_POST["discount"];
    $picpro = $_FILES['picpro']['name'];
    $image_tmp = $_FILES['picpro']['tmp_name'];
    $folder = 'uploads/';
    $image_location = $folder . $picpro;
    $numbers = $_POST["numbers"];

    // Check if $uploadOk is set to 0 by an error
    if ($picpro == "") {
        $message = "Please select a file to upload.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        exit; // Stop execution if no file is selected
    }

    // Check file size
    $max_file_size = 2 * 1024 * 1024; // 2 MB (you can adjust this value)
    if ($_FILES['picpro']['size'] > $max_file_size) {
        $message = "File size is too large. Max file size is 2 MB.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        exit; // Stop execution if file size exceeds the limit
    }

    // Allow certain file formats
    $allowed_file_formats = array('jpg', 'jpeg', 'png', 'gif');
    $file_extension = strtolower(pathinfo($picpro, PATHINFO_EXTENSION));
    if (!in_array($file_extension, $allowed_file_formats)) {
        $message = "Invalid file format. Allowed formats: JPG, JPEG, PNG, GIF.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        exit; // Stop execution if file format is not allowed
    }

    // Insert a new record
    $sql = "INSERT INTO product (grade, namepro, detailpro, price, discount, picpro, numbers)
            VALUES ('$grade', '$namepro', '$detailpro', '$price', '$discount', '$picpro', '$numbers')";
    $result = mysqli_query($conn, $sql);

    move_uploaded_file($image_tmp, $image_location);

    if ($result) {
        $message = "Insert complete";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("location:View_admin_form.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/form_backend.css">
    <link rel="shortcut icon" href="img_gundam/GUNDAM HOBBY SHOP.ico" type="image/x-icon">

    <title>Add Product</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <h1>Add Product</h1>
        <div class="Flx">

            <div class="box">
                <input type="text" placeholder="Grade" name="grade" required />
                <label></label>
            </div>

            <div class="box">
                <input type="text" placeholder="NameProduct" name="nmp" required />
                <label></label>
            </div>

            <div class="box">
                <input type="text" placeholder="Detail_product" name="dp" required />
                <label></label>
            </div>

            <div class="box">
                <input type="text" placeholder="Price" name="price" required />
                <label></label>
            </div>

            <div class="box">
                <input type="text" placeholder="Number" name="numbers" required />
                <label></label>
            </div>

            <div class="box">
                <input type="text" placeholder="discount" name="discount" required />
                <label></label>
            </div>

            <div class="box">
                <input type="file" placeholder="Image(alert:File name must not exceed 10" name="picpro" required />
                <label></label>
            </div>


        </div>
        <br>
            <button class="bn5" type="submit" name="submit">Add</button>

    </form>


    <!--
    - custom js link
  -->
    <script src="./assets/js/script.js"></script>

    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>