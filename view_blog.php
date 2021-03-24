<!DOCTYPE html>
<html>
<head>
  <title>Blogs</title>
</head>

<body class="main-body">
  <div class="div-body">
    <?php  ?>
    <?php
        include 'navbar.php';

        if(isset($_SESSION['login'])) {
            $user = $_SESSION['user'];

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
            }
            else {
                header("location: home_page.php");
            }

            // FETCH DATA FROM gallery TABLE
            $sql = "SELECT * FROM gallery WHERE blog_id = $blog_id";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)) {
            $row = mysqli_fetch_all($result);
            }
            else {
            echo "ERROR GALLERY";
            }

            if(isset($_POST['edit'])) {
            header("location: edit_blog.php?blog_id=".$blog_id."&user_id=".$user['user_id']);
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
                <img class="div-blog-img" src="blog_images/<?php echo $blog_header; ?>" alt="Blog-Header-Picture-Here">
                  <br><br>

                  <!-- BLOG BODY TEXTAREA -->
                  <textarea readonly class="blog-body-txt" name="blog_body" id="" cols="139" rows="5" ><?php echo $blog_content?></textarea>
                  <br>

                <input class="btn-submit" type="submit" name="edt" value="Edit post">   

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
            <h3>Gallery</h3>

              <!-- UPLOAD FILES -->
              <div>
                <?php
                    $len = count($row);
                    for($i = 0; $i < $len; $i++) {
                        // echo $row[$i][3]."<br>";
                        $currfile = $row[$i][3];
                        echo  "<a href='blog_images/".$currfile."'><img style='width: 100px; object-fit: cover;' src='blog_images/".$currfile."'  /></a>";
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