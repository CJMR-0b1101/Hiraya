<?php
    session_start();
    header('Content-Type: application/json');

    $username = $_SESSION['user']['username'];
    $uploaded = array();
    $temp = array();

    if(!empty($_FILES['file']['name'][0])) {
        foreach($_FILES['file']['name'] as $position => $name) {
            $filename = $username.rand().$name;
            $path = 'blog_images/'.$filename;
            
            $_SESSION['user']['gallery'] = $uploaded;
            if(move_uploaded_file($_FILES['file']['tmp_name'][$position], $path)) {
                $uploaded[] = array(
                    'name' => $name,
                    'file' => $path
                );
                setcookie('uploads', serialize($uploaded));
            }
        }
    }

    echo json_encode($uploaded);
?>