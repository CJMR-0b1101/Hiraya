<?php
    session_start();
    header('Content-Type: application/json');

    $username = $_SESSION['user']['username'];
    $uploaded = array();
    $temp = array();
    $i = $_SESSION['user']['up_count'];
    $blog_id = $_SESSION['blog_id'];

    if(!empty($_FILES['file']['name'][0])) {
        foreach($_FILES['file']['name'] as $position => $name) {
            $filename = $username.'-blog-'.$blog_id.'-gallery-pic-'.$i.'.jpg';
            $path = 'blog_images/'.$filename;
            
            if(move_uploaded_file($_FILES['file']['tmp_name'][$position], $path)) {
                $uploaded[] = array(
                    'name' => $name,
                    'file' => $filename
                );
                setcookie('uploads', serialize($uploaded), time() + 3600);
            }
            $i++;
        }
    }

    echo json_encode($uploaded);
?>