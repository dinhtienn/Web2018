<?php
    $data_navbar = json_decode( file_get_contents("./data/navbar.json") );
    $data_post = json_decode( file_get_contents("./data/posts.json") );
    $data_footer = json_decode( file_get_contents("./data/footer.json") );
    $list_class = array("Mới nhất", "Lớp 9", "Lớp 8");
?>