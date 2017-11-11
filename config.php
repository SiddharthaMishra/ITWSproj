<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'itws1');
   define('DB_PASSWORD', 'sid99');
   define('DB_DATABASE', 'itws1');
   $db= pg_connect("host=localhost dbname=proj user=itws1 password=sid99")
    or die('Could not connect: '. pg_last_error);
?>