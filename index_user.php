<?php
include 'connection.php';
session_start();
$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['logout'])) {
  unset($_SESSION['firstname']);
  session_destroy();
  header("Location: regis_login.php");
  exit();
}
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
  <link rel="shortcut icon" href="img_gundam/GUNDAM HOBBY SHOP.ico" type="image/x-icon">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/style_load.css">
  <script src="./assets/js/script_load.js"></script>
  <script src="https://cdn.lordicon.com/lordicon.js"></script>


  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
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
  </style>
</head>

<body>

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

    <nav class="desktop-navigation-menu">

      <div class="container">

        <ul class="desktop-menu-category-list">

          <li class="menu-category">
            <a href="index_user.php" class="menu-title">Home</a>
          </li>

          <li class="menu-category">
            <a href="#section-1" class="menu-title">Best Product</a>
          </li>

          <li class="menu-category">
            <a href="#section-2" class="menu-title">Blog</a>
          </li>

          <li class="menu-category">
            <a href="Shop.php" class="menu-title">All Product</a>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Account</a>

            <ul class="dropdown-list">

              <li class="dropdown-item">
                <a><ion-icon name="checkmark-circle-outline"></ion-icon>Already logged in </a>
              </li>

              <form method="post" >

                <button class="dropdown-item" type="submit" name="logout">
                  <a>Logout</a>
                </button>

              </form>


            </ul>
          </li>
        </ul>

      </div>

    </nav>

  </header>





  <!--
    - MAIN
  -->

  <marquee direction="right">Order from Thailand for free - genuine from Japan - definitely no cheating on prices.
  </marquee>
  <br>
  <main>

    <!--
      - BANNER
    -->

    <?php
    include 'connection.php';

    // สมมติว่าคุณมีตารางสินค้าชื่อว่า 'product'
    $product_id_to_display = 20; // เปลี่ยนเลขนี้เป็น ID ของสินค้าที่คุณต้องการแสดง
    
    $sqlb = "SELECT * FROM product WHERE id_pro = $product_id_to_display";
    $resultb = mysqli_query($conn, $sqlb);

    ?>
    <?php
    include 'connection.php';

    // สมมติว่าคุณมีตารางสินค้าชื่อว่า 'product'
    $product_id_to_display = 19; // เปลี่ยนเลขนี้เป็น ID ของสินค้าที่คุณต้องการแสดง
    
    $sqlba = "SELECT * FROM product WHERE id_pro = $product_id_to_display";
    $resultba = mysqli_query($conn, $sqlba);

    ?>
    <div class="banner">

      <div class="container">

        <div class="slider-container has-scrollbar">

          <div class="slider-item">

            <img src="banner/BMSF.jpg" alt="women's latest fashion sale" class="banner-img">

            <div class="banner-content">

              <p class="banner-subtitle">High Grade</p>

              <h2 class="banner-title">ZGMF/A262PD-P<br>Mighty Strike Freedom Gundam</h2>
              <?php while ($rowb = mysqli_fetch_assoc($resultb)) { ?>

                <a href="View.php?id_pro=<?php echo $rowb["id_pro"]; ?>" class="banner-btn">Watch Now</a>
              <?php } ?>
            </div>

          </div>
          <div class="slider-item">

            <img src="banner/BIJ2.jpg" alt="women's latest fashion sale" class="banner-img">

            <div class="banner-content">

              <p class="banner-subtitle">High Grade</p>

              <h2 class="banner-title">ZGMF-X191M2<br>Infinite Justice Gundam TypeII</h2>

              <?php while ($rowba = mysqli_fetch_assoc($resultba)) { ?>

                <a href="View.php?id_pro=<?php echo $rowba["id_pro"]; ?>" class="banner-btn">Watch Now</a>
              <?php } ?>

            </div>

          </div>

        </div>

      </div>

    </div>


    <!--
      - PRODUCT
    -->

    <div class="product-container">

      <div class="container">


        <!--
          - SIDEBAR
        -->

        <?php
        include 'connection.php';

        $num_of_products_to_display = 4;


        $sqlw = "SELECT * FROM product LIMIT $num_of_products_to_display";
        $resultw = mysqli_query($conn, $sqlw);

        ?>

        <div class="sidebar  has-scrollbar" data-mobile-menu>


          <div class="sidebar-category">

            <div class="sidebar-top">
              <h2 class="sidebar-title">Popular</h2>

              <button class="sidebar-close-btn" data-mobile-menu-close-btn>
                <ion-icon name="close-outline"></ion-icon>
              </button>
            </div>
            <?php while ($roww = mysqli_fetch_assoc($resultw)) { ?>
              <div class="showcase">

                <a href="View.php?id_pro=<?php echo $roww["id_pro"]; ?>" class="showcase-img-box">
                  <img src="uploads/<?php echo $roww["picpro"]; ?>" width="75" height="75" class="showcase-img">
                </a>

                <div class="showcase-content">

                  <a href="View.php?id_pro=<?php echo $roww["id_pro"]; ?>">
                    <h4 class="showcase-title">
                      <?php echo $roww["namepro"] ?>
                    </h4>
                  </a>

                  <div class="price-box">
                    <!--<del>$5.00</del>-->
                    <p class="price">
                      <?php echo $roww["price"] ?> bath
                    </p>
                  </div>

                </div>

              </div>
            <?php } ?>
          </div>


        </div>



        <div class="product-box">
          <!--
            - PRODUCT FEATURED
          -->

          <?php
          include 'connection.php';

          // สมมติว่าคุณมีตารางสินค้าชื่อว่า 'product'
          $product_id_to_display = 21; // เปลี่ยนเลขนี้เป็น ID ของสินค้าที่คุณต้องการแสดง
          
          $sqls = "SELECT * FROM product WHERE id_pro = $product_id_to_display";
          $results = mysqli_query($conn, $sqls);

          ?>
          <section id="section-1">
            <div class="product-featured">

              <h2 class="title">Best selling products</h2>

              <div class="showcase-wrapper has-scrollbar">

                <div class="showcase-container">
                  <?php while ($rows = mysqli_fetch_assoc($results)) { ?>

                    <div class="showcase">

                      <div class="showcase-banner">
                        <img src="uploads/<?php echo $rows["picpro"]; ?>" alt="shampoo, conditioner & facewash packs"
                          class="showcase-img">
                      </div>

                      <div class="showcase-content">
                        <a href="#">
                          <h3 class="showcase-title">
                            <?php echo $rows["grade"] ?> form Chinese <br>
                            YB-02
                            <?php echo $rows["namepro"] ?>
                          </h3>
                        </a>
                        <br>
                        <p class="showcase-desc">
                          <?php echo $rows["detailpro"] ?>
                        </p>
                        <br>
                        <div class="price-box">
                          <p class="price">
                            <?php echo $rows["price"] ?> Bath
                          </p>
                        </div>

                        <a href="View.php?id_pro=<?php echo $rows["id_pro"]; ?>" class="edit-link">
                          <button class="add-cart-btn">add to cart</button>
                        </a>

                      </div>

                    </div>
                  <?php } ?>

                </div>

              </div>

            </div>
          </section>




          <!--
            - PRODUCT GRID
          -->
          <?php
          include 'connection.php';

          $num_of_products_to_display = 10;


          $sqlg = "SELECT * FROM product LIMIT $num_of_products_to_display";
          $resultg = mysqli_query($conn, $sqlg);

          ?>

          <div class="product-main">

            <h2 class="title">New Products</h2>

            <div class="product-grid">


              <?php foreach ($resultg as $rowg) { ?>

                <div class="showcase">

                  <div class="showcase-banner">

                    <a href="View.php?id_pro=<?php echo $rowg["id_pro"]; ?>">
                      <img src="uploads/<?php echo $rowg["picpro"]; ?>" alt="Mens Winter Leathers Jackets" width="300"
                        class="product-img default">
                      <img src="uploads/<?php echo $rowg["picpro"]; ?>" alt="Mens Winter Leathers Jackets" width="300"
                        class="product-img hover">
                    </a>

                    <p class="showcase-badge">15%</p>

                    <div class="showcase-actions">

                      <a href="View.php?id_pro=<?php echo $rowg["id_pro"]; ?>">

                        <button class="btn-action">
                          <ion-icon name="eye-outline"></ion-icon>
                        </button>
                      </a>

                    </div>

                  </div>

                  <div class="showcase-content">

                    <a href="View.php?id_pro=<?php echo $rowg["id_pro"]; ?>" class="showcase-category">
                      <?php echo $rowg["grade"] ?>
                    </a>

                    <a href="View.php?id_pro=<?php echo $rowg["id_pro"]; ?>">
                      <h3 class="showcase-title">
                        <?php echo $rowg["namepro"] ?>
                      </h3>
                    </a>

                    <div class="price-box">
                      <p class="price">
                        <?php echo $rowg["price"] ?> Bath
                      </p>
                      <!--<del>$75.00</del>-->
                    </div>

                  </div>

                </div>
              <?php } ?>




            </div>

          </div>


        </div>

      </div>

    </div>




    <section id="section-2">
      <!--
      - TESTIMONIALS, CTA & SERVICE
    -->

      <div>

        <div class="container">

          <div class="testimonials-box">

            <!--
            - TESTIMONIALS
          -->

            <div class="testimonial">

              <h2 class="title">Information</h2>

              <div class="testimonial-card">

                <img src="Gundam.svg" alt="alan doe" class="testimonial-banner" width="140" height="140">

                <p class="testimonial-name">Gundam Hobby Shop</p>

                <p class="testimonial-title">Follow news and new products at we!</p>

                <p class="testimonial-title">Youtube: GundamInfo Channel</p>

                <p class="testimonial-title">Facebook: Bandai Hobby Thailand </p>



              </div>

            </div>



            <!--
            - CTA
          -->

            <div class="cta-container"> Summer collection<br><br>

              <img src="./img_gundam/image cat.jpg" alt="summer collection" class="cta-banner"
                style="height: 500px; width: 3 00px;">

              <a href="#" class="cta-content">

                <p class="discount">15% Discount</p>

                <h2 class="cta-title">Summer collection</h2>

                <p class="cta-text">Throughout this month</p>


              </a>

            </div>



            <!--
            - SERVICE
          -->

            <div class="service">

              <h2 class="title">Our Services</h2>

              <div class="service-container">

                <a href="#" class="service-item">

                  <div class="service-icon">
                    <lord-icon src="https://cdn.lordicon.com/hsrrkevt.json" trigger="hover"
                      colors="primary:#ebe6ef,secondary:#3a3347,tertiary:#66d7ee,quaternary:#646e78"
                      style="width:40px;height:40px">
                    </lord-icon>
                  </div>

                  <div class="service-content">

                    <h3 class="service-title">Delivery all over Thailand</h3>
                    <p class="service-desc">Free Delivery</p>

                  </div>

                </a>

                <a href="#" class="service-item">

                  <div class="service-icon">
                    <lord-icon src="https://cdn.lordicon.com/sbrtyqxj.json" trigger="hover" colors="primary:#66d7ee"
                      style="width:40px;height:40px">
                    </lord-icon>
                  </div>

                  <div class="service-content">

                    <h3 class="service-title">Next Day delivery</h3>
                    <p class="service-desc">TH Orders Only</p>

                  </div>

                </a>

                <a href="#" class="service-item">

                  <div class="service-icon">
                    <lord-icon src="https://cdn.lordicon.com/srsgifqc.json" trigger="hover" colors="primary:#00d1ff"
                      style="width:40px;height:40px">
                    </lord-icon>
                  </div>

                  <div class="service-content">

                    <h3 class="service-title">Best Online Support</h3>
                    <p class="service-desc">Hours: 8AM - 16PM</p>

                  </div>

                </a>

                <a href="#" class="service-item">

                  <div class="service-icon">
                    <lord-icon src="https://cdn.lordicon.com/osexyosf.json" trigger="hover"
                      style="width:40px;height:40px">
                    </lord-icon>
                  </div>

                  <div class="service-content">

                    <h3 class="service-title">Return Policy</h3>
                    <p class="service-desc">Will not accept returns.</p>

                  </div>

                </a>

                <a href="#" class="service-item">

                  <div class="service-icon">
                    <lord-icon src="https://cdn.lordicon.com/fnxnvref.json" trigger="hover" colors="primary:#00d1ff"
                      style="width:40px;height:40px">
                    </lord-icon>
                  </div>

                  <div class="service-content">

                    <h3 class="service-title">Discount</h3>
                    <p class="service-desc">All Order discount 15%</p>

                  </div>

                </a>

              </div>

            </div>

          </div>

        </div>

      </div>
    </section>
  </main>




  <!--
    - FOOTER
  -->

  <footer>

    <div class="footer-bottom">

      <div class="container">

        <p class="copyright">
          Payment Method
        </p>
        <br>
        <lord-icon src="https://cdn.lordicon.com/xuyycdjx.json" trigger="hover" alt="Credit Card"
          colors="primary:#ffffff" style="width:30px;height:30px">
        </lord-icon>
        &nbsp;
        <lord-icon src="https://cdn.lordicon.com/gjjvytyq.json" trigger="hover" colors="primary:#ffffff"
          style="width:30px;height:30px">
        </lord-icon>

        <p class="copyright">
          Copyright &copy; <a href="#">Gundam Hobby Shop</a> all rights reserved.
        </p>

      </div>

    </div>

  </footer>
  <div class="loader"></div>

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