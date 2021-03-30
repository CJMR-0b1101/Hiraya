<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="images/hiraya_icon.ico">
	<link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>All blogs</title>
</head>
<style>
    .main-body{
        float:center;
        background-image: url(https://i.imgur.com/bYsVdHu.png);
    }
    h1{
        color: #c9e265;
        font-family: 'Noto Sans TC', sans-serif;
    }
    form.example input[type=text] {
        margin-left: 20px;
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        background: #f1f1f1;
        border-radius: 12px;
    }
    form.example input[type=text]:focus,
    form.example button:focus {
        outline: none;
        box-shadow: 0px 0px 2px #0066ff;
    }
    form.example button {
        float: left;
        width: 10%;
        padding: 10px;
        background: #70CCDD;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        border-radius: 10px;
        cursor: pointer;
    }
    form.example button:hover {
        background-image: url(https://i.imgur.com/hi3eFOb.jpg);
    }
    form.example::after {
        content: "";
        clear: both;
        display: table;
    }
    .div-content-home-background{
        margin-left: 50px;
        margin-right: 50px;
        font-size: 20px;
    }
    .div-content-home-list-content{
        color: white;
    }

    .link_title{
        color: red;
    }
    .x-button {
        border-radius: 10px;
    }
    .x-button:focus {
        outline: none;
        box-shadow: 0px 0px 10px #0066ff;
    }
</style>
<body class="main-body">
	<div class="div-body">
		<?php include 'navbar.php'; ?>
		<div class="div-body-margin"></div>
		<br>
		<br>
		<div class="div-body-margin"></div>
		<div class="div-content">
			<div class="div-content-home">
				<div class="div-content-home-header">
					<center><h1>A L L   B L O G S</h1></center>

				<?php
                    $len = 0;
                    $status_msg = "";
					include 'config.php';
                    
                    if(isset($_POST['search'])) {
                        $search_str = $_POST['search_input'];
                        
                        if(empty($search_str)) {
                            $status_msg = "<h3>Blog not found</h3>";
                        }
                        else {
                            $sql = "SELECT blog_id, blog_title, blog_description FROM blogs WHERE blog_title LIKE '%$search_str%'";
                            // echo $sql;
                            $result = mysqli_query($conn, $sql);
        
                            if($result) {
                                $rows = mysqli_fetch_all($result);
                                $len = count($rows);
                                // echo "Records: $len";
                                if($len == 0)
                                    $status_msg = "<h3>Blog not found</h3>";
                            }
                            else {
                                $status_msg = "<h3 style='color: red;'>Error in query</h3>";
                            }
                        }
                    }
                    else {
                        $sql = "SELECT blog_id, blog_title, blog_description FROM blogs";
                        $result = mysqli_query($conn, $sql);
    
                        if($result) {
                            $rows = mysqli_fetch_all($result);
                            $len = count($rows);

                            if($len == 0)
                                $status_msg = "<h3>No blogs yet</h3>";
                        }
                        else {
                            echo "All blogs not fetched";
                        }
                    }
				?>
                
                    <!-- SEARCH -->
                    <form class="example" action="" method="POST" style="margin: auto; max-width: 500px;">
                        <input type="text" placeholder="Search title of blog.." name="search_input">
                        <button type="submit" name='search'><i class="fa fa-search"></i></button>
                        <br><br>
                        <center>
                        <?php 
                            if(isset($_POST['search'])) {
                                echo 'You are searching for <i>"'.$search_str.'"  </i>'; 
                                echo '<input class="x-button" type="submit" value="x">';
                            }
                        ?>
                        </center>
                    </form>

				</div>
				<div class="div-content-home-background">
					<div class="div-content-home-list">
                    <div style="margin: 100px;"></div>
                    <?php
                        echo "<center>$status_msg</center>";

                        for($i = 0; $i < $len; $i++) {
                            echo '<div class="div-content-home-list-content">';
                            echo '  <div class="div-content-home-list-content-header">';
                            echo '      <i class="fas fa-clipboard-check"></i>';
                            echo '      <a class="link_title" href="view_blog.php?blog_id='.$rows[$i][0].'">'.$rows[$i][1].'</a>';
                            echo '  </div>';
                            echo '  <div class="div-content-home-list-content-content">';
                            echo '      <p>'.$rows[$i][2].'</p>';
                            echo '  </div>';
                            echo '</div>';
                        }
                    ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	
</body>
</html>