<?php
$baseyip=mysqli_connect("localhost","root","","base");
if(mysqli_connect_errno())
{
echo "Error".mysqli_connect_error();
$database_encoding = "utf8";
}
?>