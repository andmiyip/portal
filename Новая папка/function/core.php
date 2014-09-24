<?php /*Author fr0z3n4rm0r xD */

function Fail()
	{
echo "<center>Ошибка! Неверный логин или пароль!</center>";
	}

function Success()
	{
echo  '<meta http-equiv="Refresh" content="0;url=">';
echo "Входим...";
	}
function Logoutbb()
{
session_destroy();
unset($_SESSION['auth']);
echo  '<meta http-equiv="Refresh" content="0;url=">';
}