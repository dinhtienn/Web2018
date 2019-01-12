<?php
    // Hàm lấy ra các Post thỏa mãn
    function findPost($post, $class_name, $subject_name) {
        if ($post->class == $class_name && $post->subject == $subject_name) {
            return true;
        } else {
            return false;
        }
    }

    // Xử lí Page hiện ra
    if (isset($_GET['class']) && isset($_GET['subject'])) {
        // Nếu có Query, hiển thị trang post đầy đủ
        $view = "subject";
        $class = $_GET['class'];
        $subject = $_GET['subject'];
        // Lấy Page hiện tại
        if (isset($_GET['page'])) {
            $page = ($_GET['page']);
        } else {
            $page = 1;
        }
        // Tính số trang cần có cho subject đang xem
        $data_full_post = array();
        foreach ($data_post as $post) {
            if (findPost($post, $class, $subject)) {
                array_push($data_full_post, $post);
            }
        }
        if (sizeof($data_full_post) % 9 == 0) {
            $page_button = sizeof($data_full_post) / 9;
        } else {
            $page_button = intval(sizeof($data_full_post) / 9) + 1;
        }
        // Tính số Post của Page cần load
        $start_number = 9 * ($page - 1);
        if ((sizeof($data_full_post) - $start_number) >= 9) {
            $post_number = 9;
        } else {
            $post_number = sizeof($data_full_post) - $start_number;
        }
        // Lấy ra số Post đó
        $data_show_more = array();
        for ($i = $start_number; $i < $start_number + $post_number; $i++) {
            array_push($data_show_more, $data_full_post[$i]);
        }
    } else {
        // Nếu không có Query, hiển thị trang ban đầu
        $view = "basic";
        $data_content = array();
        foreach ($list_subject as $subject_name) {
            $data_content[array_search($subject_name, $list_subject)] = array();
            foreach ($data_post as $post) {
                if (findPost($post, $class_name, $subject_name)) {
                    array_push($data_content[array_search($subject_name, $list_subject)], $post);
                }
            }
        }
    }

    // Hàm tạo breadcrumb
    $breadcrumb = array();
    function findDad($child, $breadcrumb) {
        global $class_name;
        array_push($breadcrumb, $child);
        if ($child == $class_name) {
            $child = "TRANG CHỦ";
        }
        elseif ($child == "TRANG CHỦ") {
            return $breadcrumb;
        }
        return findDad($child, $breadcrumb);
    }
?>