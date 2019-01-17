<footer>
    <div class="container">
        <div class="logo">
            <a href="/miny/homepage.php"><img src="./images/all/logo.png" alt="logo"></a>
        </div>
        <div class="menu f-regular-14">
            <?php foreach ($data_footer as $data) { ?>
                <div class="footer-menu-item"><a href="/miny/category.php?class=<?php echo findClassbySubjectId($data->id) ?>&subject=<?php echo $data->subject ?>&page=1"><?php echo $data->subject ?></a></div>
            <?php } ?>
        </div>
        <div class="copyright f-regular-12"><p>Copyright © 2018 Miny. Design by 123DOC</p></div>
    </div>
</footer>