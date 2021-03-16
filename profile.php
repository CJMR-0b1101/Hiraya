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
                    $_SESSION['profile_picture'] = $filename;
                    $user = $_SESSION['user'];
                    
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
	}
?>

<h1>Hi <?php echo $user['first_name'].' '.$user['last_name']; ?></h1>

<div>
    <?php
		$filename = "default_icon.png";
		if(!empty($user['profile_picture']))
			$filename = $user['profile_picture'];

	?>
    <img src="<?php echo $filename; ?>" alt="Profile-Picture-Here" width="100px">
	<form method="post" enctype="multipart/form-data">
        <br>
		<label for="">Select photo:</label>
		<br>
		<input type="file" name="profilepic">
		<br>
		<input type="submit" name="upload" value="Upload Photo">	
	</form>
</div>
<a href="home_page.php">Back to Home Page</a>
<br>
<a href="blog.php">This way to Blog page</a>