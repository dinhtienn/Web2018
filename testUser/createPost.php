<?php
    session_start();
    require_once '../connectDB.php';
    if (isset($_SESSION['username'])) {
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $class = $_POST['class'];
            $subject = $_POST['subject'];
            $content = $_POST['content'];
            $username = $_SESSION['username'];
            $query_user = "
                SELECT * FROM users WHERE username = '$username'
            ";
            $data_user = mysqli_query($conn, $query_user);
            $user = mysqli_fetch_object($data_user);
            $user_id = $user->id;
            $query_class = "
                SELECT * FROM classes WHERE class = '$class'
            ";
            $data_class = mysqli_query($conn, $query_class);
            $class = mysqli_fetch_object($data_class);
            if ($class) {
                $class_id = $class->id;
            } else {
                echo "Tên lớp không thỏa mãn";
            }
            $query_subject = "
                SELECT * FROM subjects WHERE class_id = '$class_id' AND subject = '$subject'
            ";
            $data_subject = mysqli_query($conn, $query_subject);
            $subject = mysqli_fetch_object($data_subject);
            if ($subject) {
                $subject_id = $subject->id;
            } else {
                echo "Tên chủ đề không thỏa mãn";
            }
            $query_createPost = "
                INSERT INTO posts(title, user_id, subject_id, content) VALUES ('$title', $user_id, $subject_id, '$content')
            ";
            $create = mysqli_query($conn, $query_createPost);
            if ($create) {
                echo "Tạo thành công";
            } else {
                echo "Không tạo được";
            }
        } ?>
        <!DOCTYPE html>
        <html>
        <head>
            <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
        </head>
        <body>
            <a href="user.php"><button>Trở về</button></a>
            <form method="post">
                <div>
                    <label for="title">Tiêu đề</label><br>
                    <input type="text" name="title" placeholder="Tiêu đề" required>
                </div><br>
                <div>
                    <label for="class">Lớp</label><br>
                    <input type="text" name="class" placeholder="Lớp" required>
                </div><br>
                <div>
                    <label for="subject">Chủ đề</label><br>
                    <input type="text" name="subject" placeholder="Chủ đề" required>
                </div><br>
                <div>
                    <label for="content">Nội dung</label><br>
                    <textarea name="content" placeholder="Nội dung" required></textarea>
                    <script>CKEDITOR.replace( 'content' )</script>
                </div><br>
                <button type="submit" name="submit">Đăng</button>
            </form>
        </body>
        </html>
    <?php } else {
        header('location:login.php');
    }
    mysqli_close($conn);
?>