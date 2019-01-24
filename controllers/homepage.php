<?php
    // Xử lý dữ liệu cho phần Navigation
    require_once 'navigation.php';

    // Xử lý dữ liệu cho phần Footer
    require_once 'footer.php';

    // Xử lý đăng nhập
    require_once 'userLogin.php';

    // Xử lý đăng ký
    require_once 'userSignup.php';

    // Xử lý dữ liệu cho phần content
    $data_content = array();
    $list_buttons = array();
    foreach ($list_classes as $class_name) {
        $index = array_search($class_name, $list_classes);
        $data_content[$index] = array();
        $list_buttons[$index] = findSubjectByClass($class_name);
        if ($class_name == "Mới nhất") {
            for ($i = 0; $i < 6; $i++) {
                array_push($data_content[$index], $all_posts[$i]);
            }
        } else {
            foreach ($all_posts as $post) {
                if ($post->class == $class_name && $post->subject == $list_buttons[$index][0]->subject) {
                    array_push($data_content[$index], $post);
                }
                if (sizeof($data_content[$index]) >= 6) {
                    break;
                }
            }
        }
    }

    mysqli_close($conn);