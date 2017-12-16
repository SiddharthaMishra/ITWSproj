<!DOCTYPE html>
<?php
  ini_set('display_errors',1);  error_reporting(E_ALL);
  include("config.php");
  session_start();
  include('rememberme.php');
  if(!isset($_SESSION['login_user']))
    rememberMe();
  
  if(isset($_POST['submit'])){
    $fname=pg_escape_string($db, $_POST['fname']);
    $uname=pg_escape_string($db, $_POST['username']);
    $lname=pg_escape_string($db, $_POST['fname']);
    $email=pg_escape_string($_POST['email']);
    $password=$_POST['password'];
    $days=(pg_escape_string($_POST['days']));
    $month=(pg_escape_string($_POST['month']+1));
    $year=(pg_escape_string($_POST['year']));
    $date=$year.'-'.str_pad($month, 2, "0",STR_PAD_LEFT).'-'.str_pad($days, 2, "0",STR_PAD_LEFT);
    $exists=pg_query("SELECT * from users where username='$uname'");    
    if(pg_num_rows($exists)!=0){
      echo "<script type='text/javascript'>alert('Username already exists.');</script>";
    }    
    else{
      
      if($_POST['password']==$_POST['new_password']){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $now = date("Y-m-d");        
        $query="INSERT INTO users VALUES ('$uname','$fname','$lname','$email','$password','$date','$now');";
        //echo "$query" ;
        $result=pg_query($query);
        if($result){
          //echo $now;
          echo "<script type='text/javascript'>alert('You have registered successfully.');
          window.location.replace(\"login.php\");
          </script>";       
        }
        else{
          echo "<script type='text/javascript'>alert('Please enter correct information.');</script>";
        }
      }
      
      else{
        echo "<script type='text/javascript'>alert('Passwords don't match.');</script>";
      }
    }
  }
?>
<html>
<head>
  <title>Sign Up</title>
  
  <link rel="stylesheet" type="text/css" href="gradient.css" />
  <link rel="stylesheet" type="text/css" href="homepage2.css" />
  <link rel="stylesheet" type="text/css" href="signup.css" />
  <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
  <script>

  $(document).ready(function () {
    $("#pass").keyup(checkAll);
    $("#ch_pass").keyup(checkAll);
    $("#username").keyup(checkAll);
    $("#lname").keyup(checkAll);
    $("#fname").keyup(checkAll);
    checkAll();
  });
  function checkAll() {
    var t=0;
    if ( $("#username").val().length < 5 || $("#username").val().length > 10  ){
      $("#uNF").show();
      $("#uNF").html("*Username should be at least 5 and at most 10 characters.");
      t=1;
      $("#subForm").prop('disabled', true);
      $("#subForm").css("background-color",'rgb(169,169,169,1)');
      $("#subForm").css("color",'rgb(0,0,0,1)');
    }
    else{
      $("#uNF").hide();
    }
    if ( $("#fname").val().length < 3 ){
      $("#fNF").show();
      $("#fNF").html("*Name should be 3 or more characters.");
      $("#subForm").prop('disabled', true);
      $("#subForm").css("background-color",'rgb(169,169,169,1)');
      $("#subForm").css("color",'rgb(0,0,0,1)');
      t=1;
    }
    else{
      $("#fNF").hide();
    }
    
    if ( $("#lname").val().length < 3 ){
      $("#lNF").show();
      $("#lNF").html("*Name should be 3 or more characters.");
      t=1;
      $("#subForm").prop('disabled', true);
      $("#subForm").css("background-color",'rgb(169,169,169,1)');
      $("#subForm").css("color",'rgb(0,0,0,1)');
    }
    else{
      $("#lNF").hide();
    }
    if ( $("#pass").val() != $("#ch_pass").val() ){
      $("#pNF").show();
      $("#pNF").html("*Passwords don't match.");
      t=1;
      $("#subForm").css("background-color",'rgb(169,169,169,1)');
      $("#subForm").prop('disabled', true);
      $("#subForm").css("color",'rgb(0,0,0,1)');

    }
    else{
      $("#pNF").hide();
    }
    if ( $("#pass").val().length < 5 ){
      $("#pS").show();
      $("#pS").html("*Password should be 5 or more characters.");
      t=1;
      $("#subForm").prop('disabled', true);
      $("#subForm").css("color",'rgb(0,0,0,1)');
      $("#subForm").css("background-color","rgb(169,169,169,1)");
    }
    else{
      $("#pS").hide();
    }
    
    if(t==0){
      console.log("enabled");
      $("#subForm").prop('disabled', false);
      $("#subForm").css("background-color",'rgb(255,0,0,1)');
      $("#subForm").css("color",'rgb(255,255,255,1)');
    }
  }
  
  function changeDays(month, year) {
    
    if (month == null)
      return 0;
    
    var days = 0;
    
    if (year == null || year == "")
      year = 1999;
    
    if (month == 3 || month == 5 || month == 8 || month == 10)
      days = 30;
    
    else if (month == 1) {
      if (year % 400 == 0 || (year % 4 == 0 && year % 100 != 0)) {
        days = 29;
      } 
      else
        days = 28;
    } 
    
    else
      days = 31;
    
    var select = document.getElementById('days');
    
    while (select.childNodes.length >= 1) {
      select.removeChild(select.firstChild);
    }
    
    for (var i = 1; i <= days; i++) {
      select.options.add(new Option(i, i));
    }
  }
  </script>
</head>
<body>
  <form id="form2" action="" method="POST">
  <?php if (!isset($_SESSION['login_user'])) : ?> 
    <h1>Create An Account</h1>
    <input class="c1" type="text" pattern=".{3,}" id='username' name="username" value="<?php if(isset($uname)) echo $uname; else echo ''; ?>" placeholder="User Name*" required><br>
    <p id="uNF" style="color:red;font-size:10px;"></p>
    <input class="c1" type="text" pattern=".{3,}" id='fname' name="fname" value="<?php if(isset($fname)) echo $fname; else echo ''; ?>" placeholder="First Name*" required><br>
    <p id="fNF" style="color:red;font-size:10px;"></p>
    <input type="text" class="c1" pattern=".{3,}" id='lname' name="lname" value="<?php if(isset($lname)) echo $lname; else echo ''; ?>" placeholder="Last Name*" required><br>
    <p id="lNF" style="color:red;font-size:10px;" ></p>
    <select id="month" name="month" value="<?php if(isset($month)) echo $month; else echo '0'; ?>" onchange="changeDays(this.value,document.getElementById('year').value);">
      <option value="0">January</option>
      <option value="1">February</option>
      <option value="2">March</option>
      <option value="3">April</option>
      <option value="4">May</option>
      <option value="5">June</option>
      <option value="6">July</option>
      <option value="7">August</option>
      <option value="8">September</option>
      <option value="9">October</option>
      <option value="10">November</option>
      <option value="11">December</option>
    </select>
    <select id="days" name="days" class="c1" value="<?php if(isset($days)) echo $days; else echo '1'; ?>">
    </select>
    <select id="year"  name="year" class="c1" value="<?php if(isset($year)) echo $year; else echo '1940'; ?>" onchange="changeDays(document.getElementById('month').value,this.value);">
    <?php for( $i=1940; $i< 2005; $i++ )
      echo "<option value = \"$i\">$i</option>";
    ?>
    </select>
    <script>
      changeDays(0, document.getElementById("year").value);
    </script>
    
    <input type="email" id="email" name="email" class="c1" value="<?php if(isset($email)) echo $email; else echo ''; ?>" placeholder="Email*" required><br>
    <input type="password" id="pass" class="c1" pattern=".{5,}" name="password" placeholder="password*" required><br>
    <input type="password" id="ch_pass" class="c1" pattern=".{5,}" name="new_password" placeholder="confirm password*" required><br>      
    <p id="pNF" style="color:red;font-size:10px;"></p>
    <p id="pS" style="color:red;font-size:10px;"> </p>
    <input type="submit" class = "c2" id="subForm" action=""  name ="submit" method="POST" value="Sign Up" disabled >
    <p>Already have an account? <a href="login.php">Login Here</a></p>
  <?php else : ?>  
    You are already registered, click <a href="HOMEPAGE.php"> here</a> to go back.
  <?php endif ?>
  </form>

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
</body>
</html>