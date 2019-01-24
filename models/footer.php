<?php
    $query_subjects = "
        SELECT subjects.id, subject, classes.class
        FROM subjects, classes
        WHERE subjects.class_id = classes.id
    ";
    $all_subjects = fetchData($query_subjects);
