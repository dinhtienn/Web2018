<div class="content">
    <div class="container">
        <?php foreach($list_classes as $class_name) {
            $index = array_search($class_name, $list_classes);
            if (sizeof($data_content[$index]) != 0) { ?>
                <div class="tab-heading">
                    <div class="tab-title f-regular-30">
                        <?php echo $class_name; ?>
                    </div>
                    <?php if (sizeof($list_buttons[$index]) != 0) {?>
                        <div class="menu-button f-regular-12">
                            <?php if (sizeof($list_buttons[$index]) >= 4) {
                                $total_button = 4;
                            } else {
                                $total_button = sizeof($list_buttons[$index]);
                            }
                            for ($i = 0; $i < $total_button; $i++) { ?>
                                <button class="subject-tab" data-subjectId="<?php echo $list_buttons[$index][$i]->id ?>"><?php echo $list_buttons[$index][$i]->subject ?></button>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <div class="view-all">
                        <a class="view-all-tag f-regular-13" data-className="<?php echo $class_name ?>"">
                            Xem tất cả
                            <i class="fas fa-caret-right"></i>
                        </a>
                    </div>
                </div>
                <div class="line-orange"></div>
                <div class="tab-post">
                    <?php if (sizeof($data_content[$index]) >= 6) {
                        $total_post = 6;
                    } else {
                        $total_post = sizeof($data_content[$index]);
                    }
                    for ($i = 0; $i < $total_post; $i++) { ?>
                        <div class="post-model" data-location="/miny/detail.php?post=<?php echo $data_content[$index][$i]->id ?>">
                            <div class="post-title">
                                <a href="/miny/detail.php?post=<?php echo $data_content[$index][$i]->id ?>" class="f-medium-17"><?php echo $data_content[$index][$i]->title ?></a>
                            </div>
                            <div class="post-heading d-flex">
                                <div class="post-author f-medium-12">
                                    <?php echo $data_content[$index][$i]->fullname ?>
                                </div>
                                <div class="post-info f-regular-13">
                                    <div><img src="./assets/images/homepage/icon-view.png" alt="icon-view"><?php echo $data_content[$index][$i]->view_num; ?></div>
                                    <div><img src="./assets/images/homepage/icon-heart.png" alt="icon-like"><?php echo $data_content[$index][$i]->like_num; ?></div>
                                </div>
                            </div>
                            <div class="post-content f-regular-13">
                                <?php echo $data_content[$index][$i]->content ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php }
        } ?>
    </div>
</div>