<?php
if(isset($_POST['v']))
{
header( "refresh:0;url=./reg/" );
}
if(isset($_POST['login']))
{
$sqlguruh = mysqli_query($baseyip,"SELECT * FROM guruh");
@mysqli_query($baseyip,"SET NAMES $database_encoding");
			//verify
			$Account = addslashes($_POST['username']);
			$Password = addslashes($_POST['password']);

			$res = mysqli_query($baseyip,"SELECT id,email FROM account WHERE username = '{$Account}' AND sha_pass_hash = SHA1('".strtoupper($_POST['username'].":".$_POST['password'])."')");
			
			// login failed.
			if(!$row = mysqli_fetch_array($res))
			{
				return Fail();
			}
			else {
			//set authenticated
			$_SESSION['auth'] = "1";
			$_SESSION['id'] = (int)$row['id'];
			$_SESSION['lvl'] = (int)$row['expansion'];
			$_SESSION['nomi'] = $Account; // User nomini boylemiz
			//success
			return Success();
		}
			}

?>

<table border="0" cellpadding="0" cellspacing="0" align="center">
<form name="login" method="post" action="">
<tr>
  <td height="28" valign="middle" class="top">Login<br>
    <input name="username" type="text" class="textfield" id="brugernavn" /> 
    <br>Parol<br>
    <input name="password" type="password" class="textfield" id="adgangskode"/>
 <br><br><tr><td align=center>
 <input align="middle" name="login" type="submit" class="textfield" value="Ok"><input align="middle" name="v" type="submit" class="textfield" value="Reg">
 </form>
  </td>
</tr>
</table>
