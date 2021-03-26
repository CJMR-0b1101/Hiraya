<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>

<script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
<style>

.div-profile-picture{
    float:center;
}
.div-body{
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
  /* color:#A5CC82; */
  color: black;
  padding: 7px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
}
.button-style:hover {
  background-image: url(https://i.imgur.com/hi3eFOb.jpg);
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
                </div>
                <div class="div-body-margin"></div>

                <!-- DISPLAY USER INFORMATION -->
                <div class="div-profile-info">
                    <h3>Information</h3>
                    <?php
                        $fullname = $user['first_name'].' '.$user['last_name'];
                        echo "Full name: ".$fullname.'<br>';
                        echo empty($user['age']) ? "Age: Not yet set<br>" : "Age: ".$user['age'].'<br>';
                        echo empty($user['email']) ? "Email: Not yet set<br>" : "Email: ".$user['email'].'<br>';
                        echo empty($user['location']) ? "Location: Not yet set<br>" : "Location: ".$user['location'].'<br>';

                        // EDIT PROFILE IS CLICKED
                        if(isset($_POST['edit_info']))
                            echo '<script> window.location="edit_profile.php"; </script>';
                    ?>
                    <form action="" method="post">
                        <br><button name='edit_info' class='button-style'>Edit profile</button>
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
                        <center><input class="button-style" type="submit" value="Create a Blog"></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>