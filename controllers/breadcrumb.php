<?php
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