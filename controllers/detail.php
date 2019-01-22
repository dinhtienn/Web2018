<?php
    // Xử lý dữ liệu cho phần Footer
    $data_footer = array();
    $data_check_name = array();
    foreach ($all_subjects as $subject) {
        if (!in_array($subject->subject, $data_check_name)) {
            array_push($data_footer, $subject);
            array_push($data_check_name, $subject->subject);
        }
        if (sizeof($data_footer) >= 8) {
            break;
        }
    }

    function findClassbySubjectId($subject_id) {
        global $all_subjects;
        foreach ($all_subjects as $subject) {
            if ($subject->id == $subject_id) {
                return $subject->class;
            }
        }
    }

    // Xử lý dữ liệu cho phần NavBar và TabPostButton
    function findSubjectByClass($class) {
        global $all_subjects;
        $list_subjects = array();
        foreach ($all_subjects as $subject) {
            if ($subject->class == $class) {
                array_push($list_subjects, $subject);
            }
        }
        return $list_subjects;
    }

    // Tạo breadcrumb
    $breadcrumb = array('trang chủ');
    if (isset($_GET['class'])) {
        array_push($breadcrumb, $_GET['class']);
    }
    if (isset($_GET['subject']) && $_GET['class'] != 'Mới nhất') {
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
