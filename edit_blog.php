<!DOCTYPE html>
<html>
<head>
  <title>Edit Blog</title>
</head>
<style>
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
</style>

<!-- MAIN PROGRAM STARTS HERE -->
<?php
    session_start();

    if(isset($_SESSION['login'])) {
        // VARIABLES
        $user = $_SESSION['user'];
        $username = $user['username'];
        $status_msg = "";
        $uid =  $user['user_id'];
        $blog_pic = '';
        $blog_title = '';
        $blog_desc = '';
        $blog_content = '';
        $about_me = '';
        $gallery = null;

        // IF USER TRIED TO ACCESS EDIT BLOG WITHOUT PERMISSION
        if(!isset($_GET['blog_id']) || !isset($_GET['user_id'])) {
            header("location: home_page.php");
        }
        elseif($user['user_id'] != $_GET['user_id']) {
            header("location: home_page.php");
        }

        // QUERY FROM BLOG TABLE
        include 'config.php';
        $blog_id = $_GET['blog_id'];
        $sql = "SELECT * FROM blogs WHERE blog_id=$blog_id";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            // echo "<pre>";
            // print_r($row);
            // echo "</pre>";
            $blog_pic = $row['blog_header'];
            $blog_title = $row['blog_title'];
            $blog_desc = $row['blog_description'];
            $blog_content = $row['blog_content'];
            $about_me = $row['about_me'];
        }

        // CANCEL BUTTON IS CLICKED
        if(isset($_POST['cancel'])) {
          header("location: view_blog.php?blog_id=".$blog_id);
        }
        // SAVE BUTTON IS CLICKED
        if(isset($_POST['save'])) {
          parseValues($blog_title, $blog_desc, $blog_content, $about_me);
           
          // IF BLOG HEADER IS NOT UPDATED (NO FILE CHOSEN)
          if(!empty($_FILES['blog_pic']['name'])) {
            $blog_pic = $_FILES['blog_pic']['tmp_name'];
          }
          else {
            $blog_pic = $row['blog_header'];
          }
          // $blog_pic = empty($_FILES['blog_pic']['name']) ? $row['blog_header'] : $_FILES['blog_pic']['name'];
          // echo $blog_pic;

          updateBlog($blog_id, $blog_pic, $blog_title, $blog_desc, $blog_content, $about_me, $gallery, $status_msg);
        }
    }
    else {
        echo '<script> window.location.replace("index.php") </script>';
    }

    function parseValues(&$blog_title, &$blog_desc, &$blog_content, &$about_me) {
      // Get values from text areas
      $blog_title = $_POST['blog_title'];
      $blog_desc = $_POST['blog_desc'];
      $blog_content = $_POST['blog_body'];
      $about_me = $_POST['about_me'];
    }
    function updateBlog($blog_id, $blog_pic, $blog_title, $blog_desc, $blog_content, $about_me, &$gallery, &$status_msg) {
      include 'config.php';
      
      // echo "Receieved blog pic: $blog_pic<br>";
      $currblogpic = $_SESSION['user']['username']."-blog-".$blog_id."-".rand().".jpg";
      // echo "Randomized: $currblogpic<br>";
      $path = "blog_images/".$currblogpic;

      if(move_uploaded_file($blog_pic, $path)) {
        $sql = "UPDATE blogs SET blog_title='$blog_title', blog_description='$blog_desc',
        blog_content='$blog_content', blog_header='$currblogpic', about_me='$about_me'
        WHERE blog_id=$blog_id";
        // echo $sql;
      }
      else {
        $sql = "UPDATE blogs SET blog_title='$blog_title', blog_description='$blog_desc',
        blog_content='$blog_content', blog_header='$blog_pic', about_me='$about_me'
        WHERE blog_id=$blog_id";
        // echo $sql;
      }

      $updateblog = mysqli_query($conn, $sql);

      // QUERY FROM GALLERY TABLE
      $sql = "SELECT picture_id, picture_name FROM gallery WHERE blog_id = $blog_id";
      // echo $sql;
      $result = mysqli_query($conn, $sql);

      if($result) {
          $gallery = mysqli_fetch_all($result);
          $status_msg = "<h4 style = 'color:green;'>Blog updated</h4>";
      }
      
      $sql = "SELECT picture_id FROM gallery WHERE picture_name='' AND blog_id=$blog_id";
      $gallery_result = mysqli_query($conn, $sql);

      if($gallery_result) {
        $empty = mysqli_fetch_all($gallery_result);
      }
      
      $skipcount = 1;
      $i = 0;
      foreach($_FILES as $file) {
        if($skipcount != 1 && !empty($file['name'])) {
          $pic = $_SESSION['user']['username'].rand().'.jpg';
          $gallery_path = "blog_images/".$pic;
          // echo $file['tmp_name']."<br>";
          move_uploaded_file($file['tmp_name'], $gallery_path);

          // UPDATE GALLERY
          $sql = "UPDATE gallery SET picture_name = '$pic' WHERE picture_id=".$empty[$i][0];
          // echo $sql."<br>";
          $update = mysqli_query($conn, $sql);
          if($update) {
            $status_msg = "<h4 style = 'color:green;'>Saved changes.</h4>";
          }
          else {
            $status_msg = "<h4 style = 'color:red;'>Update failed.</h4>";
          }
          $i++;
        }
        $skipcount++;
      }
      // header("location: view_blog.php?blog_id=".$blog_id);
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
                <!-- <img class="div-blog-img" src="blog_images/<?php echo $blog_pic; ?>" alt="Blog-Header-Picture-Here"> -->
                <div class="div-blog-img" style="background-image: url(blog_images/<?php echo $blog_pic; ?>); background-size: cover;"></div>
                  <br>
                  <label for="">Browse:</label>
                  <br>
                  <input class="button-style" type="file" name="blog_pic">
                  <br><br>

                  <!-- BLOG BODY TEXTAREA -->
                  <textarea class="blog-body-txt" name="blog_body" id="" cols="139" rows="5" 
                  placeholder="Your blog content here" required><?php echo $blog_content?></textarea>
                  <br>
                  <?php 
                    echo $status_msg;
                  ?>
                <input class="button-style" type="submit" name="save" value="Save">
                <input class="button-style" type="submit" name="cancel" value="Cancel">   

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
                    // DISPLAY CURRENT GALLERY
                    include 'config.php';
                    $holder = array();
                    $sql = "SELECT picture_id, picture_name FROM gallery WHERE blog_id=$blog_id";
                    $query_result = mysqli_query($conn, $sql);

                    if($query_result)
                      $rows = mysqli_fetch_all($query_result);

                    $len = count($rows);

                    // echo "<pre>";
                    // print_r($holder);
                    // print_r($_SESSION);
                    // echo "</pre>";

                    for($i = 0; $i < $len; $i++) {
                        $currfile = $rows[$i][1];
                        $currPicId = $rows[$i][0];

                        if(!empty($currfile)) {
                          echo  "<a href='blog_images/".$currfile."'><img style='width: 100px; object-fit: cover;' src='blog_images/".$currfile."'  /></a>";
                          echo "<a style='padding-left: 50px; 'href='delete_pic.php?pic_id=".$currPicId."&blog_id=".$blog_id."&user_id=".$user['user_id']."'>Remove image</a><hr>";
                        }
                    }

                    sort($holder);

                    $sql = "SELECT picture_id FROM gallery WHERE picture_name='' AND blog_id=$blog_id";
                    $gallery_result = mysqli_query($conn, $sql);

                    if($gallery_result) {
                      $empty = mysqli_fetch_all($gallery_result);
                      // echo "<pre>";
                      // print_r($empty);
                      // echo "</pre>";
                      
                      for($i = 0; $i < count($empty); $i++) {
                        echo "<input class='button-style' type='file' name='gallery".$empty[$i][0]."'>";
                      }
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