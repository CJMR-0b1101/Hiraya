<style>
$red: #ff3252;

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
  // border: 1px solid black;
  &::before {
    font-size: 10px;
    color: #000;
    content: '♥';
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  }
  &::after {
    font-size: 10px;
    color: $red;
    content: '♥';
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: transform 0.2s;
  }
  &.liked::after {
    transform: translate(-50%, -50%) scale(1.1);
  }
}
</style>
<h1> shanice </h1>
<button class="like-button"></button>

<script>
    document.querySelector('.like-button').addEventListener('click', (e) => {
  e.currentTarget.classList.toggle('liked');
});
</script>