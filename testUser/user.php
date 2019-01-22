<?php
    session_start();
    if (isset($_SESSION['username'])) { ?>
        <a href="managePost.php"><button>Quản lý bài viết</button></a>
        <a href="createPost.php"><button>Đăng bài viết</button></a>
        <a href="logout.php"><button>Đăng xuất</button></a>
    <?php } else {
        header('location:login.php');
}?>
