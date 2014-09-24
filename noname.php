<?php
if (@$_SESSION['auth'] == "1")
{
?>
<script>
function digclock()
{
	var d = new Date()
	var t = d.toLocaleTimeString()
	
	document.getElementById("clock").innerHTML = t
}

setInterval(function(){digclock()},1000)

</script>
<body>
<div class="boshmenyu">
<img src='flag.gif'>
<div class="boshtugmalar">
</form><form name='logout' action='' method='POST'><input type='submit' style="height:50px; width:100px" name='logout' value='Chiqish'></form>
<div style="height:50px; width:100px"> <center> <strong><br> Soat:<div id="clock" ></strong><center></div>
</div>
</div>
<div class="boshtugmalar2">
</div>
</div>
<div class="pusk">
<div class="pusktugma">
</form><form action='' method='POST'><input type='submit' style="height:50px; width:150px; <?php if (@$_SESSION['page'] == "1"){echo "background-color:#66FF99";} ?>"  name='Bosh' value='Bosh sahifa'></form>
</div>
<div class="pusktugma">
</form><form action='' method='POST'><input type='submit' style="height:50px; width:150px; <?php if (@$_SESSION['page'] == "2"){echo "background-color:#66FF99";} ?>"  name='page1' value='Jurnal'></form>
</div>
<div class="pusktugma">
</form><form action='' method='POST'><input type='submit' style="height:50px; width:150px; <?php if (@$_SESSION['page'] == "3"){echo "background-color:#66FF99";} ?>"  name='page2' value='Statistika'></form>
</div>
<div class="pusktugma">
</form><form action='' method='POST'><input type='submit' style="height:50px; width:150px"  name='temp2' value='Clear2'></form>
</div>
<div class="pusktugma">
</form><form action='' method='POST'><input type='submit' style="height:50px; width:150px"  name='temp3' value='Clear3'></form>
</div>
</div>
<div class="desctop">
<?php

/* start if issets */
if(isset($_POST['logout']))
{
Logoutbb();
}

if(isset($_POST['Bosh']))
{
$_SESSION['page'] = "1";
echo  '<meta http-equiv="Refresh" content="0;url=">';
echo "Грузим...";
}

if(isset($_POST['page1']))
{
$_SESSION['quiq'] = "1";
$_SESSION['page'] = "2";
echo  '<meta http-equiv="Refresh" content="0;url=">';
echo "Грузим...";
}

if(isset($_POST['page2']))
{
$_SESSION['page'] = "3";
echo  '<meta http-equiv="Refresh" content="0;url=">';
echo "Грузим...";
}
/* end if issets */

/*----------------------------------------------------------------------------*/

/* start if sessions */

if (@$_SESSION['page'] == "1")
{
require_once("noname.php");
}
if (@$_SESSION['page'] == "2")
{
require_once("page.php");
}
if (@$_SESSION['page'] == "3")
{
require_once("stats.php");
}

/* end if sessions */


?>
</div>

<div class="footer">
<br>
    <center><strong>Copyright (c) 2014 PROJECT ANDMIYIP</strong></center>
</div>
</body>
<?php
}
else
{
require_once "function/core.php";
noname();
}
?>
