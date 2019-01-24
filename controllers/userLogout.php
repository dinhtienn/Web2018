<?php
    session_start();

    if (isset($_SESSION['username'])) {
        unset($_SESSION['username']);
        header('location: ../homepage.php');
    } else {
        header('location: ../homepage.php');
    }