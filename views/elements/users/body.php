<div class="user-body-homepage">
    <div class="container">
        <ul id="user-menu" class="f-regular-25">
            <li><a href="/miny/userHome.php#user-infomation">Thông tin cá nhân</a></li>
            <li><a href="/miny/userHome.php#post-management">Quản lý bài viết</a></li>
            <li><a href="/miny/userHome.php#post-create">Đăng bài</a></li>
        </ul>
        <?php if ( isset($_GET['update']) ) {
            require_once 'update.php';
        } else {
            require_once 'mainHome.php';
        } ?>
    </div>
</div>