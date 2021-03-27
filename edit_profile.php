<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>

<script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>

<style>
    .main-body{
        float:center;
        background-image: url(https://i.imgur.com/bYsVdHu.png);
    }
    .div-body {
        max-width: 300px;
        margin-left: 50px;
        text-align: center;
    }
    .button-style{
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
    input[type=text], input[type=password] {
        width: 50%;
    }
</style>

<body class="main-body">
<?php include 'navbar.php'?>
    <div class="div-body">
        <?php
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
            else {
                echo '<script> window.location.replace("index.php") </script>';
            }
        ?>

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
                    <h3><?php echo $user['username']; ?></h3></center>
                    <form method="post" enctype="multipart/form-data">
                        <br>
                        <label for="">Browse:</label>
                        <br>
                        <input class="btn-upload" type="file" name="profilepic">
                        <br>
                        <center><input class="button-style" type="submit" name="upload" value="Upload Photo"></center>
                    </form>
                    <!-- DISPLAY FILE UPLOAD STATUS MESSAGE -->
                    <?php echo $file_upload_msg; ?>
                </div>
                

                <!-- DISPLAY USER INFORMATION -->
                <div class="div-profile-info">
                    <h3>Information</h3>
                    <form action="" method="post">
                        <?php
                            include 'input_validation.php';

                            $status_msg = "";
                            $uid = $user['user_id'];
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
                                $age = empty($_POST['age']) ? $user['age'] : $_POST['age'];
                                $email = empty($_POST['email']) ? $user['email'] : $_POST['email'];
                                $location = empty($_POST['location']) ? $user['location'] : $_POST['location'];
                                
                                if($new_pw != $cnew_pw) {
                                    $status_msg = "<h4 style = 'color:red;'>Confirm password should be the same with password.</h4>";
                                }
                                else {
                                    if(!isValidAge($age)) {
                                        $status_msg = "<h4 style = 'color:red;'>Age should be a number.</h4>";
                                    }
                                    else {
                                        if(updateProfileInfo($new_fn, $new_ln, $new_pw, $age, $email, $location, $uid)) {
                                            $status_msg = "<h4 style = 'color:green;'>Profile updated.</h4>";
                                            $details = fetchDetails($user['user_id']);
                                            
                                            // echo '<pre>';
                                            // print_r($details);
                                            // echo '</pre>';

                                            $_SESSION['user']['first_name'] = $new_fn;
                                            $_SESSION['user']['last_name'] = $new_ln;
                                            $_SESSION['user']['age'] = $user['age'] = $details['age'];
                                            $_SESSION['user']['email'] = $user['email'] = $details['email'];
                                            $_SESSION['user']['location'] = $user['location'] = $details['location'];
                                        }
                                        else
                                            $status_msg = "<h4 style = 'color:red;'>Profile update failed.</h4>";
                                    }
                                }
                            }
                            // CANCEL BUTTON IS CLICKED
                            if(isset($_POST['cancel'])) {
                                echo'<script> window.location="profile.php"; </script>';
                            }
                            
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
                            function updateProfileInfo($new_fn, $new_ln, $new_pw, $age, $email, $loc, $uid) {
                                include 'config.php';
                                
                                // FETCH CURRENT PASSWORD
                                $sql = "SELECT password FROM users WHERE user_id = $uid";
                                $result = mysqli_query($conn, $sql);
                                if($result) {
                                    $row = mysqli_fetch_array($result);
                                    $new_pw = !empty($new_pw) ? sha1($new_pw): $row['password'];
                                }

                                $sql = "UPDATE users SET first_name = '$new_fn', last_name = '$new_ln', password = '$new_pw',
                                age = '$age', email = '$email', location = '$loc' WHERE user_id = $uid";
                                // echo $sql;

                                $result = mysqli_query($conn, $sql);
                                if($result) {
                                    return true;
                                }
                                else {
                                    return false;
                                }
                            }
                        ?>
                        <p><input type="text" name="new_fn" placeHolder='First name' value='<?php echo $new_fn ?>'></p>
                        <p><input type="text" name="new_ln" placeHolder='Last name' value='<?php echo $new_ln ?>'></p>
                        <p><input type="password" name="new_pw" placeHolder='New password'></p>
                        <p><input type="password" name="cnew_pw" placeHolder='Confirm new password'></p>
                        <p><input type="text" name="age" placeHolder='Age' value='<?php echo $age ?>'></p>
                        <p><input type="text" name="email" placeHolder='Email' value='<?php echo $email ?>'></p>
                        <p><input type="text" name="location" placeHolder='Location' value='<?php echo $location ?>'></p>

                        <button class='button-style' name='save' type="submit">Save changes</button>
                        <button class='button-style' name='cancel' type="submit">Cancel</button>

                        <!-- STATUS MESSAGE -->
                        <?php echo $status_msg; ?>
                    </form>
                </div>
            </div>

          
        </div>
    </div>
</body>
</html>