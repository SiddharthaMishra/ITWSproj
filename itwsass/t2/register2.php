<!DOCTYPE html>
<?php
  include("config.php");
  session_start();
  
  if(isset($_POST['submit'])){
    $fname=pg_escape_string($db, $_POST['fname']);
    $uname=pg_escape_string($db, $_POST['username']);
    $lname=pg_escape_string($db, $_POST['fname']);
    $email=pg_escape_string($_POST['email']);
    $password=$_POST['password'];
    $days=(pg_escape_string($_POST['days']));
    $month=(pg_escape_string($_POST['month']));
    $year=(pg_escape_string($_POST['year']));
    $date=$year.'-'.$month.'-'.$days;
    $exists=pg_query("SELECT * from users where username='$uname'");    
    if(pg_num_rows($exists)!=0){
      echo "<script type='text/javascript'>alert('Username already exists.');</script>";
    }    
    else{
      
      if($_POST['password']==$_POST['new_password']){
        $query="INSERT INTO users VALUES ('$uname','$fname','$lname','$email','$password','$date','$now');";
        $result=pg_query($query);
        if($result){
          $now= date("Y-m-d");
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
  <link rel="stylesheet" type="text/css" href="gradient.css"></link>
  <link rel="stylesheet" type="text/css" href="homepage2.css" ></link>
  <link rel="stylesheet" type="text/css" href="signup.css" ></link> 

  <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
  <script>

  $(document).ready(function () {
    $("#pass").keyup(checkPasswordMatch);
    $("#ch_pass").keyup(checkPasswordMatch);
  });
  
  function checkPasswordMatch() {
    var password = $("#pass").val();
    var confirmPassword = $("#ch_pass").val();
    console.log("a");
    if (password != confirmPassword)
      $("#subForm").prop("disabled", true);
    else
      $("#subForm").prop("disabled", false);
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
    <input type="text" class="c1" pattern=".{3,}" name="username" value="<?php if(isset($uname)) echo $uname; else echo ''; ?>" placeholder="User Name" required><br>
    <input type="text" class="c1" pattern=".{3,}" name="fname" value="<?php if(isset($fname)) echo $fname; else echo ''; ?>" placeholder="First Name" required><br>
    <input type="text" class="c1" pattern=".{3,}" name="lname" value="<?php if(isset($lname)) echo $lname; else echo ''; ?>" placeholder="Last Name" required><br>
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
    <select id="days" name="days" value="<?php if(isset($days)) echo $days; else echo '1'; ?>">
    </select>
    <input type="text" class="c1" id="year" style= "height:20px;width:200px"name="year" value="<?php if(isset($year)) echo $year; else echo ''; ?>" onchange="changeDays(document.getElementById('month').value,this.value);" placeholder="DOB">
    <script>
      changeDays(0, document.getElementById("year").value);
    </script>
    
    <input type="email" class="c1" name="email" value="<?php if(isset($email)) echo $email; else echo ''; ?>" placeholder="Email" required><br>
    <input type="password" class="c1" id="pass" pattern=".{5,}" name="password" placeholder="password" required><br>
    <input type="password" class="c1" id="ch_pass" pattern=".{5,}" name="new_password" placeholder="confirm password" required><br>      
    <input type="submit" class="c2" value="sign up">
    <p>Already have an account? <a href="login.php">Login Here</a></p>
  <?php else : ?>  
    You are already registered, click <a href="HOMEPAGE.php"> here</a> to go back.
  <?php endif ?>
  </form>

   <div id="homemenu">
      <a href="">HOME</a>
      <a href="">GAMES</a>
      <a href="">LEADERBOARD</a>
      <a href="">ABOUT US</a>
      <a href="">FEEDBACK</a>
   <img src="logo.gif">     
   </div> 

     <div id="homemenu2">
      <?php if(!isset($_SESSION["login_user"])) : ?>
        <a href="login.php">Log In</a>    
        <a href="register.php">Register</a>
      <?php else : ?>
        <a href="logout.php">Logout</a>
        <span style="color:white"><?php echo "Welcome ".$_SESSION['login_user'] ?></span>
      <?php endif ?>
     </div>   
</body>
</html>