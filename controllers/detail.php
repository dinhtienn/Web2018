<?php
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