<?php
    $data_content = array();
    foreach ($list_class as $class_name) {
        $data_content[array_search($class_name, $list_class)] = array();
        if ($class_name == "Mới nhất") {
            for ($i = 0; $i < 6; $i++) {
                array_push($data_content[array_search($class_name, $list_class)], $data_post[$i]);
            }
        } else {
            foreach ($data_post as $post) {
                if ($post->class == $class_name) {
                    array_push($data_content[array_search($class_name, $list_class)], $post);
                }
                if (sizeof($data_content[array_search($class_name, $list_class)]) >= 6) {
                    break;
                }
            }
        }
    }
?>