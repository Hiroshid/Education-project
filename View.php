<?php
include 'connection.php';
//include 'connectserver.php';
session_start();
//unset($_SESSION["shopping_pro"]);

// ปุ่มนำออกจาก ตะกล้าสินค้า 
if (isset($_GET['action'])) {
  if ($_GET['action'] == "delete") {
    foreach ($_SESSION["shopping_pro"] as $key => $value) {
      if ($value["id_pro"] == $_GET["id_pro"]) {
        unset($_SESSION["shopping_pro"][$key]);
        $messageDelete = "นำออกตะกร้าแล้ว";
        echo "<script type = 'text/javascript'>alert('$messageDelete')</script>";
      }
    }
  }
}
// ปุ่มนำออกจาก ตะกล้าสินค้า 

// สร้างตัวแปร array จาก action=add_pro
if (isset($_POST["add_pro"])) {
  //$select = 1;
  if (isset($_SESSION["shopping_pro"])) {
    $item_array_id = array_column($_SESSION["shopping_pro"], "id_pro");
    if (!in_array($_POST["id_pro"], $item_array_id)) {
      $count = count($_SESSION["shopping_pro"]);
      $item_array = array(
        'id_pro' => $_POST['id_pro'],
        'picpro' => $_POST['picpro'],
        'grade' => $_POST['grade'],
        'namepro' => $_POST['namepro'],
        'price' => $_POST['price'],
        'discount' => $_POST['discount'],
        'order_q' => $_POST['order_q']
      );

      $_SESSION["shopping_pro"][$count] = $item_array;
    } else {
      $messageAdd = "สินค้านี้มีอยู่ในตะกร้าแล้ว";
      echo "<script type='text/javascript'>alert('$messageAdd'); window.location.href='Shop.php';</script>";
      exit; // ให้ทำการออกจากสคริปต์หลังจากแสดง alert
    }
  } else {
    $item_array = array(
      'id_pro' => $_POST['id_pro'],
      'picpro' => $_POST['picpro'],
      'grade' => $_POST['grade'],
      'namepro' => $_POST['namepro'],
      'price' => $_POST['price'],
      'discount' => $_POST['discount'],
      'order_q' => $_POST['order_q']
    );

    $_SESSION["shopping_pro"][0] = $item_array;
  }
  header("location:Cart.php");
  exit; // ออกจากสคริปต์หลังจากทำการ redirect
}

// สร้างตัวแปร array จาก action=add_pro

// การยืนยันการสั่งซื้อ
if (isset($_GET['action'])) {
  if ($_GET['action'] == "order") {
    $sum = $_POST["money_order"];
    $firstname = $_SESSION["firstname"];

    $date = new DateTime;
    $date->setTimeZone(new DateTimeZone('Asia/Bangkok'));
    $dayorder = date("Y-m-d H:i:s");
    // echo $dayorder;
    // list($date, $time) = explode(" ", $date);
    // list($year, $month, $day) = explode("-", $date);
    // $strDate = explode("-", $date);
    // $year_order = $strDate[0];
    // $month_order = $strDate[1];
    // $day_order = $strDate[2];
    //echo $day_order."/".$month_order."/".$year_order;

    $sqlorder = "INSERT INTO sale(sum,dayorder,id_user)
      VALUES('$sum','$dayorder','$firstname')";
    $resultorder = mysqli_query($conn, $sqlorder);

    if ($resultorder) {
      $id_sale = mysqli_insert_id($conn);
      foreach ($_SESSION["shopping_pro"] as $key => $value) {
        $id_pro = $value["id_pro"];
        $order_q = $value["order_q"];

        $sqldetail = "INSERT INTO sale_detail(id_sale,id_pro,numbersale)
              VALUES('$id_sale','$id_pro','$order_q')";
        $resultdetail = mysqli_query($conn, $sqldetail);

        if ($resultdetail) {
          unset($_SESSION["shopping_pro"]);
          $messageOrder = "สั่งซื้อแล้ว";
          echo "<script type = 'text/javascript'>alert('$messageOrder')</script>";
        }
      }
    }
  }
}
// การยืนยันการสั่งซื้อ

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gundam Hobby Shop.store</title>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./assets/images/logo/favicon.ico" type="image/x-icon">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/style_load.css">
  <script src="./assets/js/script_load.js"></script>
  <link rel="stylesheet" href="assets/css/v_style.css">

  <script src="https://cdn.lordicon.com/lordicon.js"></script>



  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <link rel="shortcut icon" href="img_gundam/GUNDAM HOBBY SHOP.ico" type="image/x-icon">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <style>
    marquee {
      background-color: #00D1FF;
      color: white;
      padding: 7px;
      border-top: 4px solid white;
      border-bottom: 4px solid white;
    }

    .hn {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 45px;
      color: #00D1FF;
      transition: font-size 0.3s ease;
      /* ปรับค่าตามที่คุณต้องการ */
    }

    .hn:hover {
      font-size: 50px;
      /* ปรับค่าตามที่คุณต้องการ */
    }

    html {
      scroll-behavior: smooth;
      scroll-padding: var(--scroll-padding, 5rem);
    }

    .textfield {
      box-shadow: inset #04d4fc 0 0 0 2px;
      border: 0;
      background: rgba(0, 0, 0, 0);
      appearance: none;
      width: 100%;
      position: relative;
      border-radius: 3px;
      padding: 9px 12px;
      line-height: 1.4;
      color: rgb(0, 0, 0);
      font-size: 16px;
      font-weight: bold;
      /* Making the text bold */
      text-align: center;
      /* Centering the text */
      height: 40px;
      transition: all 0.2s ease;
    }

    .textfield:hover {
      box-shadow: 0 0 0 0 #fff inset, #1de9b6 0 0 0 2px;
    }

    .textfield:focus {
      background: #fff;
      outline: 0;
      box-shadow: 0 0 0 0 #fff inset, #1de9b6 0 0 0 3px;
    }
  </style>
