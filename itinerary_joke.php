<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/69e995a5a1.js" crossorigin="anonymous"></script>
	<title></title>
</head>
<style>
	.main-body{
		background-image: url(https://i.imgur.com/bYsVdHu.png) ;
        box-sizing: border-box;
	}

    h1{
        margin-top: 20px;
        margin-right: 10px;
        margin-bottom: -20px;
        background-color: none;

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
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        background-color: rgba(0,76,80,0.5);
        margin-top: 50px;
        border-radius: 5px;
        padding: 16px;
        font-size: 30px;
        text-align: center;
        cursor: pointer;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .img{
        max-width: 100%;
        height: auto;
    }

    /* Style the tab */
        .tab {
        padding-top:50px;
        padding-right: 500px;
       
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
        <h1><center>ITINERARY</center></h1>
        <div class="row">
            <div class="column">
                <div class="card">
                    <a href="view_itinerary.php"><img src="https://i.imgur.com/SkgKiVt.jpg" alt="Avatar" style="width:100%"></a>
                    <div class="container">
                        <div class="location-name">
                            <h4><b>Boracay</b></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                <a href="home_page.php"><img src="https://i.imgur.com/SkgKiVt.jpg" alt="Avatar" style="width:100%"></a>
                    <div class="container">
                        <div class="location-name"><h4><b>Coron, Palawan</b></h4> </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                <a href="home_page.php"><img src="https://i.imgur.com/SkgKiVt.jpg" alt="Avatar" style="width:100%"></a>
                    <div class="container">
                        <div class="location-name"><h4><b>El nido, Palawan</b></h4> </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                <a href="home_page.php"><img src="https://i.imgur.com/SkgKiVt.jpg" alt="Avatar" style="width:100%"></a>
                    <div class="container">
                        <div class="location-name"><h4><b>Bohol</b></h4> </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <a href="home_page.php"><img src="https://i.imgur.com/SkgKiVt.jpg" alt="Avatar" style="width:100%"></a>
                    <div class="container">
                        <div class="location-name"><h4><b>Siargao</b></h4> </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    <div id="sec-opt" class="tabcontent">
        <h1><center>ITINERARY</center></h1>
        <div class="row">
            <div class="column">
                <div class="card">
                <a href="home_page.php"><img src="https://i.imgur.com/SkgKiVt.jpg" alt="Avatar" style="width:100%"></a>
                    <div class="container">
                        <div class="location-name"><h4><b>Boracay</b></h4> </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                <a href="home_page.php"><img src="https://i.imgur.com/SkgKiVt.jpg" alt="Avatar" style="width:100%"></a>
                    <div class="container">
                        <div class="location-name"><h4><b>Coron, Palawan</b></h4> </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                <a href="home_page.php"><img src="https://i.imgur.com/SkgKiVt.jpg" alt="Avatar" style="width:100%"></a>
                    <div class="container">
                        <div class="location-name"><h4><b>El nido, Palawan</b></h4> </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                <a href="home_page.php"><img src="https://i.imgur.com/SkgKiVt.jpg" alt="Avatar" style="width:100%"></a>
                    <div class="container">
                        <div class="location-name"><h4><b>Bohol</b></h4> </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                <a href="home_page.php"><img src="https://i.imgur.com/SkgKiVt.jpg" alt="Avatar" style="width:100%"></a>
                    <div class="container">
                        <div class="location-name"><h4><b>Siargao</b></h4> </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
   



</body>
</html>