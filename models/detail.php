<?php
    require_once 'connectDB.php';
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
    $query_related = "
        SELECT posts.id, title, view_num, like_num, content, fullname, classes.class, subjects.subject
        FROM users, subjects, classes, posts
        WHERE users.id = posts.user_id AND
        classes.id = subjects.class_id AND
        subjects.id = posts.subject_id AND 
        classes.class = '$post->class' AND 
        subjects.subject = '$post->subject' AND 
        posts.id != $post_id
    ";

    // Lấy dữ liệu cho phần morePost
    $query_more_post = "
        SELECT posts.id, title, view_num, like_num, content, fullname, classes.class, subjects.subject
        FROM users, subjects, classes, posts
        WHERE users.id = posts.user_id AND
        classes.id = subjects.class_id AND
        subjects.id = posts.subject_id AND 
        classes.class = '$post->class' AND 
        posts.id != $post_id
    ";

    $query_classes = "SELECT * FROM classes";

    $query_subjects = "
        SELECT subjects.id, subject, classes.class
        FROM subjects, classes
        WHERE subjects.class_id = classes.id
    ";

    $query_ads = "
        SELECT * FROM advertiments
    ";

    $data_related = fetchData($query_related);
    $data_more_post = fetchData($query_more_post);
    $all_classes = fetchData($query_classes);
    $all_subjects = fetchData($query_subjects);
    $all_ads = fetchData($query_ads);

    mysqli_close($conn);
