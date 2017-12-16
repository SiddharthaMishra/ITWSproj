<?php
  session_start();    
  ini_set('display_errors',1);  error_reporting(E_ALL);
  include("config.php");
  include('rememberme.php');
  if(!isset($_SESSION['login_user']))
    rememberMe();
?>  
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="logotop">	
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Mr+De+Haviland" rel="stylesheet"> 
	<title></title>
    <link rel="stylesheet" type="text/css" href="menu.css">
		<script type="text/javascript" src="menu.js"></script>
</head>
<body onload="sliderA()">
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

 <div id="firstdiv" >
 	<img src="logo.gif">
 	<p><h1>WANT TO HAVE SOME FUN.</h1></p>
 </div>

 <div id="seconddiv">
    <img id="image" src="1.jpg">
    <div id="left_button"><img src="left.png" onclick="slide(-1)"></div>
    <div id="right_button"><img src="right.png" onclick="slide(1)"></div>
 </div>

<div id="thirddiv">
	<div id="arrow">
	<a href=""><img src="arrow1.png"></a>
	</div>
	<div id="lastdiv">
		<img src="logo.gif"><br>
		<p>CATEGORIES</p>
		<a href="games.php">Games</a>
		<a href="leaderboard.php">Leaderboard</a>
		<a href="">Contact Us</a>
		<a href="">Terms Of Use</a>

		<p id="para">
			KEEP IN TOUCH<br><br>			
      <a href="">something@iiits.in</a>
      <a href="">something@iiits.in</a>
      <a href="">something@iiits.in</a>
      <a href="">something@iiits.in</a>
      <a href="">something@iiits.in</a>
		</p>
	</div>
 </div> 
</body>
</html>
