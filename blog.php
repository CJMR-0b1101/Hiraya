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
    */
    if(isset($_SESSION['login'])) {
        $user = $_SESSION['user'];

        // echo '<pre>';
        // print_r($_FILES);
        // print_r($user);
        // print_r($_SESSION);
        // echo '</pre>';

        // FETCH BLOG HEADER FROM DB
        include 'config.php';

        $sql = "SELECT blog_header FROM blogs WHERE user_id = $user[user_id]";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1) {
          $row = mysqli_fetch_array($result);
    
          $filename = $row['blog_header'];
        } 
        else {
          $filename = 'default_header.png';
        }
        
        // echo "Filename: $filename";
        
        if(isset($_POST['save_changes'])) {
          if(empty($filename)) {
            $filename = $user['username']."--".$_FILES['blogheaderpic']['name'];
            // echo $filename;
            $path = "blog_images/".$filename;
            // echo $path;
    
            if(move_uploaded_file($_FILES['blogheaderpic']['tmp_name'], $path)) {
                $uid =  $user['user_id'];
                $blog_title = "BLOG TITLE";
                $blog_desc = "DESCRIPTION";
                $blog_content = "This is taken from Boracay.";

                $sql = "INSERT INTO blogs(user_id, blog_title, blog_description, blog_content, blog_header)
                VALUES($uid, '$blog_title', '$blog_desc', '$blog_content', '$filename')";
                // echo $sql;
                $result = mysqli_query($conn, $sql);
    
                if($result) {
                    echo "<h2 style = 'color:green;'>File uploaded successfully.</h2>";
                    
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
        <img src="blog_images/<?php echo $filename; ?>" alt="Blog-Header-Picture-Here" style="height: 500px;">
        <form method="post" enctype="multipart/form-data">
            <br>
            <label for="">Select photo:</label>
            <br>
            <input type="file" name="blogheaderpic">
            <br> 
        </form>
      <p contenteditable="true">Body Here</p>
      <form action="" method="post">
        <input type="submit" name="save_changes" value="Save Changes">   
      </form>
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