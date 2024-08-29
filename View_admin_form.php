<?php
include 'connection.php';
session_start();
$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


?>

<?php
include 'connection.php';

// ตรวจสอบว่ามีการส่งค่า status มาหรือไม่
if (isset($_GET['id_user']) && isset($_GET['new_status'])) {
    $id_user = $_GET['id_user'];
    $new_status = $_GET['new_status'];

    // ทำการอัปเดตสถานะในฐานข้อมูล
    $update_sql = "UPDATE users SET status = '$new_status' WHERE id_user = $id_user";
    mysqli_query($conn, $update_sql);
}

// ดึงข้อมูลสมาชิก
$sqlo = "SELECT * FROM users";
$resulto = mysqli_query($conn, $sqlo);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- 
    - custom css link
  -->
    <link rel="stylesheet" href="assets/css/v_style.css">

    <!-- 
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        .gotopbtn {
            position: fixed;
            width: 200px;
            height: 50px;
            background: #00d1ff;
            right: 50px;
            text-decoration: none;
            text-align: center;
            line-height: 50px;
            color: white;
            font-size: 22px;
            border-radius: 10px;
            /* You can adjust the value to control the roundness */
        }
    </style>
</head>

<body>
    <br><br><br>

    <div class="container mt-3">
        <h1>All User</h1>
        <table class="">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;Status</th>
                    <th>Action</th>
                </tr>
                <br>
            </thead>
            <tbody>
                <?php foreach ($resulto as $rowo) { ?>
                    <tr>
                        <td>
                            <?php echo $rowo['firstname']; ?>
                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $rowo['status']; ?>
                        </td>
                        <td>
                            <!-- สร้างลิงก์ที่เรียกใช้ PHP เพื่อเปลี่ยนแปลงสถานะ -->
                            <a
                                href="View_admin_form.php?id_user=<?php echo $rowo['id_user']; ?>&new_status=<?php echo ($rowo['status'] === 'U') ? 'A' : 'U'; ?>">
                                Change Status
                            </a>
                        </td>
                    </tr>
                <?php }
                ; ?>
            </tbody>
        </table>
    </div>



    <main>

        <article>

            <!-- 
        - #PRODUCT
      -->
            <form method="post">
                <?php foreach ($result as $row) { ?>

                    <section class="section product" aria-label="product">
                        <div class="container">

                            <div class="product-slides">

                                <div class="slider-banner" data-slider>
                                    <figure class="product-banner">
                                        <img src="uploads/<?php echo $row["picpro"]; ?>" width="600" height="600"
                                            loading="lazy" alt="Nike Sneaker" class="img-cover">
                                        <input type="hidden" name="picpro" value="<?php echo $row["picpro"]; ?>">
                                    </figure>

                                </div>

                                <button class="slide-btn prev" aria-label="Previous image" data-prev>
                                </button>

                                <button class="slide-btn next" aria-label="Next image" data-next>

                                </button>

                            </div>

                            <div class="product-content">

                                <p class="product-subtitle">
                                    <?php echo $row["grade"] ?>
                                    <input type="hidden" name="grade" value="<?php echo $row["grade"]; ?>">
                                </p>

                                <h1 class="h1 product-title">
                                    <?php echo $row["namepro"] ?>
                                </h1>

                                <p class="product-text">
                                    <?php echo $row["detailpro"] ?>
                                </p>

                                <div class="wrapper">

                                    <span class="price">
                                        <?php echo $row["price"] ?> Bath
                                    </span>

                                    <span class="badge">
                                        <?php echo $row["discount"] ?>%
                                    </span>


                                </div>

                                <div class="btn-group">

                                    <a href="Edit_Product.php?id_pro=<?php echo $row["id_pro"]; ?>" class="cart-btn">
                                        <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                                        <span class="span">Edit</span>
                                    </a>

                                    <!-- //delete  -->
                                    <a href="delete_product.php?id_pro=<?php echo $row["id_pro"]; ?>" class="cart-btn"
                                        onclick="return confirm('Are you sure you want to delete this product?');">
                                        <ion-icon name="trash"></ion-icon>
                                        <span class="span">Delete</span>
                                    </a>

                                </div>

                            </div>

                        </div>
                    </section>
                <?php } ?>

            </form>
        </article>
    </main>

    <button class="gotopbtn" style="bottom: 200px;"><a href="regis_login.php">Logout</a></button>

    <a class="gotopbtn" href="#" style="bottom: 120px;">Move up</a>

    <a class="gotopbtn" href="Add_product.php" style="bottom: 40px;">ADD PRODUCT</a>


    <!-- 
    - custom js link
  -->
    <script src="./assets/js/script_view.js"></script>

    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>