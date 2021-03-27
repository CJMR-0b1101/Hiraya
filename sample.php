<style>

  body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
  }

  .like-button {
    display: inline-block;
    position: relative;
    font-size: 50px;
    cursor: pointer;
    border: 1px solid black;
  }
  .like-button:before {
    font-size: 100px;
    color: black;
    content: '♥';
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  }
  .like-button:after {
    font-size: 100px;
    color: red;
    content: '♥';
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: transform 0.2s;
  }
  .liked::after {
    transform: translate(-50%, -50%) scale(1.1);
  }
</style>
  <?php
    if(isset($_POST['like'])) {
      echo "LIKED!";
    }
  ?>
  <div class="like-button"></div>
  <!-- <form action="" method="post">
    <button class="like-button" type="button" name="like"></button>
  </form> -->

  <script>
      document.querySelector('.like-button').addEventListener('click', (e) => {
        e.currentTarget.classList.toggle('liked');
      });
  </script>