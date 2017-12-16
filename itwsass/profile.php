<!DOCTYPE html>
<?php
  session_start();    
 // ini_set('display_errors',1);  error_reporting(E_ALL);
  include("config.php");
  include('rememberme.php');
  if(!isset($_SESSION['login_user']))
        rememberMe();
  $myusername=$_SESSION['login_user'];
  $ids=["Flappy Bird", "Tetris", "Pong", "Maze Runner", "Match the Tiles"];
  $sql="Select * from users where username='$myusername';";
  $result=pg_query($sql);
  $row=pg_fetch_assoc($result);
  $query="select distinct on (gameid) * from allScores where username='".$myusername."' order by gameid,score DESC;";
  $resulttable=pg_query($query);
 // echo $query;
  $rows=pg_fetch_assoc($resulttable);
  function createTable1($ids){
    $query="select distinct on (gameid) * from allScores where username='".$_SESSION['login_user']  ."' order by gameid,score DESC;";
    $resulttable=pg_query($query);
    $rank=1;
    while($rows=pg_fetch_assoc($resulttable))
    {
      echo "<tr><td> $rank </td><td>".$ids[$rows["gameid"]-1]."</td><td>".$rows["score"]."</td></tr>";
      $rank++;
    }
  } 
  $query2="Select * from allscores where username='".$_SESSION['login_user']."' order by gamenumber desc limit 5;";
  $rtable=pg_query($query2);
  $rws=pg_fetch_assoc($rtable);
  function createTable2($ids){
    $query2="Select * from allscores where username='".$_SESSION['login_user']."' order by gamenumber desc limit 5;";
    $rtable=pg_query($query2);
      $rank=1;
      while($rws=pg_fetch_assoc($rtable))
      {
        echo "<tr><td> $rank </td><td>".$ids[$rws["gameid"]-1]."</td><td>".$rws["score"]."</td></tr>";
        $rank++;
      }
    }

  /*while($row=pg_fetch_assoc($result))
  {
    echo "<h2>UserName  ".$row['username']."</h2><hr>
    <label>Profile Name:   ".$row[firstname]." ".$row[lastname]."</label>
    <span>Something</span><br><br>
    <label>Date Of Birth:</label>
    <span>Something</span><br><br>
    <label class="l1">Email:</label>
    <span class="s1">Something</span><br><br>
    <label class="l2">Registered On:</label>
    <span class="s2">Something</span><br><br><hr>";
  }*/

?>
<html>
<head>
  <title>About</title>
  <link rel="stylesheet" type="text/css" href="gradient.css">
  <link rel="stylesheet" type="text/css" href="homepage2.css" />
  <link rel="stylesheet" type="text/css" href="profile.css">

</head>
<body>

    <div id="profile">
      <img src="8.png"><h2><?php echo $row['username'];?></h2><hr>
        <label>Profile Name:</label>
        <span><?php echo $row['fname']." ".$row['lname'];?></span><br><br>
        <label>Date Of Birth:</label>
        <span><?php echo $row['dob'];?></span><br><br>
        <label class="l1">Email:</label>
        <span class="s1"><?php echo $row['email'];?></span><br><br>
        <label class="l2">Registered On:</label>
        <span class="s2"><?php echo $row['regdate']?></span><br><br><hr>
        
        <h3>High Scores</h3>
        <table style="text-align:center">
          <tr>
            <th>S. No.</th>
            <th>Game Number</th>
            <th>Score</th>
          </tr>>
          <!--<tr>
            <td>something</td>
            <td>something</td>
            <td>something</td>
          </tr>          
          <tr>
            <td>something</td>
            <td>something</td>
            <td>something</td>
          </tr>-->
          <?php createTable1($ids); ?>     
        </table><br>
        <hr>
        <h3>History</h3>
        <table style="text-align:center">
          <tr>
            <th>S. No</th>
            <th>Game Number</th>
            <th>Score</th>
          </tr>
          <?php createTable2($ids); ?>      
        </table>                
    </div> 
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
      <?php echo "<a href=''> Welcome ".$_SESSION['login_user']."</a>" ?>
      <?php endif ?>
  </div>
</body>
</html>