<div class="more-post">
    <?php if (sizeof($data_more_post) > 0) {?>
        <div class="tab-heading">
            <div class="tab-title f-regular-30">
                Có thể bạn quan tâm
            </div>
            <div class="view-all">
                <a class="f-regular-13" href="/miny/category.php?class=<?php echo $post->class ?>">
                    Xem tất cả
                    <i class="fas fa-caret-right"></i>
                </a>
            </div>
        </div>
        <div class="line-orange"></div>
        <div class="tab-post">
            <?php if (sizeof($data_more_post) <= 6 ) {
                $show_post = sizeof($data_more_post);
            } else {
                $show_post = 6;
            }
            for ($i = 0; $i < $show_post; $i++) {?>
                <div class="post-model" data-location="/miny/detail.php?post=<?php echo $data_more_post[$i]->id ?>">
                    <div class="post-title">
                        <a href="/miny/detail.php?post=<?php echo $data_more_post[$i]->id ?>" class="f-medium-17"><?php echo $data_more_post[$i]->title ?></a>
                    </div>
                    <div class="post-heading d-flex">
                        <div class="post-author f-medium-12">
                            <?php echo $data_more_post[$i]->fullname ?>
                        </div>
                        <div class="post-info f-regular-13">
                            <div><img src="./images/homepage/icon-view.png" alt="icon-view"><?php echo $data_more_post[$i]->view_num ?></div>
                            <div><img src="./images/homepage/icon-heart.png" alt="icon-like"><?php echo $data_more_post[$i]->like_num ?></div>
                        </div>
                    </div>
                    <div class="post-content f-regular-13">
                        <?php echo $data_more_post[$i]->content ?>
                    </div>
                </div>
            <?php }?>
        </div>
    <?php } ?>
</div>