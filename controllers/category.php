<?php
    // Xử lý dữ liệu cho phần Navigation
    require_once 'navigation.php';

    // Xử lý dữ liệu cho phần Footer
    require_once 'footer.php';

    // Xử lý breadcrumb
    require_once 'breadcrumb.php';

    // Xử lý dữ liệu phần Content
    function calculatePageNumber($data) {
        if (sizeof($data) % 9 == 0) {
            $page_button = sizeof($data) / 9;
        } else {
            $page_button = intval(sizeof($data) / 9) + 1;
        }
        return $page_button;
    }

    function calculateDataForPage($data) {
        global $start_number;
        if ((sizeof($data) - $start_number) >= 9) {
            $post_number = 9;
        } else {
            $post_number = sizeof($data) - $start_number;
        }
        return $post_number;
    }

    function fetchDataForPage($data) {
        global $start_number, $post_number;
        $data_content = array();
        for ($i = $start_number; $i < $start_number + $post_number; $i++) {
            array_push($data_content, $data[$i]);
        }
        return $data_content;
    }

    function countSubject($data) {
        $check_name = array();
        foreach ($data as $each_data) {
            $isExist = in_array($each_data->subject, $check_name);
            if (!$isExist) {
                array_push($check_name, $each_data->subject);
            }
        }
        return sizeof($check_name);
    }

    function checkBreak($data) {
        $count = 0;
        global $all_posts;
        foreach ($data as $each_data) {
            if (sizeof($each_data) > 3) {
                $count += 1;
            }
        }
        if ($count == countSubject($all_posts)) {
            return true;
        }
    }

    function fetchDataForBasicPage($data) {
        $data_content = array();
        $subject_check_name = array();
        foreach ($data as $post) {
            $is_exist = in_array($post->subject, $subject_check_name);
            $index = array_search($post->subject, $subject_check_name);
            if (!$is_exist) {
                array_push($subject_check_name, $post->subject);
                $new_list = array();
                array_push($new_list, $post);
                array_push($data_content, $new_list);
            } else {
                if (!checkBreak($data_content)) {
                    array_push($data_content[$index], $post);
                } else {
                    break;
                }
            }
        }
        return $data_content;
    }

    // Xử lý dữ liệu Page hiện ra
    if (isset($_GET['class']) && isset($_GET['subject'])) {
        $view = "subject";
        $page = ($_GET['page']);
        $page_button = calculatePageNumber($all_posts);
        $start_number = 9 * ($page - 1);
        $post_number = calculateDataForPage($all_posts);
        $data_content = fetchDataForPage($all_posts);
    } elseif (isset($_GET['class'])) {
        $view = "basic";
        $data_content = fetchDataForBasicPage($all_posts);
    }