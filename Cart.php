<?php
session_start();
include 'connection.php';
// ปุ่มนำออกจาก ตะกล้าสินค้า 
//unset($_SESSION["shopping_pro"]);

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
    header("location:Cart.php");
}
// ปุ่มนำออกจาก ตะกล้าสินค้า 


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
                    header("location:transection.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img_gundam/GUNDAM HOBBY SHOP.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/stylebutton2.css">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <style>
        body {
            background: #4CB9E7;
            background: -webkit-linear-gradient(to right, #4CB9E7, #3559E0);
            background: linear-gradient(to right, #4CB9E7, #3559E0);
            min-height: 100vh;
        }
    </style>
    <title>Cart</title>
</head>

<body>

    <div class="px-4 px-lg-0">
        <!-- For demo purpose -->
        <div class="container text-white py-5 text-center">
            <h1 class="display-4">Gundam Hooby Shop <br>shopping cart</h1><br>
            <a href="index_user.php" class="btn btn-three">
                <h2> <- GO Back Shopping</h2>
            </a>
            </p>
        </div>
        <!-- End -->
        <div class="pb-5">
            <?php if (!empty($_SESSION["shopping_pro"])) { ?>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                            <!-- Shopping cart table -->
                            <div class="table-responsive">
                                <table class="table"> *The price shown is the price that includes the quantity of the product minus the discount.*<br>
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="p-2 px-3 text-uppercase">Product</div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Price</div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Quantity</div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Remove</div>
                                            </th>
                                        </tr>

                                    </thead>
                                    <?php $total = 0;
                                    foreach ($_SESSION["shopping_pro"] as $key => $value) { ?>

                                        <tbody>
                                            <tr>
                                                <th scope="row" class="border-0">
                                                    <div class="p-2">
                                                        <img src="uploads/<?php echo $value["picpro"]; ?>" alt="" width="70"
                                                            class="img-fluid rounded shadow-sm">
                                                        <div class="ml-3 d-inline-block align-middle">
                                                            <h5 class="mb-0"> <a href="#"
                                                                    class="text-dark d-inline-block align-middle">
                                                                    <?php echo $value["grade"]; ?>
                                                                </a></h5><span
                                                                class="text-muted font-weight-normal font-italic d-block">
                                                                <?php echo $value["namepro"]; ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </th>
                                                <?php
                                                $pricenew = $value["price"] - ($value["price"] * $value["discount"] / 100);
                                                $total = $total + ($pricenew * $value["order_q"]);
                                                ?>
                                                <td class="border-0 align-middle"><strong>
                                                        <?php echo $pricenew * $value["order_q"]; ?> Bath
                                                    </strong></td>
                                                <td class="border-0 align-middle"><strong>
                                                        <?php echo $value["order_q"]; ?>
                                                    </strong></td>

                                                <td class="border-0 align-middle"><a
                                                        href="Cart.php?action=delete&id_pro=<?php echo $value['id_pro']; ?>"
                                                        class="text-dark"><lord-icon
                                                            src="https://cdn.lordicon.com/skkahier.json" trigger="hover"
                                                            style="width:50px;height:50px">
                                                        </lord-icon></a></td>
                                            </tr>

                                        </tbody>
                                    <?php } ?>

                                </table>
                            </div>

                            <!-- End -->
                        </div>
                    </div>

                    <div class="row py-5 p-4 bg-white rounded shadow-sm">
                        <div class="col-lg-6">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Please Enter
                                Address</div>
                            <div class="p-4">
                                <p class="font-italic mb-4">Please enter your address in the gap</p>
                                <textarea name="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary
                            </div>
                            <div class="p-4">
                                <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you
                                    have entered.</p>
                                <ul class="list-unstyled mb-4">
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                            class="text-muted">Order Subtotal </strong><strong>
                                            <?php echo number_format($total, 2); ?>
                                        </strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                            class="text-muted">Total</strong>
                                        <h5 class="font-weight-bold">
                                            <?php echo number_format($total, 2); ?>
                                        </h5>
                                    </li>
                                </ul>
                                <form method="post" action="Cart.php?action=order">
                                    <input type="hidden" name="money_order" value="<?php echo $total; ?>">
                                    <button type="submit" class="btn btn-dark rounded-pill py-2 btn-block">CHECKOUT</button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>
    </div>



</body>

</html>