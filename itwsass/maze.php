<?php 
  //ini_set('display_errors',1);  error_reporting(E_ALL);
  include("config.php");
  session_start();
?> 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Maze runner</title>
    <link rel="stylesheet" type="text/css" href="maze.css"/>
  <script src="maze.js"></script>
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
    <div style="text-align:center;">
    <h3>Maze Runner</h3>
    <p>
      Helooo!<br>
      This is a simple maze game where you are a square and you need to reach the green circle by travelling through the maze.
      Use "W","A","S","D" to control your square,hurry the clock is ticking!!!
    </p><br>
    <input type="button" onclick="startGame(<?php if(isset ($_SESSION['login_user'])) echo "'".$_SESSION['login_user']."'"; ?>);" id="st" value="Start Game">
    <input type="button" onclick="location.reload();" value="Reset">
    <p id="intro"></p><br>
    <canvas width="636" height="556" id="mazecanvas">Your browser doesn't support HTML5 canvas tag</canvas>
  </div> 
  </body>
</html>
