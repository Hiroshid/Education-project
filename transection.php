<?php
session_start();
?>
<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="img_gundam/GUNDAM HOBBY SHOP.ico" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,700&display=swap" rel="stylesheet">

  <title>Transection</title>
  <style>
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .icon-container {
      display: flex;
      flex-direction: column;
      /* เพิ่มบรรทัดนี้เพื่อให้ icon-container เรียงตัวตามคอลัมน์ */
      align-items: center;
    }

    .kani {
      font-family: "Kanit", sans-serif;
      font-weight: 700;
      font-style: italic;
      font-size: 80px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="icon-container">
      <lord-icon src="https://cdn.lordicon.com/hsrrkevt.json" trigger="loop"
        colors="primary:#ebe6ef,secondary:#3a3347,tertiary:#00d1ff,quaternary:#646e78" style="width:280px;height:280px">
      </lord-icon>
      <div class="text-container">
        <span class="kani">
        <p>✓ CHECKOUT COMPLETE ✓</p>
      </span>
      </div>
    </div>
  </div>
  <script src="https://cdn.lordicon.com/lordicon.js"></script>
  <script>
    setTimeout(function () {
      window.location.href = "index_user.php"; // เปลี่ยน URL นี้เป็น URL ของหน้าเว็บที่คุณต้องการไป
    }, 3000);
  </script>
</body>

</html>