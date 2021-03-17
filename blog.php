<!DOCTYPE html>
<html>
<head>
  <title>Blogs</title>
  <style>
          * {
              box-sizing: border-box;
            }

            /* Add a gray background color with some padding */
            body {
              font-family: Arial;
              padding: 20px;
             background-image: url(https://i.imgur.com/atdbjCR.jpg);
            }

            /* Header/Blog Title */
            .header {
              padding: 30px;
              font-size: 40px;
              text-align: center;
              background: white;
            }

            /* Create two unequal columns that floats next to each other */
            /* Left column */
            .leftcolumn {   
              float: left;
              width: 75%;
            }

            /* Right column */
            .rightcolumn {
              float: left;
              width: 25%;
              padding-left: 20px;
            }

            /* Fake image */
            img {
              background-color: #aaa;
              width: 100%;
              padding: 20px;
            }

            /* Add a card effect for articles */
            .card {
               background-color: white;
               padding: 20px;
               margin-top: 20px;
            }

            /* Clear floats after the columns */
            .row:after {
              content: "";
              display: table;
              clear: both;
            }

            /* Footer */
            .footer {
              padding: 20px;
              text-align: center;
              background: #ddd;
              margin-top: 20px;
            }

            @media screen and (max-width: 800px) {
              .leftcolumn, .rightcolumn {   
                width: 100%;
                padding: 0;
              }
            }
  </style>
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
     * ['blog_headerpic'] = profile picture from local folder
    */
    if(isset($_SESSION['login'])) {
        $user = $_SESSION['user'];

        // echo '<pre>';
        // print_r($_FILES);
        // print_r($user);
        // print_r($_SESSION);
        // echo '</pre>';

        if(isset($_POST['upload'])) {
            $filename = $user['username']."--".$_FILES['blogheaderpic']['name'];
            // echo $filename;
            $path = "images/".$filename;
            // echo $path;
    
            if(move_uploaded_file($_FILES['blogheaderpic']['tmp_name'], $path)) {
                include 'config.php';
    
                $sql = "UPDATE users SET profile_picture = '$filename' WHERE user_id = $user[user_id]";
                // echo $sql;``
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
    }
?>
</head>
<body>
  <?php include 'navbar.php'; ?>
    <div class="header">
  <h2 contenteditable="true">Blog Title</h2>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2 contenteditable="true">TITLE HEADING</h2>
      <h5 contenteditable="true">Title description, date</h5>
            <?php
              $filename = "default_icon.png";
              if(!empty($user['profile_picture']))
                $filename = $user['profile_picture']; 

            ?>
        <img src="images/<?php echo $filename; ?>" alt="Profile-Picture-Here" style="height: 500px;">
        <form method="post" enctype="multipart/form-data">
            <br>
            <label for="">Select photo:</label>
            <br>
            <input type="file" name="blogheaderpic">
            <br>
            <input type="submit" name="upload" value="Upload Photo">    
        </form>
      <p contenteditable="true">BODY HERE</p>
    </div>
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2>About Me</h2>
      <p contenteditable="true">content</p>
    </div>
    <div class="card">
      <h3>Gallery</h3>
    </div>
  </div>
</div>

<div class="footer">
  <h2>Footer</h2>
</div>
</body>
</html>