<?php
    require_once 'connectDB.php';
    function fetchAllData($obj) {
        global $conn;
        $all_data = mysqli_query($conn,"SELECT * FROM $obj");
        $list_data = array();
        while ($result = mysqli_fetch_object($all_data)) {
            array_push($list_data, $result);
        }
        return $list_data;
    }

    // Lấy ra mảng post với thông tin đầy đủ
    $query = "
        SELECT posts.id, title, view_num, like_num, content, fullname, classes.class, subjects.subject
        FROM users, subjects, classes, posts
        WHERE users.id = posts.user_id AND
        classes.id = subjects.class_id AND
        subjects.id = posts.subject_id
    ";
    $full_info = mysqli_query($conn, $query);
    $all_post = array();
    while ($data = mysqli_fetch_object($full_info)) {
        array_push($all_post, $data);
    }
    $all_subject = fetchAllData("subjects");
    $all_class = fetchAllData("classes");
    $list_class = array("Mới nhất", "lớp 9", "lớp 8");

    mysqli_close($conn);
?>