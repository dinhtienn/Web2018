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