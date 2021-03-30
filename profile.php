<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
	<link rel="icon" href="images/hiraya_icon.ico">
</head>

<script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
<style>
    .main-body{
        background-image: url(https://i.imgur.com/4mExAFS.png);
		background-position: center bottom;
        min-height: 1000px; 
    }
    .div-profile-picture {
        float: center;
    }
    h3{
        font-size: 20px;
    }
    .div-body {
        max-width: 300px;
        margin-left: 50px;
        text-align: center;
    }
    .button-style {
        font-size: 15px;
        font-family: 'Inconsolata', monospace;
        background-color: white;
        border: none;
        border-radius: 12px;
        border: 2px solid #747F42;
        color: #747F42;
        padding: 7px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin: 4px 2px;
        cursor: pointer;
    }
    .button-style:hover {
        background-image: url(https://i.imgur.com/hi3eFOb.jpg);
        color: white;
    }
    .button-style:focus {
        outline: none;
        box-shadow: 0px 0px 2px #0066ff;
    }
</style>

<body class="main-body">
<?php include 'navbar.php'?>
    <div class="div-body">
        <?php
            
            if(isset($_SESSION['login'])) {
                $user = $_SESSION['user'];
                $file_upload_msg = "";

                // echo '<pre>';
                // print_r($_FILES);
                // print_r($user);
                // print_r($_SESSION);
                // echo '</pre>';

                if(isset($_POST['upload'])) {
                    // NO FILE CHOSEN
                    if(empty($_FILES['profilepic']['name'])) {
                        $file_upload_msg = "<h3 style = 'color:red;'>Please choose file before clicking \"Upload Photo\".</h3>";
                    }
                    // FILE CHOSEN
                    else {
                        $filename = $user['username'].".jpg";
                        $path = "images/".$filename;
                        // echo $path;

                        if(move_uploaded_file($_FILES['profilepic']['tmp_name'], $path)) {
                            include 'config.php';
                
                            $sql = "UPDATE users SET profile_picture = '$filename' WHERE user_id = $user[user_id]";
                            // echo $sql;
                            $result = mysqli_query($conn, $sql);
                
                            if($result) {
                                $file_upload_msg = "<h3 style = 'color:green;'>File uploaded successfully.</h3>";
                                $user['profile_picture'] = $filename;
                                $_SESSION['user'] = $user;
                            }
                            else
                                $file_upload_msg = "<h3 style = 'color:red;'>Error in updating.</h3>";  
                        }
                        else {
                            $file_upload_msg = "<h3 style = 'color:red;'>Error in uploading file.</h3>";
                        }
                    } 
                }
                else {
                    $filename = $user['profile_picture'];
                }
            }
            else {
                echo '<script> window.location.replace("index.php") </script>';
            }
        ?>
        <br>
        <br>
        
        <!-- PROFILE PICTURE SECTION -->
        <div class="div-content">
            <div class="div-profile-content-left">
                <div class="div-profile-picture">
                    <?php
                        $filename = "default_icon.png";
                        if(!empty($user['profile_picture']))
                            $filename = $user['profile_picture'];
                    ?>
                    <center><img src="images/<?php echo $filename; ?>" alt="Profile-Picture-Here">
                    <h1><?php echo $user['username']; ?></h1></center>
                </div>
                <br>
                

                <!-- DISPLAY USER INFORMATION -->
                <div class="div-profile-info">
                    <h2>Information</h2>
                    <?php
                        $fullname = $user['first_name'].' '.$user['last_name'];
                        echo "<b>Full name:</b> ".$fullname.'<br>';
                        echo empty($user['age']) ? "<b>Age:</b> Not yet set<br>" : "<b>Age:</b> ".$user['age'].'<br>';
                        echo empty($user['email']) ? "<b>Email:</b> Not yet set<br>" : "<b>Email:</b> ".$user['email'].'<br>';
                        echo empty($user['location']) ? "<b>Location:</b> Not yet set<br>" : "<b>Location:</b> ".$user['location'].'<br>';

                        // EDIT PROFILE IS CLICKED
                        if(isset($_POST['edit_info']))
                            echo '<script> window.location="edit_profile.php"; </script>';
                    ?>
                    <form action="" method="post">
                        <br><button name='edit_info' class='button-style'>Edit profile</button>
                    </form>
                </div>
            </div>
            <br>
            <div class="div-profile-content-right">
                <!-- ITINERARY OF USER -->
                <div class="div-profile-itinerary">
                    <h1>My Plans</h1>
                    <?php
                        include 'config.php';
                        $sql = "SELECT * FROM itinerary WHERE user_id = $user[user_id]";
                        $plan_result = mysqli_query($conn, $sql);
                        $rows = mysqli_fetch_all($plan_result);
                        $len = count($rows);
                        if($len == 0) {
                            echo "<p><h2>You don't have plans yet</h2></p>";
                        }
                        else {
                            for($i = 0; $i < $len; $i++) {
                                $sql = "SELECT location_name FROM locations WHERE location_id=".$rows[$i][2];
                                $location_result = mysqli_query($conn, $sql);
                                $fetch = mysqli_fetch_array($location_result);
                                $location_name = $fetch['location_name'];

                                echo "<h2><a class='profile-links' href='view_itinerary.php?location_id=".$rows[$i][2]."&user_id=".$rows[$i][1]."'>Location: ".$location_name."</a></h2><br>";
                            }
                        }
                    ?>
                </div>
                <div class="div-body-margin"></div>

                <!-- FETCH USER'S BLOGS FROM DATABASE -->
                <div class="div-profile-blog">
                    <h1>My Blogs</h1>
                    <?php
                        $sql = "SELECT blog_id, blog_title, blog_description FROM blogs
                        WHERE user_id = $user[user_id]";
                        // echo $sql;
                        $results = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($results) != 0) {
                            $row = mysqli_fetch_all($results);
                            // echo "<pre>";
                            // print_r($row);
                            // echo "</pre>";
                            $row_length = count($row);
                            
                            // [$i][0] = blog_id
                            for($i = 0; $i < $row_length; $i++) {
                                for($j = 0; $j < 3; $j++) {
                                    if($j == 0) {
                                        $blog_id_array[$i] = $row[$i][$j];
                                    }
                                    elseif($j == 1)
                                        echo "<h2><a class='profile-links' href='view_blog.php?blog_id=".$row[$i][0]."'>Title: ".$row[$i][$j]."</a></h2><br>";
                                    else
                                        echo "Description: ".$row[$i][$j].'<br>';
                                }
                                echo "<br>";
                            }
                        }
                        else {
                            echo "<h2>You don't have blogs yet.</h2>";
                        }
                    ?>
                    <form action="create_blog.php" method="post">
                        <br>
                        <center><input class="button-style" type="submit" value="Create a Blog"></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>