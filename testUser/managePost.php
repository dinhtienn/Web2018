<?php
    session_start();
    require_once '../connectDB.php';
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $query_search_user = "
            SELECT * FROM users WHERE username = '$username';
        ";
        $data_user = mysqli_query($conn, $query_search_user);
        $user = mysqli_fetch_object($data_user);
        $user_id = $user->id;
        $user_id = "'$user_id'";
        $query_search_post = "
            SELECT posts.id, title, classes.class, subjects.subject, view_num, like_num, content
            FROM posts, classes, subjects
            WHERE posts.subject_id = subjects.id AND
            subjects.class_id = classes.id AND
            posts.user_id = $user_id
        ";
        $data_post = mysqli_query($conn, $query_search_post);
        $all_post = array();
        while ($post = mysqli_fetch_object($data_post)) {
            array_push($all_post, $post);
        }
?>
        <a href="user.php"><button>Trở về</button></a>
        <table style="width: 100%">
            <tr>
                <th>Tiêu đề</th>
                <th>Lớp</th>
                <th>Chủ đề</th>
                <th>Lượt xem</th>
                <th>Lượt thích</th>
                <th>Nội dung</th>
                <th>Quản lý</th>
            </tr>
            <?php foreach ($all_post as $post) {
                $post_id = "'$post->id'" ?>
                <tr>
                    <th><?php echo $post->title ?></th>
                    <th><?php echo $post->class ?></th>
                    <th><?php echo $post->subject ?></th>
                    <th><?php echo $post->view_num ?></th>
                    <th><?php echo $post->like_num ?></th>
                    <th><?php echo $post->content ?></th>
                    <th>
                        <a href="editPost.php?postID=<?php echo $post_id ?>">Sửa</a>
                        <a href="deletePost.php?postID=<?php echo $post_id ?>">Xóa</a>
                    </th>
                </tr>
            <?php }?>
        </table>
    <?php } else {
        header('location:login.php');
    }
    mysqli_close($conn);
?>