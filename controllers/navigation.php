<?php
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