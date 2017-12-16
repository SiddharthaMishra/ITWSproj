<?php 
  ini_set('display_errors',1);  error_reporting(E_ALL);
  include("config.php");
  session_start();
?> 
<!DOCTYPE html>

<head>
    <title>HTML5 Tetris</title>
    <link rel="stylesheet" type="text/css" href="gradient.css" />
    <link rel='stylesheet' href='tetris.css' />
    <link rel="stylesheet" type="text/css" href="homepage2.css" />
    <link rel="stylesheet" type="text/css" href="menu.css" />
    <link rel="icon" href="logotop">	
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Mr+De+Haviland" rel="stylesheet"> 
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="menu.js"></script>
</head>
<body>
<div id="menu">
  <div class="icon" onclick="togglesidebar()">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <div class="dropdown">
    <a href="">GAMES</a>
    <div class="dropdown-cont">
      <a href="">GAME1</a>
      <a href="">GAME2</a>
      <a href="">GAME3</a>
      <a href="">GAME4</a>
      <a href="">GAME5</a>
      <a href="">GAME6</a>
    </div>
    </div>
      <a href="">LEADERBOARD</a>
      <a href="">ABOUT</a>
      <?php if(!isset($_SESSION["login_user"])) : ?>
        <a href="">SIGN UP</a>
        <a href="">LOGIN</a>
      <?php else :?>
        <a href="">LOGOUT</a>
      <?php endif ?>
    </div>
    <br><br><br><br>
    <br>
    <div id="tetris">
        <div id="menu">
            <p id="start"><a href="javascript:newGame();">Press Space to Play.</a></p>
            <p>score <span id="score">0</span></p>
            <p>rows <span id="rows">0</span></p>
        </div>
        <canvas id="canvas" width="300" height="600">
          Sorry, this example cannot be run because your browser does not support the &lt;canvas&gt; element
        </canvas>
    </div>
    <script src='js/tetris.js'></script>
    <script>
        canvas.tabIndex = 1;     
        PlayTetris(<?php if(isset($_SESSION['login_user'])) echo "\"".$_SESSION['login_user']."\""; ?>);
    </script>
    <script src='js/controller.js'></script>
    <script src='js/render.js'></script>
</body>

</html>
