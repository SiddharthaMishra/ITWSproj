<?php
session_start();    
// ini_set('display_errors',1);  error_reporting(E_ALL);
include("config.php");
include('rememberme.php');
if(!isset($_SESSION['login_user']))
  rememberMe();
?> 
<html>
  <head>
    <title>PONG</title>
    <link href="pong.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
     <link rel="icon" href="logotop">	 
	<title></title>
		<link rel="stylesheet" type="text/css" href="menu.css">
		<script type="text/javascript" src="menu.js"></script>
		<link rel="stylesheet" type="text/css" href="gradient.css">

  </head>
  <!--<body id="grad1">
   <div id="homemenu">
   	<h1>WEBPAGE NAME</h1>
   	 <img src="3.jpg">
   	 <div id="homemenu2">
      <a href="form.html">Log In</a>
      <a href="form2.html">Register</a>
     </div>
   </div>
   <br><br><br><br><br><br><br>-->
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
 </div>
    <br>
    <br>
 		<h1>PONG</h1>
    <span id="cont">
      SCORE:<input type="text" name="score" id="score" value="0" disabled>
      <!--<button type="reset" class="button" onclick="restart()">Reset</button>-->
    </span>
    <canvas id="can" width="400" height="600"></canvas>
      <script src="pong.js"></script>
      <script>
        PlayPong("Prashant");
      </script>
  </center>
  </body>
</html>
