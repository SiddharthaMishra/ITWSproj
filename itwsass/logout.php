<?php
   session_start();
   setcookie("rememberme", "", time()-3600);
   if(session_destroy()) {
      header("Location: HOMEPAGE.php");
   }
?>