</head>

<body>
  <?php

  $id_pro = $_GET["id_pro"];
  $sqle = "SELECT * FROM product WHERE id_pro ='$id_pro'";
  $resulte = mysqli_query($conn, $sqle);
  $rowe = mysqli_fetch_assoc($resulte);
  ?>
  <div class="overlay" data-overlay></div>
  <!--
    - HEADER
  -->

  <header>
    <div class="header-main">

      <div class="container">
        <div class="header-user-actions">

          <button class="action-btn" onclick="showPopup()">
            <lord-icon src="https://cdn.lordicon.com/hrjifpbq.json" trigger="hover"
              style="width:50px;height:50px"></lord-icon>
          </button>


        </div>
        <a href="index_user.php" class="header-logo hn">
          GUNDAM HOBBY SHOP
        </a>

        <div class="header-user-actions">
          <a href="Cart.php" class="action-btn">
            <lord-icon src="https://cdn.lordicon.com/mfmkufkr.json" trigger="hover"
              style="width:50px;height:50px"></lord-icon>
          </a>


        </div>

      </div>

    </div>

  </header>

  <!--
    - MAIN
  -->

  <marquee direction="right">Order from Thailand for free - genuine from Japan - definitely no cheating on prices.
  </marquee>
  <br>
  <main>
    <article>

      <!-- 
- #PRODUCT
-->
      <br><br><br><br>
      <form method="post">
        <section class="section product" aria-label="product">
          <div class="container">

            <div class="product-slides">

              <div class="slider-banner" data-slider>
                <figure class="product-banner">
                  <img src="uploads/<?php echo $rowe["picpro"]; ?>" width="600" height="600" loading="lazy"
                    alt="Nike Sneaker" class="img-cover">
                  <input type="hidden" name="picpro" value="<?php echo $rowe["picpro"]; ?>">
                </figure>

              </div>

              <button class="slide-btn prev" aria-label="Previous image" data-prev>
              </button>

              <button class="slide-btn next" aria-label="Next image" data-next>

              </button>

            </div>

            <div class="product-content">

              <p class="product-subtitle">
                <?php echo $rowe["grade"] ?>
                <input type="hidden" name="grade" value="<?php echo $rowe["grade"]; ?>">
                <input type="hidden" name="id_pro" value="<?php echo $rowe["id_pro"]; ?>">
              </p>

              <h1 class="h1 product-title">
                <?php echo $rowe["namepro"] ?>
                <input type="hidden" name="namepro" value="<?php echo $rowe["namepro"]; ?>">
              </h1>

              <p class="product-text">
                <?php echo $rowe["detailpro"] ?>
              </p>

              <div class="wrapper">

                <span class="price">
                  <?php echo $rowe["price"] ?> Bath
                  <input type="hidden" name="price" value="<?php echo $rowe["price"]; ?>">
                </span>

                <span class="badge">
                  <?php echo $rowe["discount"] ?>%
                  <input type="hidden" name="discount" value="<?php echo $rowe["discount"]; ?>">
                </span>


              </div>

              <div class="btn-group">

                <div class="counter-wrapper">

                  <input type="text" name="order_q" class="textfield" placeholder="Enter Number!" pattern="\d+" value="1"
                    required>

                </div>

                <button class="cart-btn" type="submit" name="add_pro">
                  <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                  <span class="span">Add to cart</span>
                </button>

              </div>

            </div>

          </div>
        </section>
      </form>
    </article>
  </main>

  <script src="./assets/js/script.js"></script>
  <script src="assets/js/script_v.js"></script>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>