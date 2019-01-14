<div class="content-post">
    <div class="list-post">
        <div class="tab-heading">
            <div class="tab-title f-regular-30">
                <?php echo $subject ?>
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
            <?php for ($i = 0; $i < sizeof($data_show_more); $i++) {?>
                <div class="post-model">
                    <div class="post-title">
                        <a href="" class="f-medium-17"><?php echo $data_show_more[$i]->title ?></a>
                    </div>
                    <div class="post-heading d-flex">
                        <div class="post-author f-medium-12">
                            <?php echo $data_show_more[$i]->author ?>
                        </div>
                        <div class="post-info f-regular-13">
                            <div><img src="./images/homepage/icon-view.png" alt="icon-view"><?php echo $data_show_more[$i]->view ?></div>
                            <div><img src="./images/homepage/icon-heart.png" alt="icon-like"><?php echo $data_show_more[$i]->like ?></div>
                        </div>
                    </div>
                    <div class="post-content f-regular-13">
                        <?php echo $data_show_more[$i]->content ?>
                    </div>
                </div>
            <?php }?>
        </div>
        <div class="page-button">
            <?php for ($i = 0; $i < $page_button; $i++) {?>
                <a href="/miny/category.php?class=<?php echo $post_class ?>&subject=<?php echo $data_show_more[0]->subject ?>&page=<?php echo $i + 1 ?>"><button class="f-regular-14"><?php echo $i + 1 ?></button></a>
            <?php }?>
        </div>
    </div>
</div>