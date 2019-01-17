<?php
    // Xử lý dữ liệu cho phần content
    $data_content = array();
    foreach ($list_class as $class_name) {
        $data_content[array_search($class_name, $list_class)] = array();
        if ($class_name == "Mới nhất") {
            for ($i = 0; $i < 6; $i++) {
                array_push($data_content[array_search($class_name, $list_class)], $all_post[$i]);
            }
        } else {
            foreach ($all_post as $post) {
                if ($post->class == $class_name) {
                    array_push($data_content[array_search($class_name, $list_class)], $post);
                }
                if (sizeof($data_content[array_search($class_name, $list_class)]) >= 6) {
                    break;
                }
            }
        }
    }

    // Xử lý dữ liệu cho phần Footer
    $data_footer = array();
    $data_check_name = array();
    foreach ($all_subject as $subject) {
        if (!in_array($subject->subject, $data_check_name)) {
            array_push($data_footer, $subject);
            array_push($data_check_name, $subject->subject);
        }
        if (sizeof($data_footer) >= 8 && sizeof($data_check_name) >= 8) {
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

    // Xử lý dữ liệu cho phần Button TabHeading Content
    function findSubjectByClass($class_name) {
        global $all_class;
        foreach ($all_class as $class) {
            if ($class->class == $class_name) {
                $list_subject = findSubjectById($class->id);
            }
        }
        return $list_subject;
    }
?>