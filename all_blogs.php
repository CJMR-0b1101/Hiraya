<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>All blogs</title>
</head>
<style>
    form.example input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        background: #f1f1f1;
        border-radius: 12px;
    }
    form.example input[type=text]:focus {
        outline: none;
        box-shadow: 0px 0px 2px #0066ff;
    }
    form.example button {
        float: left;
        width: 20%;
        padding: 10px;
        background: #2196F3;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
    }
    form.example button:hover {
        background: #0b7dda;
    }
    form.example::after {
        content: "";
        clear: both;
        display: table;
    }
</style>
<body class="main-body">
	<div class="div-body">
		<?php include 'navbar.php'; ?>
		<div class="div-body-margin"></div>
		<br>
		<br><hr class="solid">
		<div class="div-body-margin"></div>
		<div class="div-content">
			<div class="div-content-home">
				<div class="div-content-home-header">
					<h1>ALL BLOGS</h1>

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
                            echo '      <a href="view_blog.php?blog_id='.$rows[$i][0].'">'.$rows[$i][1].'</a>';
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