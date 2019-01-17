<?php
    // Xử lý dữ liệu Page hiện ra
    if (isset($_GET['class']) && isset($_GET['subject'])) {
        // Nếu có Query subject, hiển thị trang post đầy đủ
        $view = "subject";
        // Lấy Page hiện tại
        if (isset($_GET['page'])) {
            $page = ($_GET['page']);
        } else {
            $page = 1;
        }
        // Tính số trang cần có cho subject đang xem
        if (sizeof($all_post) % 9 == 0) {
            $page_button = sizeof($all_post) / 9;
        } else {
            $page_button = intval(sizeof($all_post) / 9) + 1;
        }
        // Tính số Post của Page cần load
        $start_number = 9 * ($page - 1);
        if ((sizeof($all_post) - $start_number) >= 9) {
            $post_number = 9;
        } else {
            $post_number = sizeof($all_post) - $start_number;
        }
        // Lấy ra số Post đó
        $data_content = array();
        for ($i = $start_number; $i < $start_number + $post_number; $i++) {
            array_push($data_content, $all_post[$i]);
        }
    } elseif (isset($_GET['class'])) {
        // Nếu không có Query, hiển thị trang ban đầu
        $view = "basic";
        $data_content = array();
        $subject_check_name = array();
        foreach ($all_post as $post) {
            if (!in_array($post->subject, $subject_check_name)) {
                array_push($subject_check_name, $post->subject);
                $new_list = array();
                array_push($new_list, $post);
                array_push($data_content, $new_list);
            }
            elseif (in_array($post->subject, $subject_check_name) && sizeof($data_content[array_search($post->subject, $subject_check_name)]) < 3) {
                array_push($data_content[array_search($post->subject, $subject_check_name)], $post);
            }
            elseif (in_array($post->subject, $subject_check_name) && sizeof($data_content[array_search($post->subject, $subject_check_name)]) >= 3) {
                $count = 0;
                foreach ($data_content as $each_data) {
                    if (sizeof($each_data) > 3) {
                        $count += 1;
                    }
                }
                if ($count == 11) {
                    break;
                }
            }
        }
    }

    // Xử lý dữ liệu cho phần Footer
    $data_footer = array();
    $data_subject_name = array();
    foreach ($all_subject as $subject) {
        if (!in_array($subject->subject, $data_subject_name)) {
            array_push($data_footer, $subject);
            array_push($data_subject_name, $subject->subject);
        }
        if (sizeof($data_footer) >= 8 && sizeof($data_subject_name) >= 8) {
            break;
        }
    }

    function findClassbySubjectId($subject_id) {
        global $all_subject, $all_class;
        foreach ($all_subject as $subject) {
            if ($subject->id == $subject_id) {
                foreach ($all_class as $class) {
                    if ($class->id == $subject->class_id) {
                        return $class->class;
                    }
                }
            }
        }
    }

    // Xử lý dữ liệu cho phần NavBar
    function findSubjectById($class_id) {
        global $all_subject;
        $list_subject = array();
        foreach ($all_subject as $subject) {
            if ($subject->class_id == $class_id) {
                array_push($list_subject, $subject);
            }
        }
        return $list_subject;
    }

    // Tạo breadcrumb
    $breadcrumb = array('trang chủ');
    if (isset($_GET['class'])) {
        array_push($breadcrumb, $_GET['class']);
    }
    if (isset($_GET['subject'])) {
        array_push($breadcrumb, $_GET['subject']);
    }
    if (isset($_GET['post'])) {
        if  (!in_array($post->class, $breadcrumb)) {
            array_push($breadcrumb, $post->class);
        }
        if  (!in_array($post->subject, $breadcrumb)) {
            array_push($breadcrumb, $post->subject);
        }
        array_push($breadcrumb, $post->title);
    }
?>