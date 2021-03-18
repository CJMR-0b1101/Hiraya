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

    if(isset($_SESSION['login'])) {
        $user = $_SESSION['user'];
        $filename = "default_header.jpg";
        // echo '<pre>';
        // print_r($user);
        // print_r($_SESSION);
        // echo '</pre>';

        // FETCH DATA FROM DB
    }
  ?>
</head>

<body>
  <?php include 'navbar.php'; ?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="header">
      <br>
      <!-- BLOG TITLE TEXTAREA-->
      <textarea readonly style="resize: none; font-size: 50px; text-align: center; border: none;" 
      name="blog_title" id="" cols="30" rows="1">BLOG TITLE</textarea>
      <br>
  </div>

  <div class="row">
    <div class="leftcolumn">
        <div class="card">
            <!-- BLOG TITLE HEADING TEXTAREA-->
            <textarea readonly style="resize: none; font-size: 28px; border: none;" 
            name="blog_titlehead" id="" cols="65" rows="1">TITLE HEADING</textarea>
            <br><br>
            <!-- BLOG DESCRIPTION TEXTAREA-->
            <textarea readonly style="resize: none; border: none;" name="blog_desc" id="" cols="100" rows="1">DESCRIPTION</textarea>
            <br><br>

            <img src="blog_images/<?php echo $filename; ?>" alt="Blog-Header-Picture-Here" style="height: 500px;">
              <br><br>
              <!-- BLOG BODY TEXTAREA -->
              <textarea readonly style="resize: none;" name="blog_body" id="" cols="139" rows="5">BODY</textarea>
              <br>  
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