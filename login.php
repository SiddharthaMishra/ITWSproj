<!DOCTYPE html>
<?php
  session_start();    
  ini_set('display_errors',1);  error_reporting(E_ALL);
  include("config.php");
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = pg_escape_string($db,$_POST['username']);
    $mypassword = pg_escape_string($db,$_POST['password']); 
    $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
    $result = pg_query($db,$sql);    
    if(pg_num_rows($result)>0) {
      $_SESSION['login_user'] = $myusername;
      header("location: HOMEPAGE.php");
    }
    else {
      $error = "Your Login Name or Password is invalid";
    }
  }
?>
<html>

<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="HOMEPAGE.css" />
</head>

<body onload="alert('<?php echo $error?>')">
  <form action="" method="POST">  
    <?php if (!isset($_SESSION['login_user'])): ?>
      <h1>Login</h1>
      <input type="text" name="username" value="" placeholder="Username"><br>
      <input type="password" name="password" value="" placeholder="Password"><br>
      <input type="Submit" value="Submit"><br>
      <p>Don't have an account? <a href="register.php">Register</a></p>
    <?php else: ?>
      <h1> You are already registered</h1>
    <?php endif ?>
    </form>
  <div id="mainmenu">
      <a href="">GAMES</a>
      <a href="">LEADERBOARD</a>
      <a href="">ABOUT US</a>
  </div>

  <div class="hl"></div>

  <div id="homemenu">
    <h1>WEBPAGE NAME</h1>
    <a href="HOMEPAGE.php"><img src="3.jpg"></a> 
    <div id="homemenu2">
      <?php if(!isset($_SESSION["login_user"])) : ?>
        <a href="login.php">Log In</a>    
        <a href="register.php">Register</a>
      <?php else : ?>
        <a href="logout.php">Logout</a>
        <span style="color:white"><?php echo "Welcome ".$_SESSION['login_user'] ?></span>
      <?php endif ?> 
    </div>   
  </div> 

  <div class="vl"></div>
</body>

</html>