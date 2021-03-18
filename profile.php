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

                width: 300px;
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
    include 'navbar.php';
    
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
                $filename = $user['username']."--".$_FILES['profilepic']['name'];
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
<div style="border: 1px solid black; width: 300px;">
    <?php
        $filename = "default_icon.png";
        if(!empty($user['profile_picture']))
            $filename = $user['profile_picture']; 
    ?>
    <img style="height: 25%" src="images/<?php echo $filename; ?>" alt="Profile-Picture-Here">
    <h3><?php echo $user['username']; ?></h3>
    <form method="post" enctype="multipart/form-data">
        <br>
        <label for="">Select photo:</label>
        <br>
        <input type="file" name="profilepic">
        <br>
        <input type="submit" name="upload" value="Upload Photo">
        <br>   
    </form>
    <!-- DISPLAY FILE UPLOAD STATUS MESSAGE -->
    <?php echo $file_upload_msg; ?>
</div>

<!-- DISPLAY USER INFORMATION -->
<div style="border: 1px solid black; width: 300px;">
    <h3>Information</h3>
    <?php 
        echo "Full name: ".$user['first_name'].' '.$user['last_name'].'<br>';
        // echo "Username: ".$user['username'].'<br>';
        echo empty($user['age']) ? "Age: Not yet set<br>" : "Age: ".$user['age'].'<br>';
        echo empty($user['email']) ? "Email: Not yet set<br>" : "Email: ".$user['email'].'<br>';
        echo empty($user['location']) ? "Location: Not yet set<br>" : "Location: ".$user['location'].'<br>';
    ?>
</div>

<!-- ITINERARY OF USER -->
<div style="border: 1px solid black; width: 300px;">
    <h3>My Plans</h3>
    <p>
        In this section, the user's itinerary/plans
        will be fetched from the database soon. 
    </p>
</div>

<!-- FETCH USER'S BLOGS FROM DATABASE -->
<div style="border: 1px solid black; width: 300px;">
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

            for($i = 0; $i < $row_length; $i++) {
                for($j = 1; $j < 3; $j++) {
                    $temp = $j == 1? "Title: " : "Description: ";
                    echo $temp.$row[$i][$j].'<br>';
                }
                echo "<br>";
            }
        }
        else {
            echo "<h3>You don't have blogs yet.</h3>";
        }
    ?>
</div>