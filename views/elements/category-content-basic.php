<div class="content-post">
    <?php foreach ($data_content as $list_post) { ?>
        <div class="list-post basic">
            <div class="tab-heading">
                <div class="tab-title f-regular-30">
                    <?php echo $list_post[0]->subject ?>
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
                <?php if (sizeof($list_post) >= 4) {
                    $show_post = 4;
                } else {
                    $show_post = sizeof($list_post);
                }
                for ($i = 0; $i < $show_post; $i++) {?>
                    <div class="post-model">
                        <div class="post-title">
                            <a href="" class="f-medium-17"><?php echo $list_post[$i]->title ?></a>
                        </div>
                        <div class="post-heading d-flex">
                            <div class="post-author f-medium-12">
                                <?php echo $list_post[$i]->author ?>
                            </div>
                            <div class="post-info f-regular-13">
                                <div><img src="./images/homepage/icon-view.png" alt="icon-view"><?php echo $list_post[$i]->view ?></div>
                                <div><img src="./images/homepage/icon-heart.png" alt="icon-like"><?php echo $list_post[$i]->like ?></div>
                            </div>
                        </div>
                        <div class="post-content f-regular-13">
                            <?php echo $list_post[$i]->content ?>
                        </div>
                    </div>
                <?php }?>
            </div>
            <div data-class="<?php echo $class_name ?>" data-subject="<?php echo $list_post[0]->subject ?>"  class="view-more">
                <a href="/miny/category.php?class=<?php echo $class_name ?>&subject=<?php echo $list_post[0]->subject ?>"><button class="f-regular-13">Xem thêm</button></a>
            </div>
        </div>
    <?php }?>
    <div class="loading">
        <div class="loading-container">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>