<?php
define('DB_SERVER','localhost');
define('DB_USER','ABC');
define('DB_PASS' ,'');
define('DB_NAME', 'ABC');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
echo "Database ERROR: " . mysqli_connect_error();
 }

?>