<?php
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