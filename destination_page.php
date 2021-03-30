<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="images/hiraya_icon.ico">
	<link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
	<title>Itinerary</title>
</head>
<style>
	.main-body{
		background-image: url(https://i.imgur.com/4mExAFS.png);
		background-position: center bottom;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
	}

    h1{
        background-color: none;
        color: #c9e265;
        margin-top: 50px;
    }
    
    /* Float four columns side by side */
        .column {
            margin-left: 30px;
            margin-top: 5px;
            float: left;
            width: 45%;
            padding: 0 100px;
        }

        /* Remove extra left and right margins, due to padding in columns */
        .row {margin: 0 250px;}

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        /* Responsive columns - one column layout (vertical) on small screens */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }
    .card {
        box-shadow: 2px 2px 4px 0 rgba(0,0,0,0.2);
        margin-top: 50px;
        border-radius: 5px;
        cursor: pointer;
    }

    .card:hover {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }

    .img{
        max-width: 100%;
        height: auto;
    }

    /* Style the tab */
    .tab {
        margin-top: 300px;
        margin-left: 20px;
    }

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  border: none;
  border-radius: 30px;
  outline: none;
  cursor: pointer;
  padding: 10px 20px;
  transition: 0.3s;
  height: 50px;
  min-width: 150px;
  margin-left: 10px;
  font-size: large;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
  border: solid;
  border-radius: 30px;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: pink;
  border: solid;
  border-radius: 30px;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
} 
</style>

<?php include 'navbar.php'; ?>

<body class="main-body">
    
        <center><h1>D E S T I N A T I O N S</h1></center>
        <div class="row">
            <?php
                include 'config.php';
                
                if(!isset($_SESSION['guestlogin']) && !isset($_SESSION['login'])) {
                    echo'<script> window.location="index.php"; </script>';
                }
                elseif(isset($_SESSION['guestlogin'])) {
                    $sql = "SELECT * FROM locations";
                    $result = mysqli_query($conn, $sql);
                    $rows = mysqli_fetch_all($result);
                    $len = count($rows);

                    for($i = 0; $i < $len; $i++) {
                        echo '<div class="column">';
                        echo '  <div class="card" onclick="location.href=\'view_destination'.($i+1).'.php\'">';
                        echo '      <img src="'.$rows[$i][5].'" alt="Avatar" style="width: 100%; height: 100%;">';
                        echo '  </div>';
                        echo '</div>';
                    }
                }

                if(isset($_SESSION['login'])) {
                    $user_id = $_SESSION['user']['user_id'];
                    $sql = "SELECT * FROM locations";
                    $result = mysqli_query($conn, $sql);
                    $rows = mysqli_fetch_all($result);
                    $len = count($rows);
                    
                    for($i = 0; $i < $len; $i++) {
                        echo '<div class="column">';
                        echo '  <div class="card" onclick="location.href=\'view_destination'.($i+1).'.php\'">';
                        echo '      <img src="'.$rows[$i][5].'" alt="Avatar" style="width: 100%; height: 100%;">';
                        echo '  </div>';
                        echo '</div>';
                    }
                }
            ?>
        </div>
        
    
        
   
</body>
</html>