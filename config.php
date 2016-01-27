<?php
$dbhost = '192.168.159.59';
$dbuser = 'newwebuser';
$dbpass = 'cENt4@35';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'gradschoolusadev';
mysql_select_db($dbname);
?>