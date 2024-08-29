<?php
session_start();
include('connection.php');

if (isset($_POST['submit'])) {


    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "SELECT COUNT(email) AS count_email FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row['count_email'] == 0) {
        $query = "INSERT INTO users (firstname, tel, email, password, status) VALUES ('$firstname', '$tel', '$email', '$hash', 'U')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('Register Complete'); window.location.href = 'regis_login.php';</script>";
        } else {
            $_SESSION['err_query'] = "query ผิดพลาด";
            echo "<script>alert('pass not correct'); window.location.href = 'regis_login.php';</script>";
        }
    } else {
        $_SESSION['exist_email'] = "มีอีเมลนี้ในระบบ";
        echo "<script>alert('There is this email in the system.'); window.location.href = 'regis_login.php';</script>";
    }
}