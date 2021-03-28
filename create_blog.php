<!DOCTYPE html>
<html>
<head>
  <title>Blogs</title>
</head>
<style>
  .main-body{
        float:center;
        background-image: url(https://i.imgur.com/bYsVdHu.png);
    }
  .button-style{
    font-size: 15px;
    font-family: 'Inconsolata', monospace;
    background-color: white;
    border: none;
    border-radius: 12px;
    border: 2px solid #747F42;
    color: #747F42;
    padding: 7px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px;
    cursor: pointer;
  }
  .button-style:hover {
    background-image: url(https://i.imgur.com/hi3eFOb.jpg);
    color: white;
  }
  .button-style:focus {
      outline: none;
      box-shadow: 0px 0px 2px #0066ff;
  }
</style>
<!-- MAIN PROGRAM STARTS HERE -->
<?php
  session_start();

  if(isset($_SESSION['login'])) {
    // VARIABLES
    $ready = true;
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
        parseAndFixValues($blog_title, $blog_desc, $blog_content, $about_me);
      
        $blog_pic = $username."-blog-".$blog_id."-".rand().".jpg";
        $path = "blog_images/".$blog_pic;
        
        // MOVE BLOG HEADER PIC TO FOLDER   
        if((move_uploaded_file($_FILES['blog_pic']['tmp_name'], $path))) {
            $status_msg = "<h3 style = 'color:green;'>Images uploaded!</h3>";
        }
        else {
            $status_msg = "<h3 style = 'color:red;'>Error in uploading file.</h3>";
        }
        // INSERT TO DB
        createBlog($uid, $blog_title, $blog_desc, $blog_content, $blog_pic, $about_me, $blog_id, $status_msg);
        parseValues($blog_title, $blog_desc, $blog_content, $about_me);
    }
  }
  else {
      echo '<script> window.location.replace("index.php") </script>';
  }

  // FUNCTIONS
  function parseAndFixValues(&$blog_title, &$blog_desc, &$blog_content, &$about_me) {
    // Get values from text areas
    include 'input_validation.php';
    $blog_title = fixString($_POST['blog_title']);
    $blog_desc = fixString($_POST['blog_desc']);
    $blog_content = fixString($_POST['blog_body']);
    $about_me = fixString($_POST['about_me']);
  }
  function parseValues(&$blog_title, &$blog_desc, &$blog_content, &$about_me) {
    // Get values from text areas
    $blog_title = $_POST['blog_title'];
    $blog_desc = $_POST['blog_desc'];
    $blog_content = $_POST['blog_body'];
    $about_me = $_POST['about_me'];
  }
  function createBlog($uid, $blog_title, $blog_desc, $blog_content, $blog_pic, $about_me, $blog_id, &$status_msg) {
    include 'config.php';

    // INSERT TO BLOGS TABLE
    $sql = "INSERT INTO blogs(user_id, blog_title, blog_description, blog_content, blog_header, about_me)
    VALUES($uid, '$blog_title', '$blog_desc', '$blog_content', '$blog_pic', '$about_me')";     
    $result = mysqli_query($conn, $sql);
    // echo $sql;

    if($result) {
      
      // INSERT 4 EMPTY FILES TO GALLERY TABLE
      for($i = 0; $i < 4; $i++) {
        $sql = "INSERT INTO gallery(blog_id, user_id, picture_name)
        VALUES($blog_id, $uid, '')";
        $gallery_result = mysqli_query($conn, $sql);
        if($gallery_result) {
          $status_msg = "<h3 style = 'color:green;'>Blog created.<br>Redirecting to post in 3 seconds...</h3>"; 
        }
        else {
          $status_msg = "<h3 style = 'color:red;'>Error in inserting gallery.</h3>"; 
        }
      }

      // CHECK IF THERE ARE FILES CHOSEN IN GALLERY FILE UPLOAD
      $sql = "SELECT picture_id FROM gallery WHERE blog_id =".$_SESSION['blog_id'];
      $gallery_result = mysqli_query($conn, $sql);

      $rows = mysqli_fetch_all($gallery_result);

        $pics = 0;
        for($i = 0; $i < 4; $i++) {
            if(!empty($_FILES["gallery$i"]['name'])) {
                $pics++;
            }
        }
        // echo "Chosen pics: ".$pics."<br>";
        
        for($i = 0; $i < $pics; $i++) {
            $pic = $_SESSION['user']['username'].rand().'.jpg';
            $gallery_path = "blog_images/".$pic;
            move_uploaded_file($_FILES["gallery$i"]['tmp_name'], $gallery_path);

            $sql = "UPDATE gallery SET picture_name='".$pic."'
             WHERE picture_id=".$rows[$i][0];
            $update_result = mysqli_query($conn, $sql);
        } 

      header("Refresh:2.5; url=view_blog.php?blog_id=$blog_id", True, 303);
    }
    else {
        $status_msg = "<h3 style = 'color:red;'>Error in inserting blog.</h3>"; 
    }
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
      <div class="blog-body-margin"><center><?php echo $status_msg; ?></center></div>
      <div class="div-blog-row">
        <div class="div-blog-left">
            <div class="div-blog-card">

                <!-- BLOG DESCRIPTION TEXTAREA-->
                <textarea class="blog-desc-txt" name="blog_desc" id="" cols="100" rows="1" 
                placeholder="Your blog description here" required><?php echo $blog_desc?></textarea>
                <br><br>

                <!-- BLOG IMAGE HEADER -->
                <div class="div-blog-img" style="background-image: url(blog_images/<?php echo $blog_pic; ?>); background-size: cover;"></div>
                  <br>
                  <label for="">Browse:</label>
                  <br>
                  <input class="button-style" type="file" name="blog_pic" required>
                  <br><br>

                  <!-- BLOG BODY TEXTAREA -->
                  <textarea class="blog-body-txt" name="blog_body" id="" cols="139" rows="5" 
                  placeholder="Your blog content here" required><?php echo $blog_content?></textarea>
                  <br>
                  <!-- <?php 
                    echo $status_msg;
                  ?> -->
                <input class="button-style  " type="submit" name="create" value="Create post">
                <input class="button-style" type="button" name="cancel" value="Cancel" onClick="window.location.href='profile.php'">  

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
            <center><h2>Gallery</h2></center>

              <!-- UPLOAD FILES -->
              <div>
                <?php
                  for($i = 0; $i < 4; $i++) {
                    echo "<input class='button-style' type='file' name='gallery$i'><hr>";
                  }
                ?>
              </div>

          </div>
        </div>
      </div>
    </form>

    <div class="div-blog-footer">
      <h2>All rights reserve. Hiraya 2021</h2>
    </div>
  </div>
</body>
</html>