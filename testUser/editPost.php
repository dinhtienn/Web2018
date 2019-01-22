<?php
    session_start();
    require_once '../connectDB.php';
    if (isset($_SESSION['username'])) {
        $post_id = $_GET['postID'];
        $query_post = "
            SELECT posts.id, title, classes.class, subjects.subject, content
            FROM posts, classes, subjects
            WHERE posts.subject_id = subjects.id AND
            subjects.class_id = classes.id AND
            posts.id = $post_id
        ";
        $data_post = mysqli_query($conn, $query_post);
        $post = mysqli_fetch_object($data_post);
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $class = $_POST['class'];
            $subject = $_POST['subject'];
            $content = $_POST['content'];
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
            $query_update = "
                UPDATE posts SET title = '$title', subject_id = $subject_id, content = '$content'
                WHERE id = $post_id
            ";
            $update = mysqli_query($conn, $query_update);
            if ($update) {
                echo "Sửa thành công";
            } else {
                echo "Sửa không thành công";
            }
        }
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
        </head>
        <body>
            <a href="managePost.php"><button>Trở về</button></a>
            <form method="post">
                <div>
                    <label for="title">Tiêu đề</label><br>
                    <input type="text" name="title" value="<?php echo $post->title ?>" required>
                </div><br>
                <div>
                    <label for="class">Lớp</label><br>
                    <input type="text" name="class" value="<?php echo $post->class ?>" required>
                </div><br>
                <div>
                    <label for="subject">Chủ đề</label><br>
                    <input type="text" name="subject" value="<?php echo $post->subject ?>" required>
                </div><br>
                <div>
                    <label for="content">Nội dung</label><br>
                    <textarea name="content" required><?php echo $post->content ?></textarea>
                    <script>CKEDITOR.replace( 'content' )</script>
                </div><br>
                <button type="submit" name="submit">Cập nhât</button>
            </form>
        </body>
        </html>
    <?php } else {
        header('location:login.php');
    }
    mysqli_close($conn);
?>