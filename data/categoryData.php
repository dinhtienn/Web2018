<?php
    $data_content = json_decode( file_get_contents("./posts.json") );
    $class = $_GET['class'];
    $subject = $_GET['subject'];
    $data = array();
    foreach ($data_content as $post) {
        if ($post->class == $class && $post->subject == $subject) {
            array_push($data, $post);
        }
    }
    if (sizeof($data) > 5) {
        $show_more = 5;
    } else {
        $show_more = sizeof($data);
    }
    $data_show_more = array();
    for ($i = 4; $i < 4 + $show_more; $i++) {
        array_push($data_show_more, $data[$i]);
    }
    echo json_encode($data_show_more);
?>




