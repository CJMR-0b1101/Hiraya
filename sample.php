<style>
  .like-container {
    width: max-content;
  }
  .unlike-button {
    margin-top: 10px;
    font-size: 35px;
    cursor: pointer;
    width: 55px;
    border-radius: 50px;
  }
  .like-button {
    margin-top: 10px;
    font-size: 35px;
    color: red;
    cursor: pointer;
    width: 55px;
    border-radius: 50px;
  }
  .unlike-button:focus, .like-button:focus {
    outline: none;
    box-shadow: 0px 0px 2px red;
  }
</style>
<body>
  <?php
    $like_class = "unlike-button";
    $user_id = $_GET['user_id'];
    $location_id = $_GET['location_id'];
    $status_msg = "";
    echo "UID: $user_id";
    echo "<br>Loc ID: $location_id";

    include 'config.php';

    // FETCH CURRENT ITINERARY OF USER
    $sql = "SELECT * FROM itinerary WHERE user_id = $user_id AND location_id = $location_id";
    // echo "<br>SQL: ".$sql;
    $query_result = mysqli_query($conn, $sql);
    
    if(isset($_POST['unlike'])) {
      // IF NO EXISTING RECORD, INSERT
      if(!mysqli_num_rows($query_result) == 1) {
        $sql = "INSERT INTO itinerary(user_id, location_id) VALUES($user_id, $location_id)";
        // echo "<br>".$sql;
        $insert_result = mysqli_query($conn, $sql);

        if($insert_result) {
          $like_class = "like-button";
          $status_msg = "Added to My Plans";
          echo '<div class="like-container">';
          echo '  <form action="" method="post">
                    <button class="'.$like_class.'" type="submit" name="like">♥</button>
                    <i style="margin-left: 5px; font-size: 20px;">'.$status_msg.'</i>
                  </form>';
          echo '</div>';
        }
      }
      // IF THERE'S A RECORD, DELETE
      else {
        $sql = "DELETE FROM itinerary WHERE user_id = $user_id AND location_id = $location_id";
        // echo "<br>".$sql;
        $delete_result = mysqli_query($conn, $sql);

        if($delete_result) {
          $like_class = "unlike-button";
          $status_msg = "";
          echo '<div class="like-container">';
          echo '  <form action="" method="post">
                    <button class="'.$like_class.'" type="submit" name="like">♥</button>
                    <i style="margin-left: 5px; font-size: 20px;">'.$status_msg.'</i>
                  </form>';
          echo '</div>';
        }
      }

      unset($_POST['like']);
      if(!isset($_POST['like'])) {
        header("Refresh:0");
      }
    }
    else {
      if(mysqli_num_rows($query_result) == 1) {
        $like_class = "like-button";
        $status_msg = "Added to My Plans";

        echo '<div class="like-container">';
        echo '  <form action="" method="post">
                  <button class="'.$like_class.'" type="submit" name="unlike">♥</button>
                  <i style="margin-left: 5px; font-size: 20px;">'.$status_msg.'</i>
                </form>';
        echo '</div>';
      }
      else {
        $status_msg = "";
        
        echo '<div class="like-container">';
        echo '  <form action="" method="post">
                  <button class="'.$like_class.'" type="submit" name="unlike">♥</button>
                  <i style="margin-left: 5px; font-size: 20px;">'.$status_msg.'</i>
                </form>';
        echo '</div>';
      }
    }
  ?>
</body>