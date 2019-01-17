<div class="side-bar">
    <?php foreach ($all_ad as $ad) {?>
        <a href="<?php echo $ad->link ?>"><img src="<?php echo $ad->image ?>" alt="<?php echo $ad->title ?>"></a>
    <?php }?>
</div>