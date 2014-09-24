<input type='submit' name='vicky' value='Vicky'>
<form name='dds' action='' method='POST'>
<input type='submit' name='dds' value='dds'>
</form>
<?php
echo'<title>Tanlash</title>';
if(isset($_POST['vicky']))
{
echo  '<meta http-equiv="Refresh" content="0;url=">';
$_SESSION['name'] = "Vicky";
}
if(isset($_POST['dds']))
{
$_SESSION['name'] = "DDs";
echo  '<meta http-equiv="Refresh" content="0;url=">';
}
?>
