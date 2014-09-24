<?php
if(@$_SESSION['au'] == "on")
{
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

			$res = mysqli_query($baseyip,"SELECT id,email,last_login,expansion FROM account WHERE username = '{$Account}' AND sha_pass_hash = SHA1('".strtoupper($_POST['username'].":".$_POST['password'])."')");
			
			// login failed.
			if(!$row = mysqli_fetch_array($res))
			{
				return Fail();
			}
			else {
			//set authenticated
			$_SESSION['auth'] = "1";
			$_SESSION['id'] = (int)$row['id'];
			$acc=(int)$row['id'];
			$timestamp = strtotime($row['last_login']);
			$osha = date('d/m/Y', $timestamp);
			$vaqt = date('G:i:s', $timestamp);
			$_SESSION['lvl'] = (int)$row['expansion'];
			$nomi = mysqli_query($baseyip,"SELECT name, surname FROM users WHERE account ='$acc'");
			$nomi2 =mysqli_fetch_array($nomi);
			$nomi3 = $nomi2['name'];
			$nomi4 = $nomi2['surname'];
			$_SESSION['vaqt'] = "$osha soat $vaqt";
			$_SESSION['nomi'] = "$nomi3" ; // User nomini boylemiz
			$onlayn = mysqli_query($baseyip,"update account set last_login=NULL WHERE id ='$acc'");
			//success
			return Success();
		}
			}
//required input type  kereli func
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<table border="0" cellpadding="0" cellspacing="0" align="center">
<form name="login" method="post" action="">
<tr>
  <td height="28" valign="middle" class="top">Login<br>
    <input name="username" type="text" class="textfield" id="brugernavn" required placeholder="Login"  /> 
    <br>Parol<br>
    <input name="password" type="password" class="textfield" id="adgangskode" required placeholder="pass"   />
 <br><br><tr><td align=center>
 <input align="middle" name="login" type="submit" style="height:40px; width:70px" class="textfield" value="Ok">
 <input align="middle" name="v" style="height:40px; width:70px" type="submit" class="textfield" value="Reg">
 </form>
  </td>
</tr>
</table>
<?php
}
else
{
require_once "function/core.php";
noname();
} ?>