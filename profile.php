<link rel="stylesheet" href="styles.css">
<style>
 /* HEADER STYLES*/
            div.header1{
                border: 1px solid #e7e7e7;
                background-image: url(https://i.imgur.com/atdbjCR.jpg)  ;
                font-size: 30px;
                
                font-family: 'Acme', sans-serif;
            }
            .headername{
                font-size: 30px;
                padding-bottom: -50px;
                padding-top:-60px;
                margin-top: -250px;
                margin-left: 500px;
                font-family: 'Acme', sans-serif;
                letter-spacing: 3px;
            }
            .headertitle{
                margin-top: -80px;
                font-size: 20px;
                font-family: 'Acme', sans-serif;
                letter-spacing: 4px;
            }
            .left{
            background: transparent;
            width: 250px;
            margin-left: 380px;
            padding-bottom: -30px;
            }
            .left .img_holder{
                text-align: center;
                margin-left: -500px;
            }

            .left .img_holder img{

                width: 500px;
                border-radius: 20%;
                padding-top: 50px;
                padding-bottom: -30px;
            }
            img{
                max-width: 100%;
                height: 50%;
            }
</style>
<script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
<?php
    session_start();

    /** $user array indices
     * 
     * ['user_id'] = user_id
     * ['username'] = username
     * ['first_name] = first_name
     * ['last_name] = last_name
     * ['age'] = age
     * ['email'] = email
     * ['location'] = location
     * ['profile_picture'] = profile_picture from DB
     * ['profilepic'] = profile picture from local folder
    */
	if(isset($_SESSION['login'])) {
		$user = $_SESSION['user'];

        // echo '<pre>';
        // print_r($_FILES);
        // print_r($user);
        // print_r($_SESSION);
        // echo '</pre>';

        if(isset($_POST['upload'])) {
            $filename = $user['username']."--".$_FILES['profilepic']['name'];
            // echo $filename;
            $path = "images/".$filename;
            // echo $path;
    
            if(move_uploaded_file($_FILES['profilepic']['tmp_name'], $path)) {
                include 'config.php';
    
                $sql = "UPDATE users SET profile_picture = '$filename' WHERE user_id = $user[user_id]";
                // echo $sql;
                $result = mysqli_query($conn, $sql);
    
                if($result) {
                    echo "<h2 style = 'color:green;'>File uploaded successfully.</h2>";
                    $user['profile_picture'] = $filename;
                    $_SESSION['user'] = $user;
                    
                    // echo '<pre>';
                    // print_r($user);
                    // echo '</pre>';
                }
                else
                    echo "<h2 style = 'color:red;'>Error in updating.</h2>";	
            }
            else {
                echo "<h2 style = 'color:red;'>Error in uploading file.</h2>";
            }
        }
        else {
            $filename = $user['profile_picture'];
        }
	}
?>
<?php include 'navbar.php'; ?>
<div class="maincontainer">
    <div class="header1">
        <div class="left">
            <div class="img_holder">
                <img src="images/<?php echo $filename; ?>" alt="Profile-Picture-Here" width="100px">
                    <?php
                    $filename = "default_icon.png";
                    if(!empty($user['profile_picture']))
                        $filename = $user['profile_picture']; 
                    ?>
                    <form method="post" enctype="multipart/form-data">
                        <br>
                        <label for="">Select photo:</label>
                        <br>
                        <input type="file" name="profilepic">
                        <br>
                        <input type="submit" name="upload" value="Upload Photo">    
                    </form>
            </div>
        </div>
        <div class="headername">
            <h1><?php echo $user['first_name'].' '.$user['last_name']; ?></h1>
            <br>
            <a href="create_blog.php">CREATE BLOG</a>
            <br>
            <a href="edit_blog.php">EDIT BLOG</a>
            <br>
            <a href="view_blog_list.php">VIEW MY BLOGS</a>
        </div>

    </div>
</div>
