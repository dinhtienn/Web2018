<div class="content-post">
    <?php foreach ($data_content as $list_post) {
        if (sizeof($list_post) > 0) {?>
            <div class="list-post basic">
                <div class="tab-heading">
                    <div class="tab-title f-regular-30">
                        <?php echo $list_post[0]->subject ?>
                    </div>
                    <div class="view-all">
                        <a class="f-regular-13" href="/miny/category.php?class=<?php echo $list_post[0]->class ?>&subject=<?php echo $list_post[0]->subject ?>&page=1">
                            Xem tất cả
                            <i class="fas fa-caret-right"></i>
                        </a>
                    </div>
                </div>
                <div class="line-orange"></div>
                <div class="tab-post">
                    <?php if (sizeof($list_post) >= 3) {
                        $show_post = 3;
                    } else {
                        $show_post = sizeof($list_post);
                    }
                    for ($i = 0; $i < $show_post; $i++) {?>
                        <div class="post-model" data-location="/miny/detail.php?post=<?php echo $list_post[$i]->id ?>">
                            <div class="post-title">
                                <a href="/miny/detail.php?post=<?php echo $list_post[$i]->id ?>" class="f-medium-17"><?php echo $list_post[$i]->title ?></a>
                            </div>
                            <div class="post-heading d-flex">
                                <div class="post-author f-medium-12">
                                    <?php echo $list_post[$i]->fullname ?>
                                </div>
                                <div class="post-info f-regular-13">
                                    <div><img src="./images/homepage/icon-view.png" alt="icon-view"><?php echo $list_post[$i]->view_num ?></div>
                                    <div><img src="./images/homepage/icon-heart.png" alt="icon-like"><?php echo $list_post[$i]->like_num ?></div>
                                </div>
                            </div>
                            <div class="post-content f-regular-13">
                                <?php echo $list_post[$i]->content ?>
                            </div>
                        </div>
                    <?php }?>
                </div>
                <div class="view-more">
                    <a href="/miny/category.php?class=<?php echo $list_post[0]->class ?>&subject=<?php echo $list_post[0]->subject ?>&page=1"><button class="f-regular-13">Xem thêm</button></a>
                </div>
            </div>
        <?php }
    } ?>
</div>