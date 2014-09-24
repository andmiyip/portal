<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>YIP</title>
<link rel='stylesheet' type='text/css' href='design/style.css' />
<script language="JavaScript" src="scripts/scripts.js" type="text/JavaScript"></script>
<script language="JavaScript" src="scripts/myscripts.js" type="text/JavaScript"></script>

</head>
<?php
session_start();
include "function/config.php";
include "function/core.php";
if (@$_SESSION['auth'] == "1")
{
require_once("noname.php");
}
else
{
$_SESSION['au'] = "on";
require_once("auth.php");
}

?>
</html>
