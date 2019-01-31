<?php
    require_once '../connectDB.php';
    function fetchData($query) {
        global $conn;
        $all_data = mysqli_query($conn, $query);
        $list_data = array();
        while ($result = mysqli_fetch_object($all_data)) {
            array_push($list_data, $result);
        }
        return $list_data;
    }

    if (isset($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        $query = "
            SELECT * FROM posts WHERE title like '%$keyword%'
        ";
        $data = fetchData($query);
        if ($data) {
            echo json_encode($data);
        }
    }

    mysqli_close($conn);