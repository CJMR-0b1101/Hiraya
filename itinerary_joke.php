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
	}

    h1{
        margin-top: 100px;
        margin-right: 10px;
        background-color: none;
    }
    .grid-container {
        display: grid;
        grid-column-gap: 5px;
        grid-template-columns: auto auto auto;
        padding: 5px;
        width: 100%;
        background-color: red;  
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 40%;
        margin-top: 50px;
        border-radius: 5px;
        padding: 20px;
        font-size: 30px;
        text-align: center;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .img{
        max-width: 100%;
        height: auto;
    }

    
   
</style>

<?php include 'navbar.php'; ?>
<body class="main-body">
    <h1><center>ITINERARY</center></h1>
    <div class="grid-container">
        
            <div class="card">
                <img src="https://i.imgur.com/SkgKiVt.jpg" alt="Avatar" style="width:100%">
                <div class="container">
                    <div class="location-name"><h4><b>John Doe</b></h4> </div>
                    
                </div>
            </div>
            <div class="card">
                <img src="https://i.imgur.com/SkgKiVt.jpg" alt="Avatar" style="width:100%">
                <div class="container">
                    <div class="location-name"><h4><b>John Doe</b></h4> </div>
                </div>
            </div>
            <div class="card">
                <img src="https://i.imgur.com/SkgKiVt.jpg" alt="Avatar" style="width:100%">
                <div class="container">
                    <div class="location-name"><h4><b>John Doe</b></h4> </div>
                </div>
            </div>
        
    </div>
</body>
</html>