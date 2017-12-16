<?php
  function rememberMe() {
    $cookie = isset($_COOKIE['rememberme']) ? $_COOKIE['rememberme'] : '';
    //echo $cookie."hi";
    if ($cookie) {
      list ($user, $token, $mac) = explode(':', $cookie);
      if (!hash_equals(hash_hmac('sha256', $user . ':' . $token, "itws1"), $mac)) {
          return false;
      }
      $query="SELECT token FROM users WHERE username = '$user'";
      $result = pg_query($query);
      $usertoken = pg_fetch_array($result)[0];
      if (hash_equals($usertoken, $token)) {
          $_SESSION['login_user'] = $user;
      }
    }
  }
?>