<?php
    $data_navbar = json_decode( file_get_contents("./data/navbar.json") );
    $data_footer = json_decode( file_get_contents("./data/footer.json") );
    $data_ad = json_decode( file_get_contents("./data/advertiment.json") );
    $data_main_content = json_decode( file_get_contents("./data/postdetail.json") )[0];
    $data_content = json_decode( file_get_contents("./data/posts.json") );
    $data_type = json_decode( file_get_contents("./data/type.json") )[0];
?>