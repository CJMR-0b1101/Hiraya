<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>

<script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>


<body class="main-body">
    <div class="div-body">
        <?php
            include 'navbar.php';
            if(isset($_SESSION['login'])) {
                $user = $_SESSION['user'];
                $file_upload_msg = "";

                if(isset($_POST['upload'])) {
                    // NO FILE CHOSEN
                    if(empty($_FILES['profilepic']['name'])) {
                        $file_upload_msg = "<h3 style = 'color:red;'>Please choose file before clicking \"Upload Photo\".</h3>";
                    }
                    // FILE CHOSEN
                    else {
                        $filename = $user['username'].rand().".jpg";
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
        ?>

        <!-- PROFILE PICTURE SECTION -->
        <div class="div-body-margin"></div>
        <div class="div-content">
            <div class="div-profile-content-left">
                <div class="div-profile-picture">
                    <?php
                        $filename = "default_icon.png";
                        if(!empty($user['profile_picture']))
                            $filename = $user['profile_picture'];
                    ?>
                    <center><img src="images/<?php echo $filename; ?>" alt="Profile-Picture-Here">
                    <h3><?php echo $user['username']; ?></h3></center>
                    <form method="post" enctype="multipart/form-data">
                        <br>
                        <label for="">Select photo:</label>
                        <br>
                        <input class="btn-upload" type="file" name="profilepic">
                        <br>
                        <center><input class="btn-submit" type="submit" name="upload" value="Upload Photo"></center>
                    </form>
                    <!-- DISPLAY FILE UPLOAD STATUS MESSAGE -->
                    <?php echo $file_upload_msg; ?>
                </div>
                <div class="div-body-margin"></div>

                <!-- DISPLAY USER INFORMATION -->
                <div class="div-profile-info">
                    <h3>Information</h3>
                    <form action="" method="post">
                        <?php
                            include 'input_validation.php';

                            $valid_edit = true;
                            $status_msg = "";
                            $new_fn = $user['first_name'];
                            $new_ln = $user['last_name'];
                            $new_pw = "";
                            $cnew_pw = "";
                            $age = $user['age'];
                            $email = $user['email'];
                            $location = $user['location'];

                            // SAVE CHANGES BUTTON IS CLICKED
                            if(isset($_POST['save'])) {
                                $new_fn = empty($_POST['new_fn']) ? $user['first_name'] : $_POST['new_fn'];
                                $new_ln = empty($_POST['new_ln']) ? $user['last_name'] : $_POST['new_ln'];
                                $new_pw = $_POST['new_pw'];
                                $cnew_pw = $_POST['cnew_pw'];
                                $age = $_POST['age'];
                                $email = $_POST['email'];
                                $location = $_POST['location'];
                                
                                if($new_pw != $cnew_pw) {
                                    $status_msg = "<h4 style = 'color:red;'>Confirm password should be the same with password.</h4>";
                                }
                                else {
                                    if(!isValidAge($age)) {
                                        $status_msg = "<h4 style = 'color:red;'>Age should be a number.</h4>";
                                    }
                                    else {
                                        if(updateProfileInfo($new_fn, $new_ln, $new_pw, $age, $email, $location))
                                            $status_msg = "<h4 style = 'color:green;'>Profile updated.</h4>";
                                        else
                                            $status_msg = "<h4 style = 'color:red;'>Profile update failed.</h4>";
                                    }
                                }
                            }
                            // CANCEL BUTTON IS CLICKED
                            if(isset($_POST['cancel'])) {
                                echo'<script> window.location="profile.php"; </script>';
                            }

                            $details = fetchDetails($user['user_id']);
                            $_SESSION['user']['age'] = $user['age'] = $details['age'];
                            $_SESSION['user']['email'] = $user['email'] = $details['email'];
                            $_SESSION['user']['location'] = $user['location'] = $details['location'];
                            
                            // echo '<pre>';
                            // print_r($_SESSION);
                            // echo '</pre>';

                            // FETCH USER DETAILS FROM DATABASE
                            function fetchDetails($uid) {
                                include 'config.php';

                                $sql = "SELECT first_name, last_name, password, age, email, location FROM users WHERE user_id = $uid";
                                $result = mysqli_query($conn, $sql);

                                if($result) {
                                    $row = mysqli_fetch_array($result);
                                    return $row;
                                }
                                else {
                                    echo "Error in fetching details.";
                                }
                            }

                            // UPDATE DATABASE
                            function updateProfileInfo($new_fn, $new_ln, $new_pw, $age, $email, $loc) {
                                include 'config.php';
                                
                                $sql = "SELECT password FROM users WHERE user_id = $user[user_id]";
                                $result = mysqli_query($conn, $sql);

                                if($result) {
                                    $row = mysqli_fetch_array($result);
                                    echo $row['password'];
                                }
                                // $new_pw = !empty($new_pw) ? sha1($new_pw) : "";

                                // $sql = "UPDATE ";
                                return true;
                            }
                        ?>
                        <p><input type="text" name="new_fn" placeHolder='First name' value='<?php echo $new_fn ?>'></p>
                        <p><input type="text" name="new_ln" placeHolder='Last name' value='<?php echo $new_ln ?>'></p>
                        <p><input type="password" name="new_pw" placeHolder='New password'></p>
                        <p><input type="password" name="cnew_pw" placeHolder='Confirm new password'></p>
                        <p><input type="text" name="age" placeHolder='Age' value='<?php echo $age ?>'></p>
                        <p><input type="text" name="email" placeHolder='Email' value='<?php $email ?>'></p>
                        <p><input type="text" name="location" placeHolder='Location' value='<?php $location ?>'></p>

                        <button name='save' type="submit">Save changes</button>
                        <button name='cancel' type="submit">Cancel</button>

                        <!-- STATUS MESSAGE -->
                        <?php echo $status_msg; ?>
                    </form>
                </div>
            </div>

            <div class="div-profile-content-right">
                <!-- ITINERARY OF USER -->
                <div class="div-profile-itinerary">
                    <h3>My Plans</h3>
                    <p>
                        In this section, the user's itinerary/plans
                        will be fetched from the database soon. 
                    </p>
                </div>
                <div class="div-body-margin"></div>

                <!-- FETCH USER'S BLOGS FROM DATABASE -->
                <div class="div-profile-blog">
                    <h3>My Blogs</h3>
                    <?php
                        include 'config.php';
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
                                        echo "<a href='view_blog.php?blog_id=".$row[$i][0]."'>Title: ".$row[$i][$j]."</a><br>";
                                    else
                                        echo "Description: ".$row[$i][$j].'<br>';
                                }
                                echo "<br>";
                            }
                        }
                        else {
                            echo "You don't have blogs yet.";
                        }
                    ?>
                    <form action="create_blog.php" method="post">
                        <br>
                        <center><input class="profile-submit" type="submit" value="Create a Blog"></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>