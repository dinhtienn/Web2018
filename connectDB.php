<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'miny';

    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    mysqli_set_charset($conn,"utf8");
?>