
<?php 
  ini_set('display_errors',1);  error_reporting(E_ALL);
  include("config.php");
  session_start();
?> 

<!DOCTYPE html>
<html>

<head>
  <title>Flappy Bird</title>
  <link rel="stylesheet" type="text/css" href="gradient.css" />
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
<?php if(isset($_SESSION['login_user'])) : ?>
  <div id="hi">Welcome <?php echo $_SESSION['login_user'] ?>!</div>
<?php else : ?>
  <div id="hi" style="color:black"><?php echo "\n"?></div>
<?php endif ?>
<div class="icon" onclick="togglesidebar()">
  <span></span>
  <span></span>
  <span></span>
</div>
<div class="dropdown">
  <a href="games.php">GAMES</a>
  <div class="dropdown-cont">
    <a href="bird.php">Flappy Bird</a>
    <a href="tetris.php">Tetris</a>
    <a href="maze.php">Maze Runner</a>
    <a href="pong.php">Pong</a>
    <a href="tiles.php">Match the Tiles</a>
  </div>
</div>
<a href="leaderboard.php">LEADERBOARD</a>
<a href="about.php">ABOUT</a>
<?php if(!isset($_SESSION["login_user"])) : ?>
<a href="register.php">SIGN UP</a>
<a href="login.php">LOGIN</a>
<?php else :?>
<a href="profile.php">PROFILE</a>
<a href="logout.php">LOGOUT</a>
<?php endif ?>
</div>
<br><br><br><br><br>  
  
  <div style="text-align:center">
    <canvas style="border:1px solid black;" id="canvas" width="800" height="480"></canvas>
  </div>
  <script src="app.js"></script>  
  <script>
    playFB(<?php if(isset ($_SESSION['login_user'])) echo "\"".$_SESSION['login_user']."\""; ?>);
  </script>	 
</body>

</html>