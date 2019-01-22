<?php
    session_start();
    require_once '../connectDB.php';
    if (isset($_SESSION['username'])) {
        $post_id = $_GET['postID'];
        $query = "
            DELETE FROM posts WHERE id = $post_id
        ";
        $delete = mysqli_query($conn, $query);
        if ($delete) {
            header('location:managePost.php');
        } else {
            echo "Không xóa được";
        }
    } else {
        header('location:login.php');
    }
    mysqli_close($conn);
?>