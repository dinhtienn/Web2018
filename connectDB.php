<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'miny';

    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    if (!$conn) {
        echo "Kết nối Database không thành công";
    } else {
        mysqli_set_charset($conn,"utf8");
    }
