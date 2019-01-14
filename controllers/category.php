<?php
    // Hàm lấy ra các Post thỏa mãn
    function findPost($post, $post_class, $subject_name) {
        if ($post->class == $post_class && $post->subject == $subject_name) {
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
                if (findPost($post, $post_class, $subject_name)) {
                    array_push($data_content[array_search($subject_name, $list_subject)], $post);
                }
            }
        }
    }

    // Hàm tạo breadcrumb
    $breadcrumb = array();
    function createBreadcrumb($obj, $post) {
        global $breadcrumb, $data_type;
        array_push($breadcrumb, $obj);
        if ($obj == 'trang chủ') {
            return $breadcrumb;
        } else {
            foreach ($post as $type => $value) {
                if ($value == $obj) {
                    $type_number = $data_type->$type - 1;
                    global $type_name;
                    foreach ($data_type as $type_next => $value1) {
                        if ($value1 == $type_number) {
                            $type_name = $type_next;
                        }
                    }
                    if (isset($post->$type_name)) {
                        return createBreadcrumb($post->$type_name, $post);
                    } else {
                        return createBreadcrumb('trang chủ', $post);
                    }
                }
            }
        }
    }
?>