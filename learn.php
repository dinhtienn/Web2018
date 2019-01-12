<?php
    $obj = (object) array('a' => 'foo', 'b' => 'bar', 'c' => 'hey', 'd' => 'dad');

    foreach ($obj as $key => $value) {
        if ($value == 'hey') {
            echo $key;
        }
    }
?>