<?php
session_start();    
// ini_set('display_errors',1);  error_reporting(E_ALL);
include("config.php");
include('rememberme.php');
if(!isset($_SESSION['login_user']))
  rememberMe();
?> 
<!DOCTYPE html>
<html>
<head>
  <title>About</title>
  <link rel="stylesheet" type="text/css" href="game.css">
  <link rel="stylesheet" type="text/css" href="gradient.css">
  <link rel="stylesheet" type="text/css" href="homepage2.css" />
</head>
<body>
<div id="homemenu">
<a href="HOMEPAGE.php">HOME</a>
<a href="games.php">GAMES</a>
<a href="leaderboard.php">LEADERBOARD</a>
<a href="about.php">ABOUT US</a>
<img src="logo.gif">     
</div> 

<div id="homemenu2">
<?php if(!isset($_SESSION["login_user"])) : ?>
  <a href="login.php">Log In</a>    
  <a href="register.php">Register</a>
<?php else : ?>
  <a href="logout.php">Logout</a>
  <span style="color:white"><a><?php echo "Welcome ".$_SESSION['login_user'] ?></a></span>
<?php endif ?>

     <div id="about">
          <div id="container">
              <div id="card">
                <div id="card-front"><img src="1.jpg"></div>
                <div id="card-back">
                  <h1>Maze Runner</h1><hr>
                  <p>Individual do not have study hours to improve the brain capacity to retain the information. Simply by playing the maze game it can achieve. ... The puzzle solving ability of the game increases the ability of creativity and enhances the taste of designs and technology.</p>
                  <a href="">Start Game</a>
               </div>
            </div>
        </div>
          <div id="container">
              <div id="card">
                <div id="card-front"><img src="2.jpg"></div>
                <div id="card-back">
                  <h1>Tetris</h1><hr>
                  <p>Individual do not have study hours to improve the brain capacity to retain the information. Simply by playing the maze game it can achieve. ... The puzzle solving ability of the game increases the ability of creativity and enhances the taste of designs and technology.</p>
                  <a href="">Start Game</a>                
               </div>
            </div>
        </div>
          <div id="container">
              <div id="card">              
                <div id="card-front"><img src="3.jpg"></div>
                <div id="card-back">
                  <h1>Pong</h1><hr>
                  <p>Individual do not have study hours to improve the brain capacity to retain the information. Simply by playing the maze game it can achieve. ... The puzzle solving ability of the game increases the ability of creativity and enhances the taste of designs and technology.</p>
                  <a href="">Start Game</a>                   
               </div>
            </div>
        </div>
          <div id="container" class="cl">
              <div id="card">
                <div id="card-front"><img src="4.jpg"></div>
                <div id="card-back">
                  <h1>Flappy Bird</h1><hr>
                  <p>Individual do not have study hours to improve the brain capacity to retain the information. Simply by playing the maze game it can achieve. ... The puzzle solving ability of the game increases the ability of creativity and enhances the taste of designs and technology.</p>
                  <a href="">Start Game</a>                
               </div>
            </div>
        </div>
          <div id="container" class="cl">
              <div id="card">
                <div id="card-front"><img src="5.jpg"></div>
                <div id="card-back">
                   <h1>Matching Tiles</h1><hr>
                   <p>Matching an object to a picture requires the understanding of the picture as a symbol, or representation, of the actual object.  The ability to understand symbolic representation is a crucial prerequisite to learning and using language!</p>
                   <a href="">Start Game</a>
               </div>
            </div>
        </div>
     </div>

</body>
</html>





