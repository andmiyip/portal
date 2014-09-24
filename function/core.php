<?php /*Author fr0z3n4rm0r xD */

function Fail()
	{
echo  '<meta http-equiv="Refresh" content="1;url=">';
echo "<center>Login yoki parol noto`gri!!!</center>";
	}

function Success()
	{
$vaq=$_SESSION['vaqt'];
$nom=$_SESSION['nomi'];
echo  '<meta http-equiv="Refresh" content="3;url=">';
echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><center><img src='2.gif'><br><h3>Salom, $nom!<br>Siz ohirgi marta <br>$vaq tizimda bolgansiz!</h3></center>";
	}
function Logoutbb()
{
foreach($_SESSION as $key => $val)
{
    if ($key !== 'somekey')
    {
      unset($_SESSION[$key]);
    }
}
session_destroy();
echo  '<meta http-equiv="Refresh" content="0;url=">';
}
function noname()
{
echo  '<meta http-equiv="Refresh" content="0;url=./404/">';
}	
