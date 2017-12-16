<?php 
  ini_set('display_errors',1);  error_reporting(E_ALL);
  include("config.php");
  session_start();
?> 
<!doctype html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Tile Flip</title>
    <link href="match.css" type="text/css" rel="stylesheet" />
    <script src="match.js"></script>
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
    <h3 align=center>Tile Flip</h3><br><br>
    <p>Welcome! This is a simple game which will test your memory!The rules are simple you can click on any two tiles to flip them.The goal is to find the matching pairs, select all the matching tiles and you win the game!</p>
    <div style="text-align:center;">
      <input type="button" value="Start Game" id="but" onclick="newBoard(<?php if(isset ($_SESSION['login_user'])) echo "'".$_SESSION['login_user']."'"; ?>)">
      <input type="button" value="Reset" onclick="location.reload();">
    </div>
    <div id="Main_canvas"></div>
    <div style="text-align:center;"><b>No of tiles turned:</b><input type="text" id="turn" value="0"></div>
  </body>
</html>