<?php 
if (@$_SESSION['auth'] == "1")
{
echo "
<title>guruh</title>
Guruh tanlang
<form name='myform' action='' method='POST'>
<select name='myform' onchange='submitform();'>
<option type='hidden'></option>";


$sqlguruh = mysqli_query($baseyip,"SELECT * FROM guruh");

while($row = mysqli_fetch_array($sqlguruh)) 
{
$gId = $row['gId'];
$guruh = $row['guruh'];
$curs = $row['curs'];
$yonalish = $row['yonalish'];
$yonalish_n = mysqli_query($baseyip,"SELECT `yturi` FROM `yonalish` WHERE `yId` = $gId");
$yonalish_no = mysqli_fetch_array($yonalish_n);
$name2 = $yonalish_no['yturi'];

echo "
   <option value='$gId'>[$guruh]&nbsp;$name2 $curs-kurs</option>

";

};
echo "</select>
</form><form name='logout' action='' method='POST'><input type='submit' name='logout' value='logout'></form>";

?>



<?php
if(isset($_POST['logout']))
{
Logoutbb();
}
if(isset($_POST['myform'])){
$test=$_POST['myform'];

$users = mysqli_query($baseyip,"SELECT * FROM guruh_users where gId=$test");
$count1 = mysqli_fetch_row($users);
if($count1 > 0)
{
echo "


<div class='jadval'>



<form action='' method='POST'>"; /* SUBMIT ON PAGE ITSELF */

$counter=0; /* WILL SET AS YOUR COUNTER FOR ARRAY PURPOSES */

while($row = mysqli_fetch_array($users)) {
$uguid = $row['uguid'];
$uname = mysqli_query($baseyip,"SELECT * FROM `users` WHERE `guid` = $uguid");
$uname_o = mysqli_fetch_array($uname);
$ismi = $uname_o['name'];
$ismi2 = $uname_o['surname'];
$ismi3 = $uname_o['fathername'];

echo "<span class='spa'>
$ismi2&nbsp;$ismi&nbsp;</span><input type='radio' name='radio[$counter]' id='radio[$counter]On' value='2' hidden=''> 
    <label for='radio[$counter]On' class='switch switch--on'>Bor</label> 
    <input type='radio' name='radio[$counter]' id='radio[$counter]Off' value='1' hidden=''> 
    <label for='radio[$counter]Off' class='switch switch--off'>Yoq</label> 
	<input type='radio' name='radio[$counter]' id='radio[$counter]Ono' value='3' hidden=''> 
    <label for='radio[$counter]Ono' class='switch switch--no'>Sababli</label> 

"; /* STORE THE RADIO BUTTON'S VALUE IN AN ARRAY */

echo "
<input type='hidden' name='id[$counter]' value='$row[gId]'>"; /* STORE THE ID IN AN ARRAY */

$counter=$counter+1;
echo " <br />";
} /* END OF WHILE LOOP */

echo "<input type='hidden' name='hiddencounter' value='$counter'>"; /* STORE THE TOTAL COUNT IN THE LOOP */
echo "<input type='submit' name='submit' value='Bajarish'></div>";
echo "</form>



";

}
if($count1 == 0)
echo "пустой";
}

?>
<?php
}
else
{
echo "YOQOL";
}
?>

