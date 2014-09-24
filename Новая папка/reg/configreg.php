<?php

$connect = mysql_connect("localhost","root","") or die ("Connection Error: " . mysql_error());
$db = mysql_select_db("base", $connect) or die("Can't Select Database: " . mysql_error());

?>