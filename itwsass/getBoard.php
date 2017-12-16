<?php

  ini_set('display_errors',1);  error_reporting(E_ALL);
  include("config.php");
  session_start();
  $i = $_POST['gid'];
  $query="SELECT * FROM allScores where gameid='$i' order by score desc limit 10";
  $result=pg_query($query);
  $rank=1;
  echo "<table><tr><th>Rank</th><th>Username</th><th>Score</th></tr>";
  while($row= pg_fetch_assoc($result)){
    echo "<tr><td> $rank </td><td>".$row["username"]."</td><td>".$row["score"]."</td></tr>";
    $rank++;
  }
  echo "</table>";
?>