<?php
    $data_navbar = json_decode( file_get_contents("./data/navbar.json") );
    $data_footer = json_decode( file_get_contents("./data/footer.json") );
    $data_ad = json_decode( file_get_contents("./data/advertiment.json") );
    $data_main_content = json_decode( file_get_contents("./data/postdetail.json") );
    $data_content = json_decode( file_get_contents("./data/posts.json") );
    $post_title = $data_main_content[0]->title;
    $post_class = $data_main_content[0]->class;
    $post_subject = $data_main_content[0]->subject;
    $data_more_post = array();
    $data_related = array();
    foreach ($data_content as $post) {
        if ($post->class == $post_class && $post->title != $post_title) {
            if ($post->subject == $post_subject && sizeof($data_related) <= 8) {
                array_push($data_related, $post);
            }
//            elseif (sizeof($data_more_post) <= 6) {
//                array_push($data_more_post, $post);
//            }
        }
        if ($post->class == $post_class && sizeof($data_more_post) <= 5) {
            array_push($data_more_post, $post);
        }
        if (sizeof($data_more_post) > 6 && sizeof($data_related) > 8) {
            break;
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
    <link rel="stylesheet" href="./css/detail.css">
    <!-- Import WebLogo -->
    <link rel="icon" href="./images/all/logo-web.png">
    <title>Miny</title>
</head>
<body>
    <div class="layer-opacity"></div>
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
                <a class="d-none" href=""><img src="./images/all/logo-web.png" alt=""></a>
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
                <div><a href="">TRANG CHỦ</a></div>
                <div><a href="">LỚP 9</a></div>
                <div><a href="">VĂN HỌC</a></div>
                <div><a href="">SOẠN VĂN</a></div>
                <div>PHONG CÁCH HỒ CHÍ MINH</div>
            </div>
            <div class="banner-heading f-bold-30">
                SOẠN VĂN - PHONG CÁCH HỒ CHÍ MINH
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="content">
        <div class="container">
            <div class="main-content d-flex">
                <div class="post-detail">
                    <div class="post-main">
                        <div class="post-heading">
                            <div class="post-author">
                                <a href=""><img class="author-thumbnail" src="./images/thumbnail/author-post.png" alt=""></a>
                                <a class="f-medium-15" href=""><?php echo $data_main_content[0]->author ?></a>
                            </div>
                            <div class="post-info">
                                <div><img src="./images/homepage/icon-view.png" alt="icon-view"><?php echo $data_main_content[0]->view ?></div>
                                <div><img src="./images/homepage/icon-heart.png" alt="icon-like"><?php echo $data_main_content[0]->like ?></div>
                            </div>
                        </div>
                        <div class="post-content f-regular-17">
                            <?php echo $data_main_content[0]->detail ?>
                        </div>
                    </div>
                    <div class="fb-comments" data-href="<?php echo $data_main_content[0]->comment ?>" data-width="100%"></div>
                </div>
                <div class="side-bar">
                    <div class="related">
                        <div class="related-heading f-medium-17">
                            Bạn muốn tìm thêm với
                        </div>
                        <div class="line-orange"></div>
                        <div class="related-content f-regular-14">
                            <?php foreach ($data_related as $post) {?>
                                <a href=""><?php echo $post->title ?></a>
                            <?php }?>
                        </div>
                    </div>
                    <?php foreach ($data_ad as $ad) {?>
                        <a href=""><img src="<?php echo $ad->link; ?>" alt="<?php echo $ad->title; ?>"></a>
                    <?php }?>
                </div>
            </div>
            <div class="more-post">
                <div class="tab-heading">
                    <div class="tab-title f-regular-30">
                        Có thể bạn quan tâm
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
                    <?php foreach ($data_more_post as $post) {?>
                        <div class="post-model">
                            <div class="post-title">
                                <a href="" class="f-medium-17"><?php echo $post->title ?></a>
                            </div>
                            <div class="post-heading d-flex">
                                <div class="post-author f-medium-12">
                                    <?php echo $post->author ?>
                                </div>
                                <div class="post-info f-regular-13">
                                    <div><img src="./images/homepage/icon-view.png" alt="icon-view"><?php echo $post->view ?></div>
                                    <div><img src="./images/homepage/icon-heart.png" alt="icon-like"><?php echo $post->like ?></div>
                                </div>
                            </div>
                            <div class="post-content f-regular-13">
                                <?php echo $post->content ?>
                            </div>
                        </div>
                    <?php }?>
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
    <!-- Import JS -->
    <script src="./js/detail.js"></script>
    <div id="fb-root"></div>
    <script>
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <script src="./js/layoutTest.js"></script>
</body>
</html>