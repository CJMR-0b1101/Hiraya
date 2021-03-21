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

  <!-- MAIN PROGRAM STARTS HERE -->
  <?php
    session_start();

    if(isset($_SESSION['login'])) {
      // VARIABLES
      $ready = True;
      $user = $_SESSION['user'];
      $username = $user['username'];
      $uid =  $user['user_id'];
      $_SESSION['user']['up_count'] = 1;
      $blog_pic = 'default_header.jpg';
      $blog_title = '';
      $blog_desc = '';
      $blog_content = '';
      $about_me = '';
      $file_upload_msg = '';
      $insert_to_db_msg = '';
      $gallery_file_upload_msg = "";
      
      include 'config.php';
      $sql = "SELECT AUTO_INCREMENT
              FROM  INFORMATION_SCHEMA.TABLES
              WHERE TABLE_SCHEMA = 'hiraya_db'
              AND   TABLE_NAME   = 'blogs'";
      $result = mysqli_query($conn, $sql);

      if($result) {
        $row = mysqli_fetch_array($result);
        $blog_id = $row[0];
        $_SESSION['blog_id'] = $blog_id;
      }
      
      if(isset($_POST['create'])) {
        parseValues($blog_title, $blog_desc, $blog_content, $about_me);
        
        // BLOG HEADER PIC IS CHOSEN
        if(!empty($_FILES['blog_pic']['name'])) {
          $blog_pic = $username."-blog-".$blog_id.".jpg";
          $path = "blog_images/".$blog_pic;
          
          // MOVE BLOG HEADER PIC TO FOLDER
          if((move_uploaded_file($_FILES['blog_pic']['tmp_name'], $path))) {
            $file_upload_msg = "<h3 style = 'color:green;'>Images uploaded!</h3>";
          }
          else {
            $file_upload_msg = "<h3 style = 'color:red;'>Error in uploading file.</h3>";
          }
          
          // COUNT NUMBER OF CHOSEN PICS IN GALLERY
          $pics = 0;
          for($i = 0; $i < 4; $i++) {
            if(!empty($_FILES["gallery$i"]['name'])) {
              $pics++;
            }
          }

          echo $pics;
          // ATLEAST 1 GALLERY PIC IS CHOSEN
          if($pics != 0) {
            for($i = 0; $i < $pics; $i++) {
              $pic = $username.'-blog-'.$blog_id.'-gallery-pic-'.($i + 1).'.jpg';
              $gallery_path = "blog_images/".$pic;

              // MOVE GALLERY PIC TO FOLDER
              if((move_uploaded_file($_FILES["gallery$i"]['tmp_name'], $gallery_path))) {
                $file_upload_msg = "<h3 style = 'color:green;'>Images uploaded!</h3>";
              }
              else {
                $file_upload_msg = "<h3 style = 'color:red;'>Error in uploading gallery file.</h3>";
              }
            } 
          }
          else {
            $file_upload_msg = "<h3 style = 'color:red;'>Please upload atleast 1 picture for your gallery.</h3>";
            $ready = False;
          }

        }
        else {
          $file_upload_msg = "<h3 style = 'color:red;'>Please upload image for your blog.</h3>";
          $ready = False;
        }

        // INSERT TO DB
        if($ready) {
          createBlog($uid, $blog_title, $blog_desc, $blog_content, $blog_pic, $about_me);
        }
      }
    }

    // FUNCTIONS
    function parseValues(&$blog_title, &$blog_desc, &$blog_content, &$about_me) {
      // Get values from text areas
      $blog_title = $_POST['blog_title'];
      $blog_desc = $_POST['blog_desc'];
      $blog_content = $_POST['blog_body'];
      $about_me = $_POST['about_me'];
    }
    function createBlog($uid, $blog_title, $blog_desc, $blog_content, $blog_pic, $about_me) {
      include 'config.php';
      // INSERT TO BLOGS TABLE
      $sql = "INSERT INTO blogs(user_id, blog_title, blog_description, blog_content, blog_header, about_me)
      VALUES($uid, '$blog_title', '$blog_desc', '$blog_content', '$blog_pic', '$about_me')";     
      // echo $sql;
      $result = mysqli_query($conn, $sql);

      if($result) {
        $file_upload_msg = "";
        $insert_to_db_msg = "Blog created!";
        // redirectConfirmation($blog_id, $uid);
      }
      else {
          $insert_to_db_msg = "<h2 style = 'color:red;'>Error in inserting.</h2>"; 
      }
    }
    function redirectConfirmation($blog_id, $uid) {
      echo 
        '<script>
          var r = confirm("Blog created. View post?");
          if(r == true)
            window.location.replace("view_blog.php?blog_id='.$blog_id.'");
          else
            window.location.replace("edit_blog.php?blog_id='.$blog_id.'&user_id='.$uid.'")
        </script>';
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

              <!-- BLOG IMAGE HEADER -->
              <img src="blog_images/<?php echo $blog_pic; ?>" alt="Blog-Header-Picture-Here" style="height: 500px;">
                <br>
                <label for="">Select photo:</label>
                <br>
                <input type="file" name="blog_pic">
                <br><br>

                <!-- BLOG BODY TEXTAREA -->
                <textarea style="resize: none;" name="blog_body" id="" cols="139" rows="5" 
                placeholder="Your blog content here" required><?php echo $blog_content?></textarea>
                <br>
                <?php 
                  echo $file_upload_msg;
                  echo $insert_to_db_msg;
                  echo $gallery_file_upload_msg;
                ?>
              <input type="submit" name="create" value="Create post">   

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

            <!-- UPLOAD FILES -->
            <div>
              <?php
                for($i = 0; $i < 4; $i++) {
                  echo "<input type='file' name='gallery$i'>";
                }
              ?>
            </div>

        </div>
      </div>
    </div>
  </form>

  <div class="footer">
    <h2>Footer</h2>
  </div>
</body>
</html>