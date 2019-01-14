<footer>
    <div class="container">
        <div class="logo">
            <a href=""><img src="./images/all/logo.png" alt="logo"></a>
        </div>
        <div class="menu f-regular-14">
            <?php foreach($data_footer as $data) { ?>
                <a href=""><?php echo "$data->subject"; ?></a>
            <?php } ?>
        </div>
        <div class="copyright f-regular-12"><p>Copyright © 2018 Miny. Design by 123DOC</p></div>
    </div>
</footer>