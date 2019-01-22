<div class="side-bar">
    <?php if (isset($data_related) && sizeof($data_related) > 0) {?>
        <div class="related">
            <div class="related-heading f-medium-17">
                Bạn muốn tìm thêm với
            </div>
            <div class="line-orange"></div>
            <div class="related-content f-regular-14">
                <?php if (sizeof($data_related) <= 8) {
                    $show_post = sizeof($data_related);
                } else {
                    $show_post = 8;
                }
                for ($i = 0; $i < $show_post; $i++) {?>
                    <a href="/miny/detail.php?post=<?php echo $data_related[$i]->id ?>"><?php echo $data_related[$i]->title ?></a>
                <?php }?>
            </div>
        </div>
    <?php } ?>
    <?php if (isset($all_ads) && sizeof($all_ads) > 0) {
        foreach ($all_ads as $ad) {?>
            <a href="<?php echo $ad->link ?>"><img src="<?php echo $ad->image; ?>" alt="<?php echo $ad->title; ?>"></a>
        <?php }
    } ?>
</div>