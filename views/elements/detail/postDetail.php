<div class="post-detail">
    <div class="post-main">
        <div class="post-heading">
            <div class="post-author">
                <a href=""><img class="author-thumbnail" src="./images/thumbnail/author-post.png" alt=""></a>
                <a class="f-medium-15" href=""><?php echo $data_main_content->author ?></a>
            </div>
            <div class="post-info">
                <div><img src="./images/homepage/icon-view.png" alt="icon-view"><?php echo $data_main_content->view ?></div>
                <div><img src="./images/homepage/icon-heart.png" alt="icon-like"><?php echo $data_main_content->like ?></div>
            </div>
        </div>
        <div class="post-content f-regular-17">
            <?php echo $data_main_content->detail ?>
        </div>
    </div>
    <div class="fb-comments" data-href="<?php echo $data_main_content->comment ?>" data-width="100%"></div>
</div>