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