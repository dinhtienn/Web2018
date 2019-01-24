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

    // Lấy dữ liệu Page hiện ra
    if (isset($_GET['class']) && isset($_GET['subject'])) {
        if ($_GET['class'] == 'Mới nhất') {
            $query_posts = "
                SELECT posts.id, title, view_num, like_num, content, fullname, classes.class, subjects.subject
                FROM users, subjects, classes, posts
                WHERE users.id = posts.user_id AND
                classes.id = subjects.class_id AND
                subjects.id = posts.subject_id
                LIMIT 27
            ";
        } else {
            $class = $_GET['class'];
            $subject = $_GET['subject'];
            $query_posts = "
                SELECT posts.id, title, view_num, like_num, content, fullname, classes.class, subjects.subject
                FROM users, subjects, classes, posts
                WHERE users.id = posts.user_id AND
                classes.id = subjects.class_id AND
                subjects.id = posts.subject_id AND 
                classes.class = '$class' AND 
                subjects.subject = '$subject' 
            ";
        }
    } elseif (isset($_GET['class'])) {
        $class = $_GET['class'];
        $query_posts = "
            SELECT posts.id, title, view_num, like_num, content, fullname, classes.class, subjects.subject
            FROM users, subjects, classes, posts
            WHERE users.id = posts.user_id AND
            classes.id = subjects.class_id AND
            subjects.id = posts.subject_id AND 
            classes.class = '$class'
        ";
    }

    require_once 'navigation.php';
    require_once 'footer.php';
    require_once 'advertiments.php';
    $all_posts = fetchData($query_posts);
    mysqli_close($conn);