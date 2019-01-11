<?php
    $data_navbar = json_decode( file_get_contents("./data/navbar.json") );
    $data_post = json_decode( file_get_contents("./data/posts.json") );
    $data_footer = json_decode( file_get_contents("./data/footer.json") );

    $list_class = array("Mới nhất", "Lớp 9", "Lớp 8");
    $data_content = array();
    foreach ($list_class as $class_name) {
        $data_content[array_search($class_name, $list_class)] = array();
        if ($class_name == "Mới nhất") {
            for ($i = 0; $i < 6; $i++) {
                array_push($data_content[array_search($class_name, $list_class)], $data_post[$i]);
            }
        } else {
            foreach ($data_post as $post) {
                if ($post->class == $class_name) {
                    array_push($data_content[array_search($class_name, $list_class)], $post);
                }
                if (sizeof($data_content[array_search($class_name, $list_class)]) >= 6) {
                    break;
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Import Icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- Link CSS -->
    <link rel="stylesheet" href="./css/homepage.css">
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
    <!-- Banner -->
    <div id="banner-hp"></div>
    <!-- FakeDiv -->
    <div class="fake-box"></div>
    <!-- Content -->
    <div class="content">
        <div class="container">
            <?php foreach($list_class as $class_name) {
                if (sizeof($data_content[array_search($class_name, $list_class)]) != 0) { ?>
                    <div class="tab-heading">
                        <div class="tab-title f-regular-30">
                            <?php echo $class_name; ?>
                        </div>
                        <div class="menu-button f-regular-12">
                            <button>Toán học</button>
                            <button>Văn học</button>
                            <button>Sinh học</button>
                            <button>Địa lý</button>
                        </div>
                        <div class="view-all">
                            <a class="f-regular-13" href="">
                                Xem tất cả
                                <i class="fas fa-caret-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="line-orange"></div>
                    <div class="tab-post">
                    <?php if (sizeof($data_content[array_search($class_name, $list_class)]) >= 6) {
                        $total_post = 6;
                    } else {
                        $total_post = sizeof($data_content[array_search($class_name, $list_class)]);
                    }
                    for ($i = 0; $i < $total_post; $i++) { ?>
                        <div class="post-model">
                            <div class="post-title">
                                <a href="" class="f-medium-17"><?php echo $data_content[array_search($class_name, $list_class)][$i]->title; ?></a>
                            </div>
                            <div class="post-heading d-flex">
                                <div class="post-author f-medium-12">
                                    <?php echo $data_content[array_search($class_name, $list_class)][$i]->author; ?>
                                </div>
                                <div class="post-info f-regular-13">
                                    <div><img src="./images/homepage/icon-view.png" alt="icon-view"><?php echo $data_content[array_search($class_name, $list_class)][$i]->view; ?></div>
                                    <div><img src="./images/homepage/icon-heart.png" alt="icon-like"><?php echo $data_content[array_search($class_name, $list_class)][$i]->like; ?></div>
                                </div>
                            </div>
                            <div class="post-content f-regular-13">
                                <?php echo $data_content[array_search($class_name, $list_class)][$i]->content; ?>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
    <!-- Service -->
    <div id="service">
        <div class="container">
            <div id="service-header">
                <p class="f-regular-30">Chúng tôi cung cấp cho bạn</p>
            </div>
            <div id="service-info" class="d-flex">
                <div class="service-1" style="width: 29%">
                    <div class="service-icon">
                        <img src="./images/homepage/icon-file.png" alt="icon-file">
                    </div>
                    <div class="service-content">
                        <div class="content-heading f-regular-20">Tài nguyên học tập miễn phí</div>
                        <div class="content-detail f-regular-13">Cung cấp hơn 1 triệu tài nguyên về học tập miễn phí trên trang web</div>
                    </div>
                </div>
                <div class="service-2" style="width: 44%">
                    <div class="service-icon">
                        <img src="./images/homepage/icon-download.png" alt="icon-download">
                    </div>
                    <div class="service-content" style="padding: 0px 65px">
                        <div class="content-heading f-regular-20">Nội dung cập nhật liên tục</div>
                        <div class="content-detail f-regular-13">Nội dung trên web được cập nhật liên tục hàng ngày bởi đội ngũ giáo viên giỏi</div>
                    </div>
                </div>
                <div class="service-3" style="width: 27%">
                    <div class="service-icon">
                        <img src="./images/homepage/icon-pc.png" alt="icon-pc">
                    </div>
                    <div class="service-content">
                        <div class="content-heading f-regular-20">Giao diện thân thiện</div>
                        <div class="content-detail f-regular-13">Trang web luôn lắng nghe góp ý để đổi mới trang web phục vụ các bạn cả nước</div>
                    </div>
                </div>
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
    <script src="./js/homepage.js"></script>
    <script src="./js/layoutTest.js"></script>
</body>
</html>