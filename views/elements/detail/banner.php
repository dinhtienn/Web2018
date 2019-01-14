<div id="banner">
    <div class="container">
        <div class="breadcrumb f-regular-13">
            <?php $breadcrumb = array_reverse(createBreadcrumb($post_title, $data_main_content));
            for ($i = 0; $i < sizeof($breadcrumb) - 1; $i++) {?>
                <div><a href=""><?php echo $breadcrumb[$i] ?></a></div>
            <?php }?>
            <div><?php echo $breadcrumb[sizeof($breadcrumb) - 1] ?></div>
        </div>
        <div class="banner-heading f-bold-30">
            <?php echo $post_subject ?> - <?php echo $post_title ?>
        </div>
    </div>
</div>