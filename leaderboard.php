<?php 
  ini_set('display_errors',1);  error_reporting(E_ALL);
  include("config.php");
  session_start();
  include('rememberme.php');
  if(!isset($_SESSION['login_user']))
    rememberMe();
    
?> 

<!DOCTYPE html>
<html>
<head>
  <title>About</title>
  <link rel="stylesheet" type="text/css" href="gradient.css">
  <link rel="stylesheet" type="text/css" href="homepage2.css" />
  <link rel="stylesheet" type="text/css" href="leaderboard.css">
  <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous">
  </script>
  <script>
    function draw(x){
      //console.log(str);
      $.ajax({
        type: "POST",
        url: "getBoard.php",
        dataType: "html",
        data:{ 'gid' : x },
        success: function(res){
         // console.log(res);
          $("#tab").html(res);
        } 
      });
     // console.log("hi");
     // console.log(list);
     // document.getElementById("tab").innerHTML=str+list;
    }
  </script>
</head>
<body onload="draw(1);">
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
</div>  
    
  <div id="select">
    <a onclick='draw(1);'>Flappy Bird</a>
    <a onclick='draw(3);'>Pong</a>
    <a onclick='draw(2);'>Tetris</a>
    <a onclick='draw(4);'>Maze Runner</a>
    <a onclick='draw(5);'>Match the tiles</a>   	
  </div> 

 
  <div id="tab" onload="draw(1);">
  </div>

</body>
</html>     