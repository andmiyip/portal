<?php 
if (@$_SESSION['auth'] == "1")
{
if (@$_SESSION['quiq'] == "1")
{
echo "
<title>Juftlik soatini tanlang</title>
Juftlik soatini tanlang
<form name='myform2' action='' method='POST'>
<select name='myform2' onchange='submitform2();'>
<option type='hidden'></option>
<option value='1'>1-Juftlik</option>
<option value='2'>2-Juftlik</option>
<option value='3'>3-Juftlik</option>
<option value='4'>4-Juftlik</option>
</select>

</form>";
}
?>



<?php

if(isset($_POST['myform2']))
{
$_SESSION['quiq'] = "2";
$kursikan = $_POST['myform2'];
echo "
<br><strong>$kursikan-juftlik</br><br></strong>
Guruh tanlang<br>
<form name='myform' action='' method='POST'>
<input type='hidden' name='darsvaqti' value='$kursikan'>
<select name='myform' onchange='submitform();'>
<option type='hidden'></option>";


$sqlguruh = mysqli_query($baseyip,"SELECT * FROM guruh");

while($row = mysqli_fetch_array($sqlguruh)) 
{
$gId = $row['gId'];
$guruh = $row['guruh'];
$curs = $row['curs'];
$yonalish = $row['yonalish'];
$yonalish_n = mysqli_query($baseyip,"SELECT yturi FROM yonalish WHERE yId = $gId");
$yonalish_no = mysqli_fetch_array($yonalish_n);
$name2 = $yonalish_no['yturi'];

echo "<option value='$gId'>[$guruh]&nbsp;$name2 $curs-kurs</option>";

};
echo "</select>

</form>";
}
if(isset($_POST['kiritish']))
{ /* IF FORM HAS BEEN SUBMITTED */

/* STORE THE SUBMITTED POST DATA */

$counter=$_POST['hiddencounter'];
$radio=$_POST['radio'];
$id=$_POST['id'];
$gId=$_POST['yonalgid'];
$mavzu=$_POST['mavzu'];
$fan=$_POST['fan'];
$yil=date("Y");
$oy=date("m");
$kun=date("d");
$domla=$_SESSION['id'];
$paraeka=$_POST['paraekan'];

/* */


for($x=1;$x<=$counter;$x++)
{
$ulan = mysqli_query($baseyip,"Insert into  `2` values ('$gId', '$id[$x]','$yil', '$oy', '$kun','$paraeka','$fan','$mavzu', '$radio[$x]',NULL, '$domla','','')");
$ulan;
}
echo "<meta http-equiv='Refresh' content='3;url='><br><br><br>Malumot Kiritilmoqda....<br><br><center><img src='1.gif'></center>";
}
/*
$hiddengid=$_POST['hiddengid'];



$Kiritish = mysqli_query($baseyip,"INSERT INTO
    `party` (`talaba`,`yonalish`)

SELECT
`guruh_users`.`uguid`,
`guruh_users`.`gId`
    
FROM
    `guruh_users`
WHERE
    `guruh_users`.`gId` = '$hiddengid'");
 
$Kiritish; */



if(isset($_POST['myform'])){
$raqam=$_POST['myform'];
$darsvaqt=$_POST['darsvaqti'];
$yil=date("Y");
$oy=date("m");
$kun=date("d");
$checking = mysqli_query($baseyip,"SELECT * FROM `2` where gId='$raqam' and yil='$yil' and oy='$oy' and kun='$kun' and para='$darsvaqt'");
if( $checking->num_rows == 0)
{
$yona = mysqli_query($baseyip,"SELECT * FROM guruh where gId=$raqam");
$yonal = mysqli_fetch_array($yona);
$guru = $yonal['guruh'];
$cur = $yonal['curs'];
$yonalis = $yonal['yonalish'];
$yonalis_n = mysqli_query($baseyip,"SELECT yturi FROM yonalish WHERE yId = $raqam");
$yonalis_no = mysqli_fetch_array($yonalis_n);
$name22 = $yonalis_no['yturi'];
$users = mysqli_query($baseyip,"SELECT g.gId, g.uguid, u.surname, u.`name`, u.fathername 
FROM guruh_users g
INNER JOIN users u ON g.uguid = u.guid where g.gId=$raqam ORDER BY g.uguid");

$count1 = mysqli_query($baseyip,"SELECT * from `2` where gId=$raqam");
$count1 = mysqli_query($baseyip,"SELECT uguid from guruh_users where gId=$raqam");

if( $count1->num_rows > 0)
{

echo "
<br><strong>
Juftlik soati: $darsvaqt<br>
Yonalish:$name22<br>
Kurs: $cur<br>
ID: $guru</strong>
<hr>
<div class='jadval'>



<form action='' method='POST'><input type='hidden' name='paraekan' value='$darsvaqt'>"; /* SUBMIT ON PAGE ITSELF */

$counter=1; /* WILL SET AS YOUR COUNTER FOR ARRAY PURPOSES */

while($row = mysqli_fetch_array($users)) {
$uguid = $row['uguid'];
$ismi = $row['name'];
$ismi2 = $row['surname'];
$ismi3 = $row['fathername'];

echo "<span class='spa'>$counter.&nbsp;$ismi2&nbsp;$ismi&nbsp;</span>
    <input type='radio' name='radio[$counter]' id='radio[$counter]On' required value='1' hidden=''> 
    <label for='radio[$counter]On' class='switch switch--on'>Bor</label> 
    <input type='radio' name='radio[$counter]' id='radio[$counter]Off' value='2' hidden=''> 
    <label for='radio[$counter]Off' class='switch switch--off'>Yoq</label> 
	<input type='radio' name='radio[$counter]' id='radio[$counter]Ono' value='3' hidden=''> 
    <label for='radio[$counter]Ono' class='switch switch--no'>Sababli</label> 

"; /* STORE THE RADIO BUTTON'S VALUE IN AN ARRAY */

echo "
<input type='hidden' name='id[$counter]' value='$row[uguid]'>"; /* STORE THE ID IN AN ARRAY */
$counter=$counter+1;
echo " <br />";
} /* END OF WHILE LOOP */
$counter=$counter-1;
echo "<input type='hidden' name='hiddencounter' value='$counter'>"; /* STORE THE TOTAL COUNT IN THE LOOP */
echo "<input type='hidden' name='yonalgid' value='$raqam'>";
echo "
<hr><strong>Fan nomi:</strong><br>
<select name='fan' required >
<option type='hidden'></option>";

$fanlar = mysqli_query($baseyip,"SELECT * FROM fanlar");

while($row = mysqli_fetch_array($fanlar)) 
{
$fanId = $row['fanId'];
$fanturi = $row['fanturi'];

echo "
   <option value='$fanId'>$fanturi</option>";
}
echo "</select></div><strong>Mavzu:</strong><br><input type='text' required='mavzu' size=50 name='mavzu'><br><input type='submit' name='kiritish' value='Kiritish'>";
echo "</form>";

}
if($count1->num_rows == 0)
echo "<br></br>
<strong>&nbsp;($name22) $cur-kurs&nbsp;talabalari&nbsp;royhati</strong>
<br></br>
<h2>Bu guruh talabalari malumotlar bazasiga kiritilmagan.</h2>";
}
if( $checking->num_rows > 0)
echo "already in base";
}
?>
<?php
}
else
{
require_once "function/core.php";
noname();
}
?>

