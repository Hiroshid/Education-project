<?php
session_start();
include 'connection.php';
$id_pro = $_GET["id_pro"];
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

  // Update the existing record
  $sql = "UPDATE product SET
                grade = '$grade',
                namepro = '$namepro',
                detailpro = '$detailpro',
                price = '$price',
                discount = '$discount',
                picpro = '$picpro',
                numbers = '$numbers'
                WHERE id_pro = '$id_pro'";
  $result = mysqli_query($conn, $sql);

  move_uploaded_file($image_tmp, $image_location);

  if ($result) {
    $message = "Update complete";
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
  <title>Edit Product</title>
</head>

<body>
  <?php
  $id_pro = $_GET["id_pro"];
  $sqle = "SELECT * FROM product WHERE id_pro ='$id_pro'";
  $resulte = mysqli_query($conn, $sqle);
  $rowe = mysqli_fetch_assoc($resulte);
  ?>


  <form method="post" enctype="multipart/form-data">
    <h1>Edit Product</h1>
    <?php foreach ($resulte as $rowe) { ?>

      <div class="Flx">

        <div class="box">
          <input type="text" placeholder="Grade" name="grade" value="<?php echo $rowe["grade"] ?>" required />
          <label></label>
        </div>

        <div class="box">
          <input type="text" placeholder="NameProduct" name="nmp" value="<?php echo $rowe["namepro"] ?>" required />
          <label></label>
        </div>

        <div class="box">
          <input type="text" placeholder="Detail_product" name="dp" value="<?php echo $rowe["detailpro"] ?>" required />
          <label></label>
        </div>

        <div class="box">
          <input type="text" placeholder="Price" name="price" value="<?php echo $rowe["price"] ?>" required />
          <label></label>
        </div>

        <div class="box">
          <input type="text" placeholder="Number" name="numbers" value=" <?php echo $rowe["numbers"] ?>" required />
          <label></label>
        </div>

        <div class="box">
          <input type="text" placeholder="discount" name="discount" value="<?php echo $rowe["discount"] ?>" required />
          <label></label>
        </div>

        <div class="box">
          <input type="file" placeholder="Image" name="picpro" value="uploads/<?php echo $rowe["picpro"]; ?>" required />
          <label></label>
        </div>

      </div>

    <?php } ?>
    <br>
    <a href="View_admin_form.php">
    <button class="bn5" type="submit" name="submit">UPDATE</button>
    </a>

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