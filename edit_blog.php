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
            /*  Drag and drop box for Gallery */
            .dropzone {
              width: 300px;
              height: 300px;
              border: 2px dashed #ccc;
              color: #ccc;
              line-height: 300px;
              text-align: center;
            }
            .dropzone.dragover {
              border-color: black;
              color: black;
            }
  </style>
  <?php
    session_start();
    
    if(isset($_SESSION['login'])) {
      // VARIABLES
      $user = $_SESSION['user'];

      // IF USER TRIED TO ACCESS EDIT BLOG WITHOUT PERMISSION
      if(!isset($_GET['blog_id']) || !isset($_GET['user_id'])) {
        header("location: home_page.php");
      }
      elseif($user['user_id'] != $_GET['user_id']) {
        header("location: home_page.php");
      }

      // Query from Database
      include 'config.php';
      $blog_id = $_GET['blog_id'];

      $sql = "SELECT * FROM blogs WHERE blog_id=$blog_id";
      $result = mysqli_query($conn, $sql);

      if(mysqli_num_rows($result) == 1) {
        // echo "FOUND THE BLOG";
        $row = mysqli_fetch_array($result);
        $filename = $row['blog_header'];
        $blog_title = $row['blog_title'];
        $blog_desc = $row['blog_description'];
        $blog_content = $row['blog_content'];
        $about_me = $row['about_me'];
      }

      $file_upload_msg = '';
      $update_db_msg = '';
      $gallery_file_upload_msg = "";

      if(isset($_POST['save'])) {
        // Get values from text areas
        $blog_title = $_POST['blog_title'];
        $blog_desc = $_POST['blog_desc'];
        $blog_content = $_POST['blog_body'];
        $about_me = $_POST['about_me'];
        
        // UPDATE BLOG
        $sql = "UPDATE blogs
                  SET blog_title='$blog_title', blog_description='$blog_desc', 
                      blog_content='$blog_content', about_me='$about_me'
                  WHERE blog_id=$blog_id";
        // echo $sql;
        $result = mysqli_query($conn, $sql);

        if($result) {
          $update_db_msg = "<h3 style = 'color:green;'>Blog updated!.</h3>";
        }
        // IF BLOG HEADER PICTURE IS CHOSEN
        if(!empty($_FILES['blogheaderpic']['name'])) {
          $path = "blog_images/".$filename;
          
          if((move_uploaded_file($_FILES['blogheaderpic']['tmp_name'], $path))) {
            // header("location: $url");
            // IF GALLERY HAS ATLEAST 1 FILE
            // if(isset($_COOKIE['uploads'])) {
            //   // echo "COOKIE";
            //   $file_upload_msg = "<h3 style = 'color:green;'>Images uploaded!</h3>";

            //   // $gallery_files = unserialize($_COOKIE['uploads'], ["allowed_classes" => false]);
            //   // $len = count($gallery_files);

            //   // setcookie('uploads', "", time() - 3600);
              


            //   if($result) {
            //     // INSERT TO DATABASE (GALLERY TABLE)
            //     $blog_id = queryBlogID($conn);
                
            //     for($i = 0; $i < $len; $i++) {
            //       $file = $gallery_files[$i]['file'];
            //       $sql = "INSERT INTO gallery(blog_id, user_id, picture_name)
            //       VALUES($blog_id, $uid, '$file')";
            //       $result = mysqli_query($conn, $sql);
            //       if($result) {
            //         $update_db_msg = "<h3 style = 'color:green;'>Blog created!</h3>";
            //       }
            //       else {
            //         $update_db_msg = "<h2 style = 'color:red;'>Error in inserting to gallery.</h2>";
            //       }
            //     }
            //   }
            //   else
            //       $update_db_msg = "<h2 style = 'color:red;'>Error in inserting.</h2>"; 
            // }
            // else {
            //   $file_upload_msg = "<h3 style = 'color:red;'>Please upload atleast 1 image for your gallery.</h3>";
            // }
          }
          else {
            $file_upload_msg = "<h3 style = 'color:red;'>Error in uploading file.</h3>";
          }
        }

        // UPDATE GALLERY
       
      }
    }
  ?>
</head>

<body>
  <?php include 'navbar.php'; ?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="header">
      <br>
      <!-- BLOG TITLE TEXTAREA-->
      <textarea style="resize: none; font-size: 50px; text-align: center; border: none;" 
      name="blog_title" id="" cols="30" rows="1" placeholder="Your blog title here" required><?php echo $blog_title?></textarea>
      <br>
  </div>

  <div class="row">
    <div class="leftcolumn">
        <div class="card">
            <!-- BLOG DESCRIPTION TEXTAREA-->
            <textarea style="resize: none; border: none;" name="blog_desc" id="" cols="100" rows="1" 
            placeholder="Your blog description here" required><?php echo $blog_desc?></textarea>
            <br><br>

            <img src="blog_images/<?php echo $filename; ?>" alt="Blog-Header-Picture-Here" style="height: 500px;">
            
              <br>
              <label for="">Select photo:</label>
              <br>
              <input type="file" name="blogheaderpic">
              <br><br>
              <!-- BLOG BODY TEXTAREA -->
              <textarea style="resize: none;" name="blog_body" id="" cols="139" rows="5" 
              placeholder="Your blog content here" required><?php echo $blog_content?></textarea>
              <br>
              <?php 
                // echo $file_upload_msg;
                echo $update_db_msg;
                echo $gallery_file_upload_msg;
              ?>
            <input type="submit" name="save" value="Save changes">   
      </div>
    </div>

    <!-- ABOUT ME -->
    <div class="rightcolumn">
      <div class="card">
        <h2>About Me</h2>
        <textarea style="resize: none;" name="about_me" id="" cols="38" rows="10" 
              placeholder="Tell us about yourself" required><?php echo $about_me?></textarea>
      </div>

      <!-- GALLERY -->
      <div class="card">
        <h3>Gallery</h3>
          <?php 
            $sql = "SELECT picture_id, picture_name from gallery WHERE blog_id=$blog_id";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)) {
              // echo "FOUND THE GALLERY";
              $rows = mysqli_fetch_all($result);
              // echo "<pre>";
              // print_r($rows);
              // echo "</pre>";
              for($i = 0; $i < count($rows); $i++) {
                $currfile = $rows[$i][1];
                // echo $currfile."<br>";
                echo  "<a href='blog_images/".$currfile."'><img style='width: 100px; object-fit: cover;' src='blog_images/".$currfile."'  /></a>";
                echo "<a href='#'>Delete file".$rows[$i][0]."</a><br>";
              }
              
              for($i = 0; $i < 4; $i++) {
                echo "<input type='file' name='gallery$i'>";
              }
            }
          ?>
      </div>
    </div>
  </div>
</form>

<div class="footer">
  <h2>Footer</h2>
</div>
</body>
</html>