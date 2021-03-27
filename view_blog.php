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
.button-style, .delete-post-button {
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
.delete-post-button:hover {
  background-color: red;
  color: white;
}
</style>

<body class="main-body">
  <div class="div-body">
    <?php
        include 'navbar.php';
        // echo "<pre>";
        // print_r($_SESSION);
        // echo "</pre>";
        if(!isset($_SESSION['guestlogin'])) {
          echo'<script> window.location="index.php"; </script>';
        }
        else {
          if(!isset($_GET['blog_id'])) {
            header("location: home_page.php");
          }
          $blog_id = $_GET['blog_id'];

          // FETCH DATA FROM DB (BLOG TABLE)
          include 'config.php';

          $sql = "SELECT * FROM blogs WHERE blog_id = $blog_id";
          // echo $sql;
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) == 1) {
              $row = mysqli_fetch_array($result);
              $blog_title = $row['blog_title'];
              $blog_desc = $row['blog_description'];
              $blog_content = $row['blog_content'];
              $blog_header = $row['blog_header'];
              $about_me = $row['about_me'];
              $blog_uid = $row['user_id'];
          }
          else {
              header("location: home_page.php");
          }

          // FETCH DATA FROM gallery TABLE
          $sql = "SELECT * FROM gallery WHERE blog_id = $blog_id";
          $result = mysqli_query($conn, $sql);

          if(mysqli_num_rows($result)) {
            $gallery = mysqli_fetch_all($result);
          }
        }

        if(isset($_SESSION['login'])) {
            if(isset($_SESSION['guestlogin']))
              unset($_SESSION['guestlogin']);

            $user = $_SESSION['user'];
            $gallery = null;

            if(!isset($_GET['blog_id'])) {
                header("location: home_page.php");
            }
            $blog_id = $_GET['blog_id'];

            // FETCH DATA FROM DB (BLOG TABLE)
            include 'config.php';

            $sql = "SELECT * FROM blogs WHERE blog_id = $blog_id";
            // echo $sql;
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);
                $blog_title = $row['blog_title'];
                $blog_desc = $row['blog_description'];
                $blog_content = $row['blog_content'];
                $blog_header = $row['blog_header'];
                $about_me = $row['about_me'];
                $blog_uid = $row['user_id'];
            }
            else {
                header("location: home_page.php");
            }

            // FETCH DATA FROM gallery TABLE
            $sql = "SELECT * FROM gallery WHERE blog_id = $blog_id";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)) {
              $gallery = mysqli_fetch_all($result);
            }

            // EDIT POST IS CLICKED
            if(isset($_POST['edit'])) {
              echo "<script> window.location='edit_blog.php?blog_id=".$blog_id."&user_id=".$user['user_id']."'</script>";
            }

            // DELETE POST IS CLICKED
            if(isset($_POST['delete'])) {
              $sql = "DELETE FROM blogs WHERE blog_id=$blog_id";
              // echo $sql;
              $blog_result = mysqli_query($conn, $sql);
              $sql = "DELETE FROM gallery WHERE blog_id=$blog_id";
              $gallery_result = mysqli_query($conn, $sql);

              if($blog_result && $gallery_result) {
                echo "<script> window.location='profile.php'</script>";
              }
              else {
                echo "LMAO";
              }
            }
        }
      ?>
    <div class="div-body-margin"></div>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="div-blog-header">
          <br>
          <!-- BLOG TITLE TEXTAREA-->
          <textarea readonly class="blog-header-txt" name="blog_title" id="" cols="30" rows="1"><?php echo $blog_title?></textarea>
          <br>
      </div>
      <div class="div-body-margin"></div>
      <div class="div-blog-row">
        <div class="div-blog-left">
            <div class="div-blog-card">

                <!-- BLOG DESCRIPTION TEXTAREA-->
                <textarea readonly class="blog-desc-txt" name="blog_desc" id="" cols="100" rows="1"><?php echo $blog_desc?></textarea>
                <br><br>

                <!-- BLOG IMAGE HEADER -->
                <div class="div-blog-img" style="background-image: url(blog_images/<?php echo $blog_header; ?>); background-size: cover;"></div>
                  <br><br>

                  <!-- BLOG BODY TEXTAREA -->
                  <textarea readonly class="blog-body-txt" name="blog_body" id="" cols="139" rows="5" ><?php echo $blog_content?></textarea>
                  <br>
              <?php
                if(!isset($_SESSION['guestlogin'])) {
                  if($blog_uid == $user['user_id']) {
                    echo '<input class="button-style" type="submit" name="edit" value="Edit post">';
                    echo '<input class="delete-post-button" type="submit" name="delete" value="Delete post">';
                  }
                }
              ?>
          </div>
        </div>

        <!-- ABOUT ME -->
        <div class="div-blog-right">
          <div class="div-blog-card">
            <center><h2>About Me</h2></center>
            <textarea readonly class="blog-about-txt" name="about_me" id="" cols="38" rows="10" 
                  placeholder="Tell us about yourself" required><?php echo $about_me?></textarea>
          </div>
          <div class="div-body-margin"></div>
          <!-- GALLERY -->
          <div class="div-blog-card">
            <center><h2>Gallery</h2></center>

              <!-- UPLOAD FILES -->
              <div>
                <?php
                  $len = count($gallery);
                  
                  for($i = 0; $i < $len; $i++) {
                      $currfile = $gallery[$i][3];
                      if(!empty($currfile))
                        echo  "<a href='blog_images/".$currfile."'><img style='width: 100px; object-fit: cover;' src='blog_images/".$currfile."'  /></a>";
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