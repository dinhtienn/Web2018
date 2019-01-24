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

    require_once 'navigation.php';
    require_once 'footer.php';
    require_once 'advertiments.php';
    $data_related = fetchData($query_related);
    $data_more_post = fetchData($query_more_post);

    mysqli_close($conn);
