<?php
include 'connection.php';

if (isset($_GET['id_pro'])) {
    $id_pro = $_GET['id_pro'];

    // Delete the product from the database
    $delete_sql = "DELETE FROM product WHERE id_pro = $id_pro";
    mysqli_query($conn, $delete_sql);

    // Redirect back to the admin page after deletion
    header('Location: View_admin_form.php');
    exit();
}
?>
