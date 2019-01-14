<div class="side-bar">
    <div class="related">
        <div class="related-heading f-medium-17">
            Bạn muốn tìm thêm với
        </div>
        <div class="line-orange"></div>
        <div class="related-content f-regular-14">
            <?php foreach ($data_related as $post) {?>
                <a href=""><?php echo $post->title ?></a>
            <?php }?>
        </div>
    </div>
    <?php foreach ($data_ad as $ad) {?>
        <a href=""><img src="<?php echo $ad->link; ?>" alt="<?php echo $ad->title; ?>"></a>
    <?php }?>
</div>