<?php
    $post_title = $data_main_content->title;
    $post_class = $data_main_content->class;
    $post_subject = $data_main_content->subject;

    // Lấy dữ liệu cho phần Related và More Post
    $data_more_post = array();
    $data_related = array();
    foreach ($data_content as $post) {
        if ($post->class == $post_class && $post->title != $post_title) {
            if ($post->subject == $post_subject && sizeof($data_related) <= 8) {
                array_push($data_related, $post);
            }
    //            elseif (sizeof($data_more_post) <= 6) {
    //                array_push($data_more_post, $post);
    //            }
        }
        if ($post->class == $post_class && sizeof($data_more_post) <= 5) {
            array_push($data_more_post, $post);
        }
        if (sizeof($data_more_post) > 6 && sizeof($data_related) > 8) {
            break;
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