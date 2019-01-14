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