<!DOCTYPE html>
<html>
<head>
  <title>Edit Blog</title>
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

    if(isset($_SESSION['login'])) {
        $user = $_SESSION['user'];

        // echo '<pre>';
        // print_r($_FILES);
        // print_r($user);
        // print_r($_SESSION);
        // echo '</pre>';

        // FETCH BLOG HEADER FROM DB
        include 'config.php';

        // $sql = "SELECT blog_id FROM blogs WHERE user_id = $user[user_id]";
        $sql = "SELECT blog_header FROM blogs WHERE user_id = $user[user_id]";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1) {
          $row = mysqli_fetch_array($result);
    
          $filename = $row['blog_header'];
        } 
        else {
          $filename = 'default_header.png';
        }
        
        if(isset($_POST['save_changes'])) {
          // Get values from text areas
          $blog_title = $_POST['blog_title'];
          $blog_titlehead = $_POST['blog_titlehead'];
          $blog_desc = $_POST['blog_desc'];
          $blog_content = $_POST['blog_body'];

          echo "<pre>";
          print_r($_POST);
          echo "</pre>";

          if(!empty($_FILES['blogheaderpic']['name'])) {
            $filename = $user['username']."--".$_FILES['blogheaderpic']['name'];
            // echo $filename;
            $path = "images/".$filename;
            
            if(move_uploaded_file($_FILES['blogheaderpic']['tmp_name'], $path)) {  
                echo "<h2 style = 'color:green;'>Image updated!</h2>";
            }
            else {
              echo "<h2 style = 'color:red;'>Error in uploading file.</h2>";
            }
          }

          // // Insert to DB
          // $uid =  $user['user_id'];

          // $sql = "INSERT INTO blogs(user_id, blog_title, blog_description, blog_content, blog_header)
          // VALUES($uid, '$blog_title', '$blog_desc', '$blog_content', '$filename')";
          // // echo $sql;
          // $result = mysqli_query($conn, $sql);

          // if($result) {
          //     echo "<h2 style = 'color:green;'>Inserted successfully.</h2>";
          //     // echo '<pre>';
          //     // print_r($user);
          //     // echo '</pre>';
          // }
          // else
          //   echo "<h2 style = 'color:red;'>Error in inserting.</h2>";  
        }
    }
  ?>
</head>

<body>
  <?php include 'navbar.php'; ?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="header">
      <br>
      <textarea style="font-size: 50px; text-align: center" name="blog_title" id="" cols="30" rows="1">Blog Title</textarea>
      <br>
    <!-- </form> -->
  </div>

  <div class="row">
    <div class="leftcolumn">
        <div class="card">
          <!-- <form action="" method="post" enctype="multipart/form-data"> -->
            <textarea style="font-size: 28px;" name="blog_titlehead" id="" cols="20" rows="1">TITLE HEADING</textarea>
            <br><br>
            <textarea name="blog_desc" id="" cols="50" rows="1">Title description, date</textarea>
            <br><br>

            <img src="blog_images/<?php echo $filename; ?>" alt="Blog-Header-Picture-Here" style="height: 500px;">
            
              <br>
              <label for="">Select photo:</label>
              <br>
              <input type="file" name="blogheaderpic">
              <br><br>
              <textarea name="blog_body" id="" cols="50" rows="5">Body Here</textarea>
              <br>
            <input type="submit" name="save_changes" value="Save Changes">   
          <!-- </form> -->
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
</form>

<div class="footer">
  <h2>Footer</h2>
</div>
</body>
</html>