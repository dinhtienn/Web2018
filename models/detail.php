<?php
    require_once 'connectDB.php';
    // Hàm láy toàn bộ Data từ một bảng cụ thể
    function fetchAllData($obj) {
        global $conn;
        $all_data = mysqli_query($conn,"SELECT * FROM $obj");
        $list_data = array();
        while ($result = mysqli_fetch_object($all_data)) {
            array_push($list_data, $result);
        }
        return $list_data;
    }

    // Query dữ liệu từ MySQL
    // Hàm Fetch dữ liệu về
    function fetchData($query) {
        global $conn;
        $full_info = mysqli_query($conn, $query);
        $result = array();
        while ($data = mysqli_fetch_object($full_info)) {
            array_push($result, $data);
        }
        return $result;
    }
    // Lấy ra Post Detail
    if (isset($_GET['post'])) {
        $post_id = $_GET['post'];
        $post_id = "'$post_id'";
        $query_detail = "
            SELECT posts.id, title, view_num, like_num, content, fullname, classes.class, subjects.subject
            FROM users, subjects, classes, posts
            WHERE users.id = posts.user_id AND
            classes.id = subjects.class_id AND
            subjects.id = posts.subject_id AND 
            posts.id = $post_id
        ";
    }
    $post = fetchData($query_detail)[0];

    // Lấy dữ liệu cho phần Related
    $subject = "'$post->subject'";
    $class = "'$post->class'";
    $query_related = "
        SELECT posts.id, title, view_num, like_num, content, fullname, classes.class, subjects.subject
        FROM users, subjects, classes, posts
        WHERE users.id = posts.user_id AND
        classes.id = subjects.class_id AND
        subjects.id = posts.subject_id AND 
        classes.class = $class AND 
        subjects.subject = $subject AND 
        posts.id != $post_id
    ";

    // Lấy dữ liệu cho phần morePost
    $query_more_post = "
        SELECT posts.id, title, view_num, like_num, content, fullname, classes.class, subjects.subject
        FROM users, subjects, classes, posts
        WHERE users.id = posts.user_id AND
        classes.id = subjects.class_id AND
        subjects.id = posts.subject_id AND 
        classes.class = $class AND 
        posts.id != $post_id
    ";

    $data_related = fetchData($query_related);
    $data_more_post = fetchData($query_more_post);
    $all_subject = fetchAllData("subjects");
    $all_class = fetchAllData("classes");
    $all_ad = fetchAllData("advertiments");

    mysqli_close($conn);
?>