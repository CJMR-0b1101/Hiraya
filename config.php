<?php
    $host = "localhost";
    $db_uname = "root";
    $db_pass = "";
    $dbname = "hiraya_db";

    $conn = mysqli_connect($host, $db_uname, $db_pass);

    mysqli_select_db($conn, $dbname) or die(mysqli_error());
?>