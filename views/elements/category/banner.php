<div id="banner">
    <div class="container">
        <div class="breadcrumb f-regular-13">
            <?php if (isset($_GET['class']) && isset($_GET['subject'])) {
                 $breadcrumb = array_reverse(createBreadcrumb($subject, $data_show_more[0]));
            } else {
                $breadcrumb = array_reverse(createBreadcrumb($post_class, $data_content[0][0]));
            }
            for ($i = 0; $i < sizeof($breadcrumb) - 1; $i++) {?>
                <div><a href=""><?php echo $breadcrumb[$i] ?></a></div>
            <?php }?>
            <div><?php echo $breadcrumb[sizeof($breadcrumb) - 1] ?></div>
        </div>
        <div class="banner-heading f-bold-30">
            <?php echo $post_class ?> - GIẢI BÀI TẬP <?php echo $post_class ?>
        </div>
    </div>
</div>