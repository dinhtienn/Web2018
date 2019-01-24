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
            header('location: ../userHome.php');
        } else {
            echo "
                <script>
                    alert('Xóa không thành công')
                </script>
            ";
        }
    } else {
        header('location:login.php');
    }
    mysqli_close($conn);
?>