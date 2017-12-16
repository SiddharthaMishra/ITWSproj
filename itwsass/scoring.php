<?php
  include('config.php');
  session_start();

  if ( isset( $_POST['user'] ) ) {
    $game = $_POST['game'];
    $user = $_POST['user'];
    $score = $_POST['score'];
    $query="INSERT INTO allScores VALUES ('$game','$user','$score');";
    pg_query($query);
  }
?>