<div class="side-bar">
    <?php foreach ($data_ad as $ad) {?>
        <a href=""><img src="<?php echo $ad->link; ?>" alt="<?php echo $ad->title; ?>"></a>
    <?php }?>
</div>