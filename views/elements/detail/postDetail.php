<div class="post-detail">
    <div class="post-main">
        <div class="post-heading">
            <div class="post-author">
                <a href=""><img class="author-thumbnail" src="./images/thumbnail/author-post.png" alt=""></a>
                <a class="f-medium-15" href=""><?php echo $post->fullname ?></a>
            </div>
            <div class="post-info">
                <div><img src="./images/homepage/icon-view.png" alt="icon-view"><?php echo $post->view_num ?></div>
                <div><img src="./images/homepage/icon-heart.png" alt="icon-like"><?php echo $post->like_num ?></div>
            </div>
        </div>
        <div class="post-content f-regular-17">
            <?php echo $post->content ?>
        </div>
    </div>
    <div class="fb-comments" data-href="http://dinhtien12298.github.io/web2018/detail.html" data-width="100%"></div>
</div>