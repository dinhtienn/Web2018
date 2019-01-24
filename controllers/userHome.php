<?php
    // Xử lý dữ liệu cho phần Navigation
    require_once 'navigation.php';

    // Xử lý dữ liệu cho phần Footer
    require_once 'footer.php';

    // Xử lý dữ liệu thông tin người dùng
    $number_of_posts = sizeof($all_posts);
    $view_number = 0;
    $like_number = 0;
    foreach ($all_posts as $post) {
        $view_number += $post->view_num;
        $like_number += $post->like_num;
    }

    $list_info['Tên tài khoản'] = $user->username;
    $list_info['Tên đầy đủ'] = $user->fullname;
    $list_info['Tổng số bài viết'] = $number_of_posts;
    $list_info['Tổng lượt xem'] = $view_number;
    $list_info['Tổng lượt thích'] = $like_number;

    // Xử lý đăng bài
    function fetchOneData($query) {
        global $conn;
        $info = mysqli_query($conn, $query);
        $data = mysqli_fetch_object($info);
        return $data;
    }

    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $class = $_POST['class'];
        $subject = $_POST['subject'];
        $content = $_POST['content'];
        $username = $_SESSION['username'];

        $query_user = "
                    SELECT * FROM users WHERE username = '$username'
                ";
        $query_class = "
                    SELECT * FROM classes WHERE class = '$class'
                ";

        $user = fetchOneData($query_user);
        $class = fetchOneData($query_class);

        if ($user) {
            $user_id = $user->id;
        } else {
            echo "
                <script>
                    alert('Tài khoản không tồn tại');
                </script>
            ";
        }

        if ($class) {
            $class_id = $class->id;
        } else {
            echo "
                <script>
                    alert('Tên lớp không thỏa mãn');
                </script>
            ";
        }

        $query_subject = "
                    SELECT * FROM subjects WHERE class_id = '$class_id' AND subject = '$subject'
                ";

        $subject = fetchOneData($query_subject);

        if ($subject) {
            $subject_id = $subject->id;
        } else {
            echo "
                <script>
                    alert('Tên chủ đề không thỏa mãn');
                </script>
            ";
        }

        $query_createPost = "
                    INSERT INTO posts(title, user_id, subject_id, content) VALUES ('$title', $user_id, $subject_id, '$content')
                ";

        $create = mysqli_query($conn, $query_createPost);
        if ($create) {
            echo '
                <script>
                    alert("Đăng bài viết thành công")
                </script>
            ';
            header('location: userHome.php');
        } else {
            echo '
                <script>
                    alert("Đăng bài viết không thành công")
                </script>
            ';
        }
    }

    // Xử lý cập nhật bài viết
    if ( isset($_GET['update']) ) {
        $post_id = $_GET['update'];
        $query_update_post = "
                SELECT posts.id, title, classes.class, subjects.subject, content
                FROM posts, classes, subjects
                WHERE posts.subject_id = subjects.id AND
                subjects.class_id = classes.id AND
                posts.id = $post_id
            ";
        $post = fetchOneData($query_update_post);
        if (!$post) {
            echo "
                <script>
                    alert('Không tìm thấy bài viết!');
                </script>
            ";
        }
        if (isset($_POST['submitUpdate'])) {
            $title = $_POST['title'];
            $class = $_POST['class'];
            $subject = $_POST['subject'];
            $content = $_POST['content'];
            $query_class = "
                SELECT * FROM classes WHERE class = '$class'
            ";

            $class = fetchOneData($query_class);
            if ($class) {
                $class_id = $class->id;
            } else {
                echo "
                    <script>
                        alert('Tên lớp không thỏa mãn');
                    </script>
                ";
            }

            $query_subject = "
                SELECT * FROM subjects WHERE class_id = '$class_id' AND subject = '$subject'
            ";
            $subject = fetchOneData($query_subject);
            if ($subject) {
                $subject_id = $subject->id;
            } else {
                echo "
                    <script>
                        alert('Tên chủ đề không thỏa mãn');
                    </script>
                ";
            }

            $query_update = "
                UPDATE posts SET title = '$title', subject_id = $subject_id, content = '$content'
                WHERE id = $post_id
            ";
            $update = mysqli_query($conn, $query_update);
            if ($update) {
                header('location: userHome.php');
            } else {
                echo "
                    <script>
                        alert('Cập nhật không thành công');
                    </script>
                ";
            }
        }
    }

    mysqli_close($conn);