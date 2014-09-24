<title>YIP</title>
<?php
if(isset($_POST['nazad']))
{
header( "refresh:0;url=../" );
}
if(isset($_POST['register']))
{
include "./configreg.php";
$username = preg_replace("/[^A-Za-z0-9]/", "", $_POST['username']);
$username = ucfirst($username);
if($username == "") { echo "Login yozin"; } else { $password = preg_replace("/[^A-Za-z0-9]/", "", $_POST['password']);

if($password == "") { echo "Parol yozin"; } 
else 
{ $cpass = preg_replace("/[^A-Za-z0-9]/", "", $_POST['cpass']);

if($cpass == "") { echo "Parolni qaytarin"; } else 
{
if($cpass != $password) { echo "Parol notogri"; } 


else { $email = ucfirst(mysql_real_escape_string(stripslashes(htmlentities($_POST['email']))));

if($email == "") { echo "Email kiritin"; } 
else 
{
$check_user = mysql_query("SELECT username FROM account WHERE username='$username'");
$checked = mysql_num_rows($check_user); 
if($checked == 1)
{
print"{$username} nomli login band";
}else{
$check_mail = mysql_query("SELECT email FROM account WHERE email='$email'");
$checked = mysql_num_rows($check_mail); if($checked == 1){
print"{$email} nomli email band";
}
else
{
$password = sha1(strtoupper($username) . ":" . strtoupper($password));

$password = strtoupper($password);
$expansionnumber = $_POST['expansion'];

mysql_query("INSERT INTO account 
(username, sha_pass_hash, email, expansion) VALUES ('$username', '$password', '$email', '$expansionnumber')");

print"<i>{$username}</i> nomli account ochildi.<br/>";
}}}}}}}}
@mysql_close($connect);
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <style type=text/css> 
body 
{
cursor:url(), auto;
}
input
{
cursor:url(./pencil.cur), auto;
}
</style>
</head>
<body>

<table align="center">

<form action="" method="post">
<td align=right></td><td>REGISTRATSIYA</td>
    <tr><td align=right></td><td><input type="text" name="username" placeholder="Login"></td></tr>
<tr><td align=right></td><td><input type="password" name="password" placeholder="Parol"></td></tr>
<tr><td align=right> </td><td><input type="password" name="cpass" id="register"placeholder="Parol qaytarin"></td></tr>
<tr><td align=right></td> <td><input type="text" name="email" id="register" AutoComplete="off"placeholder="Email"></td></tr>
<tr><td align=right></td> <td><select name="expansion">
  <option value="1">Domla</option>
  <option value="2">Dekan</option>
  <option value="3">Rektor</option>
  <option value="4">Admin</option>
  <select>
</td></tr>
<tr><td></td> <td align="center">
<input type="submit" name="nazad" value="Bosh sahifa" ><input type="submit" name="register" value="ok" ></td>
</tr>
</form>
</table>
</body>
</html>
