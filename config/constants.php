<?php 
    //start session
    session_start();

//create constants to store non repeating values

define('SITEURL','http://localhost/restaurant/'); 
define('LOCALHOST', 'localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food-order');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$db_select = mysqli_select_db($conn, DB_NAME);
?>