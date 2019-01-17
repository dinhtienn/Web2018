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

    // Lấy dữ liệu Page hiện ra
    if (isset($_GET['class']) && isset($_GET['subject'])) {
        $class = $_GET['class'];
        $subject = $_GET['subject'];
        // Query dữ liệu từ MySQL
        $class = "'$class'";
        $subject = "'$subject'";
        $query = "
            SELECT posts.id, title, view_num, like_num, content, fullname, classes.class, subjects.subject
            FROM users, subjects, classes, posts
            WHERE users.id = posts.user_id AND
            classes.id = subjects.class_id AND
            subjects.id = posts.subject_id AND 
            classes.class = $class AND 
            subjects.subject = $subject 
        ";
    } elseif (isset($_GET['class'])) {
        $class = $_GET['class'];
        // Query dữ liệu từ MySQL
        $class = "'$class'";
        $query = "
            SELECT posts.id, title, view_num, like_num, content, fullname, classes.class, subjects.subject
            FROM users, subjects, classes, posts
            WHERE users.id = posts.user_id AND
            classes.id = subjects.class_id AND
            subjects.id = posts.subject_id AND 
            classes.class = $class
        ";
    }

    $full_info = mysqli_query($conn, $query);
    $all_post = array();
    while ($data = mysqli_fetch_object($full_info)) {
        array_push($all_post, $data);
    }

    $all_subject = fetchAllData("subjects");
    $all_class = fetchAllData("classes");
    $all_ad = fetchAllData("advertiments");

    mysqli_close($conn);
?>