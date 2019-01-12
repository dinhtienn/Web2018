<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Import Icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- Link CSS -->
    <link rel="stylesheet" href="./css/category.css">
    <!-- Import WebLogo -->
    <link rel="icon" href="./images/all/logo-web.png">
    <title>Miny</title>
</head>
<body>
    <!-- Layer Opacity -->
    <div class="layer-opacity"></div>
    <!-- Scroll to Top Button -->
    <button id="scroll-top"><i class="fas fa-angle-up"></i></button>
    <!-- Header -->
    <header class="search">
        <div class="container">
            <!-- Logo + Menu -->
            <div class="header-container-1">
                <div class="logo">
                    <a href=""><img src="./images/all/logo.png" alt=""></a>
                </div>
                <div class="menu f-regular-14">
                    <button href="">
                        <img src="./images/all/header-subject.png" alt="icon-menu">
                        <p>Danh mục</p>
                    </button>
                </div>
            </div>
            <!-- Search -->
            <div class="header-container-2">
                <div class="search-container">
                    <i class="icon fas fa-search"></i>
                    <input class="f-regular-14" type="text" id="search" placeholder="Tìm kiếm câu hỏi">
                </div>
            </div>
        </div>
    </header>
    <!-- Header: Mobile Ui -->
    <div class="mobile-header d-none">
        <!-- Icon NavBar - Mobile -->
        <div id="icon-nav"><i class="fas fa-bars"></i></div>
        <!-- NavSearch - Mobile -->
        <div class="search-container">
            <i class="icon fas fa-search"></i>
            <input class="f-regular-12" type="text" id="search" placeholder="Tìm kiếm câu hỏi">
        </div>
    </div>
    <!-- Navigation -->
    <nav>
        <div class="nav-mobile-container">
            <div class="logo">
                <a class="d-none" href=""><img src="./images/all/logo.png" alt=""></a>
                <i class="close-nav-mobile d-none fas fa-arrow-left"></i>
            </div>
            <div class="d-none menu-name">
                <p>Danh mục</p>
            </div>
            <div class="container d-flex f-medium-15">
                <?php foreach($data_navbar as $menu_item) { ?>
                    <div class="sub-menu">
                        <div class="sub-title">
                            <a href=""><?php echo "$menu_item->class"; ?></a>
                            <i class="icon-down icon-plus d-none fas fa-plus"></i>
                            <i class="icon-down icon-minus d-none fas fa-minus"></i>
                        </div>
                        <?php if ( !empty($menu_item->subject) && sizeof($menu_item->subject) != 0 ) { ?>
                            <div class="subject f-regular-13">
                                <div class="subject-column1">
                                    <?php for ($i = 0; $i < sizeof($menu_item->subject) - intval(sizeof($menu_item->subject) / 2); $i++) { ?>
                                        <div><a href=""><?php echo $menu_item->subject[$i]; ?></a></div>
                                    <?php } ?>
                                </div>
                                <div class="subject-column2">
                                    <?php for ($i = intval(sizeof($menu_item->subject) / 2) + 1; $i < sizeof($menu_item->subject); $i++) { ?>
                                        <div><a href=\"\"><?php echo $menu_item->subject[$i]; ?></a></div>
                                    <?php } ?>
                                </div>
                                <?php $class_split = explode(" ", $menu_item->class); ?>
                                <div class="subject-column3">
                                    <img src="./images/all/<?php echo $class_split[1]; ?>.png" alt="menu<?php echo $class_split[1]; ?>">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </nav>
    <!-- FakeDiv -->
    <div class="fake-box"></div>
    <!-- Banner -->
    <div id="banner">
        <div class="container">
            <div class="breadcrumb f-regular-13">
                <?php $breadcrumb = array_reverse(findDad($class_name, $breadcrumb));
                for ($i = 0; $i < sizeof($breadcrumb) - 1; $i++) {?>
                    <div><a href=""><?php echo $breadcrumb[$i] ?></a></div>
                <?php }?>
                <div><?php echo $breadcrumb[sizeof($breadcrumb) - 1] ?></div>
            </div>
            <div class="banner-heading f-bold-30">
                <?php echo $class_name ?> - GIẢI BÀI TẬP <?php echo $class_name ?>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="content">
        <div class="container d-flex">
            <?php if ($view == "basic") {
                require_once 'elements/category-content-basic.php';
            } else {
                require_once 'elements/category-content-subject.php';
            } ?>
            <div class="side-bar">
                <?php foreach ($data_ad as $ad) {?>
                    <a href=""><img src="<?php echo $ad->link; ?>" alt="<?php echo $ad->title; ?>"></a>
                <?php }?>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="logo">
                <a href=""><img src="./images/all/logo.png" alt="logo"></a>
            </div>
            <div class="menu f-regular-14">
                <?php foreach($data_footer as $data) { ?>
                    <a href=""><?php echo "$data->subject"; ?></a>
                <?php } ?>
            </div>
            <div class="copyright f-regular-12"><p>Copyright © 2018 Miny. Design by 123DOC</p></div>
        </div>
    </footer>
    <!-- Import JS -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="./js/category.js"></script>
    <script src="./js/layoutTest.js"></script>
</body>
</html>