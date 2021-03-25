<?php
    session_start();

    if(!isset($_SESSION['login'])) {
        header("location: home_page.php");
    }
    if(!isset($_GET['pic_id']) || !isset($_GET['blog_id']) || !isset($_GET['user_id'])) {
        header("location: home_page.php");
    }

    $user_id = $_SESSION['user']['user_id'];
    $uid = $_GET['user_id'];

    if($user_id != $uid) {
        header("location: home_page.php");
    }
    // echo "UID: $user_id";

    $pic_id = $_GET['pic_id'];
    echo "Pic ID: ".$pic_id;

    $blog_id = $_GET['blog_id'];
    include 'config.php';
    $sql = "UPDATE gallery SET picture_name = '' WHERE picture_id = $pic_id";
    echo $sql;
    $result = mysqli_query($conn, $sql);

    if($result) {
        header("location: edit_blog.php?blog_id=$blog_id&user_id=$uid");
        $_SESSION['curr_del_pic'][] = $pic_id;
    }
    else {
        echo "Delete Failed.";
    }
?>