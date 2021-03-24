<!DOCTYPE html>
<html>
<head>
  <title>Blogs</title>
</head>

<!-- MAIN PROGRAM STARTS HERE -->
<?php
  session_start();

  if(isset($_SESSION['login'])) {
    // VARIABLES
    $ready = True;
    $user = $_SESSION['user'];
    $username = $user['username'];
    $uid =  $user['user_id'];
    $blog_pic = 'default_header.jpg';
    $blog_title = '';
    $blog_desc = '';
    $blog_content = '';
    $about_me = '';
    $status_msg = '';
    $gallery_files = array();
    
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
          $status_msg = "<h3 style = 'color:green;'>Images uploaded!</h3>";
        }
        else {
          $status_msg = "<h3 style = 'color:red;'>Error in uploading file.</h3>";
        }
        
        // COUNT NUMBER OF CHOSEN PICS IN GALLERY
        $pics = 0;
        for($i = 0; $i < 4; $i++) {
          if(!empty($_FILES["gallery$i"]['name'])) {
            $pics++;
          }
        }

        // ATLEAST 1 GALLERY PIC IS CHOSEN
        if($pics != 0) {
          for($i = 0; $i < $pics; $i++) {
            $pic = $username.'-blog-'.$blog_id.'-gallery-pic-'.($i + 1).'.jpg';
            $gallery_path = "blog_images/".$pic;
            $gallery_files[] = $pic;

            // MOVE GALLERY PIC TO FOLDER
            if((move_uploaded_file($_FILES["gallery$i"]['tmp_name'], $gallery_path))) {
              $status_msg = "<h3 style = 'color:green;'>Images uploaded!</h3>";
            }
            else {
              $status_msg = "<h3 style = 'color:red;'>Error in uploading gallery file.</h3>";
            }
          } 
        }
        else {
          $status_msg = "<h3 style = 'color:red;'>Please upload atleast 1 picture for your gallery.</h3>";
          $ready = False;
        }

      }
      else {
        $status_msg = "<h3 style = 'color:red;'>Please upload image for your blog.</h3>";
        $ready = False;
      }

      // INSERT TO DB
      if($ready) {
        createBlog($uid, $blog_title, $blog_desc, $blog_content, $blog_pic, $about_me, $blog_id, $gallery_files, $status_msg);
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
  function createBlog($uid, $blog_title, $blog_desc, $blog_content, $blog_pic, $about_me, $blog_id, $gallery_files, &$status_msg) {
    include 'config.php';

    // INSERT TO BLOGS TABLE
    $sql = "INSERT INTO blogs(user_id, blog_title, blog_description, blog_content, blog_header, about_me)
    VALUES($uid, '$blog_title', '$blog_desc', '$blog_content', '$blog_pic', '$about_me')";     

    $result = mysqli_query($conn, $sql);

    if($result) {
      $status_msg = "Blog created.";
      
      // INSERT TO GALLERY TABLE
      for($i = 0; $i < count($gallery_files); $i++) {
        $sql = "INSERT INTO gallery(blog_id, user_id, picture_name)
        VALUES($blog_id, $uid, '$gallery_files[$i]')";
        $result = mysqli_query($conn, $sql);
        if($result) {
          $status_msg = "<h2 style = 'color:green;'>Blog created.</h2>"; 
        }
        else {
          $status_msg = "<h2 style = 'color:red;'>Error in inserting.</h2>"; 
        }
      }
      // redirectConfirmation($blog_id, $uid);
    }
    else {
        $status_msg = "<h2 style = 'color:red;'>Error in inserting.</h2>"; 
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

<body class="main-body">
  <div class="div-body">
    <?php include 'navbar.php'; ?>
    <div class="div-body-margin"></div>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="div-blog-header">
          <br>
          <!-- BLOG TITLE TEXTAREA-->
          <textarea class="blog-header-txt" name="blog_title" id="" cols="30" rows="1" placeholder="Your blog title here" required><?php echo $blog_title?></textarea>
          <br>
      </div>
      <div class="div-body-margin"></div>
      <div class="div-blog-row">
        <div class="div-blog-left">
            <div class="div-blog-card">

                <!-- BLOG DESCRIPTION TEXTAREA-->
                <textarea class="blog-desc-txt" name="blog_desc" id="" cols="100" rows="1" 
                placeholder="Your blog description here" required><?php echo $blog_desc?></textarea>
                <br><br>

                <!-- BLOG IMAGE HEADER -->
                <img class="div-blog-img" src="blog_images/<?php echo $blog_pic; ?>" alt="Blog-Header-Picture-Here">
                  <br>
                  <label for="">Select photo:</label>
                  <br>
                  <input class="btn-upload" type="file" name="blog_pic">
                  <br><br>

                  <!-- BLOG BODY TEXTAREA -->
                  <textarea class="blog-body-txt" name="blog_body" id="" cols="139" rows="5" 
                  placeholder="Your blog content here" required><?php echo $blog_content?></textarea>
                  <br>
                  <?php 
                    echo $status_msg;
                  ?>
                <input class="btn-submit" type="submit" name="create" value="Create post">   

          </div>
        </div>

        <!-- ABOUT ME -->
        <div class="div-blog-right">
          <div class="div-blog-card">
            <center><h2>About Me</h2></center>
            <textarea class="blog-about-txt" name="about_me" id="" cols="38" rows="10" 
                  placeholder="Tell us about yourself" required><?php echo $about_me?></textarea>
          </div>
          <div class="div-body-margin"></div>
          <!-- GALLERY -->
          <div class="div-blog-card">
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

    <div class="div-blog-footer">
      <h2>Footer</h2>
    </div>
  </div>
</body>
</html>