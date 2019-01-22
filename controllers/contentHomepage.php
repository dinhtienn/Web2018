<?php
    require_once 'connectDB.php';
    function fetchData($query) {
        global $conn;
        $all_data = mysqli_query($conn, $query);
        $list_data = array();
        while ($result = mysqli_fetch_object($all_data)) {
            array_push($list_data, $result);
        }
        return $list_data;
    }

    $data = array();
    if (isset($_GET['subjectId'])) {
        $subject_id = $_GET['subjectId'];
        $query = "
            SELECT posts.id, title, view_num, like_num, content, fullname, classes.class, subjects.subject
            FROM users, subjects, classes, posts
            WHERE users.id = posts.user_id AND
            classes.id = subjects.class_id AND
            subjects.id = posts.subject_id AND 
            subjects.id = '$subject_id'
            LIMIT 6
        ";
        $data = fetchData($query);
        echo json_encode($data);
    }
    mysqli_close($conn);