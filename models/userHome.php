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

    require_once 'navigation.php';
    require_once 'footer.php';
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        $query_user = "
            SELECT * FROM users WHERE username = '$username'
        ";
        $user = fetchData($query_user)[0];

        $query_posts = "
            SELECT posts.id, title, classes.class, subjects.subject, view_num, like_num, content
            FROM posts, classes, subjects
            WHERE posts.subject_id = subjects.id AND
            subjects.class_id = classes.id AND
            posts.user_id = $user->id
        ";
        $all_posts = fetchData($query_posts);
    }