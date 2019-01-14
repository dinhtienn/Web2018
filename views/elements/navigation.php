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