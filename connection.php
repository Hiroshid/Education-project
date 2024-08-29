<?php
    
    $conn = mysqli_connect('localhost', 'root', '', 'dbno012');

    if (!$conn) {
        die("Failed to connect" . mysqli_connect_error());
    }