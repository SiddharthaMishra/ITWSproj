<!DOCTYPE html>
<?php
  session_start();    
  ini_set('display_errors',1);  error_reporting(E_ALL);
  include("config.php");
  include('rememberme.php');
  if(!isset($_SESSION['login_user']))
    rememberMe();
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = pg_escape_string($db,$_POST['username']);
    $sql = "SELECT password FROM users WHERE username = '$myusername'; ";
    $result = pg_query($sql);
    $pass=pg_fetch_array($result)[0];
    
    if( password_verify($_POST['password'], $pass ) ) {
      $_SESSION['login_user'] = $myusername;
      if(isset($_POST['checked'])){

        $token = bin2hex(random_bytes(128));
        $sql="UPDATE users SET token = '$token' where username = '$myusername'; " or die(pg_errormessage);
        pg_query($sql);
        //echo "\n$sql".$token;
        $cookie = $myusername . ':' . $token;
        $mac = hash_hmac('sha256', $cookie, "itws1");
        $cookie .= ':' . $mac;
        setcookie('rememberme', $cookie, time()+(10*365*24*60*60));
      }
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
  <link rel="stylesheet" type="text/css" href="login.css" />
  <link rel="stylesheet" type="text/css" href="gradient.css">
  <link rel="stylesheet" type="text/css" href="homepage2.css" />
</head>

<body onload="alert('<?php echo $error?>')">
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
  </div> 	
</div>
  <form id="form2" action="" method="POST">  
    <?php if (!isset($_SESSION['login_user'])): ?>
      <h1>Login</h1>
      <input type="text" name="username" value="" class="class" placeholder="Username"><br>
      <input type="password" name="password" value="" class="class1" placeholder="Password"><br>
      <input type="Submit" value="Submit" class="class3"><br>
      Remember Me<input type="checkbox" name="checked">
      <p>Don't have an account? <a href="register.php">Register</a></p>
    <?php else: ?>
      <h1> You are already registered</h1>
    <?php endif ?>
    </form> 
</body>

</html>