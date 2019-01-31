<header id="header" class="search">
    <div class="container">
        <!-- Logo + Menu -->
        <div class="header-container-1">
            <div class="logo">
                <a href="/miny/homepage.php"><img src="./assets/images/all/logo.png" alt=""></a>
            </div>
            <div class="user f-regular-16">
                <?php if (!isset($_SESSION['username'])) {?>
                    <button class="login-button">
                        Đăng ký
                    </button>
                    <button class="login-button">
                        Đăng nhập
                    </button>
                <?php } else { ?>
                    <button id="user-homepage" data-location="userHome.php">
                        Trang cá nhân
                    </button>
                    <button id="logout-button" data-location="controllers/userLogout.php">
                        Đăng xuất
                    </button>
                <?php } ?>
            </div>
        </div>
        <!-- Search -->
        <div class="header-container-2">
            <div class="search-container">
                <i class="icon fas fa-search"></i>
                <input class="f-regular-14" type="text" id="search" placeholder="Tìm kiếm câu hỏi">
                <div class="search-content f-regular-14">

                </div>
            </div>
        </div>
    </div>
</header>