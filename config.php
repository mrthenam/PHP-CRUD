<?php
define('DB_SERVER' ,'localhost');

define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','demo');
/* Attempt to connect to MySQL database */

$link = mysqli_connect( hostname: DB_SERVER, username: DB_USERNAME, password: DB_PASSWORD, database: DB_NAME);
if($link === false) {
 die("ERROR: Could not connect.".mysqli_connect_error());
}
?>
