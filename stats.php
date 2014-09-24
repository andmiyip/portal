<?php 
if (@$_SESSION['auth'] == "1")
{


echo "
<table width='100%' border='1' align='center' cellpadding='1' cellspacing='1'>
<tr><td align='center'colspan='1'></td><td align='center'colspan='4'>19.09.2014</td><td align='center'colspan='4'>22.09.2014</td></tr>

<tr> 
<td align='center'><b>Ismi</b></td> 
<td align='center'><b>1 juftlik</b></td> 
<td align='center'><b>2 juftlik</b></td> 
<td align='center'><b>3 juftlik</b></td> 
<td align='center'><b>4 juftlik</b></td>
<td align='center'><b>1 juftlik</b></td> 
<td align='center'><b>2 juftlik</b></td> 
<td align='center'><b>3 juftlik</b></td> 
<td align='center'><b>4 juftlik</b></td>  
</tr>";


$icount = mysqli_query($baseyip,"SELECT COUNT(*) FROM guruh_users WHERE gId = 1");
$row = mysqli_fetch_array($icount);
$posts = $row[0];
$newmy1 = mysqli_query($baseyip,"select userid,chek from `2`where gId=1 and kun=19 and para=1 ORDER BY userid");
$newmy2 = mysqli_query($baseyip,"select userid,chek from `2`where gId=1 and kun=19 and para=2 ORDER BY userid");
$newmy3 = mysqli_query($baseyip,"select userid,chek from `2`where gId=1 and kun=19 and para=3 ORDER BY userid");
$newmy4 = mysqli_query($baseyip,"select userid,chek from `2`where gId=1 and kun=19 and para=4 ORDER BY userid");
$newmy12 = mysqli_query($baseyip,"select userid,chek from `2`where gId=1 and kun=22 and para=1 ORDER BY userid");
$newmy22 = mysqli_query($baseyip,"select userid,chek from `2`where gId=1 and kun=22 and para=2 ORDER BY userid");
$newmy32 = mysqli_query($baseyip,"select userid,chek from `2`where gId=1 and kun=22 and para=3 ORDER BY userid");
$newmy42 = mysqli_query($baseyip,"select userid,chek from `2`where gId=1 and kun=22 and para=4 ORDER BY userid");

$i=0;

$row1 = @mysql_fetch_array($data[$i]); 
{ 
while($row1 = mysqli_fetch_array($newmy1)) 
{
$userid = $row1['userid'];
$yonalis_n2 = mysqli_query($baseyip,"SELECT surname FROM users WHERE guid = $userid");
$yonalis_nn = mysqli_fetch_array($yonalis_n2);
$yonalis_n = $yonalis_nn['surname'];
$chek1 = $row1['chek'];
$row2 = mysqli_fetch_array($newmy2);
$chek2 = $row2['chek'];
$row3 = mysqli_fetch_array($newmy3);
$chek3 = $row3['chek'];
$row4 = mysqli_fetch_array($newmy4);
$chek4 = $row4['chek'];
if($row1['chek']==1)
$cheking = '+'; 
if($row1['chek']==2)
$cheking = '-'; 
if($row1['chek']==3)
$cheking = '*'; 

if($row2['chek']==1)$cheking2 = '+';if($row2['chek']==2)$cheking2 = '-';if($row2['chek']==3)$cheking2 = 'S'; 

if($row3['chek']==1)
$cheking3 = '+'; 
if($row3['chek']==2)
$cheking3 = '-'; 
if($row3['chek']==3)
$cheking3 = '*'; 

if($row4['chek']==1)
$cheking4 = '+'; 
if($row4['chek']==2)
$cheking4 = '-'; 
if($row4['chek']==3)
$cheking4 = 'S';




$row12 = mysqli_fetch_array($newmy12);
$chek12 = $row12['chek'];
$row22 = mysqli_fetch_array($newmy22);
$chek22 = $row22['chek'];
$row32 = mysqli_fetch_array($newmy32);
$chek32 = $row32['chek'];
$row42 = mysqli_fetch_array($newmy42);
$chek42 = $row42['chek'];

if($row12['chek']==1)@$cheking12 = '+';if($row12['chek']==2)@$cheking12 = '-';if($row12['chek']==3)@$cheking12 = 'S'; 
if($row22['chek']==1)@$cheking22 = '+';if($row22['chek']==2)@$cheking22 = '-';if($row22['chek']==3)@$cheking22 = 'S'; 
if($row32['chek']==1)@$cheking32 = '+';if($row32['chek']==2)@$cheking32 = '-';if($row32['chek']==3)@$cheking32 = 'S'; 
if($row42['chek']==1)@$cheking42 = '+';if($row42['chek']==2)@$cheking42 = '-';if($row42['chek']==3)@$cheking42 = 'S'; 
 

echo"<tr> 
<td width=40 height='15' nowrap='nowrap'>$userid . $yonalis_n</td> 
<td width=30 align='center' nowrap='nowrap'>$cheking</td> 
<td width=30 align='center' nowrap='nowrap'>$cheking2</td> 
<td width=30 align='center' nowrap='nowrap'>$cheking3</td> 
<td width=30 align='center' nowrap='nowrap'>$cheking4</td>
<td width=30 align='center' nowrap='nowrap'>$cheking12</td> 
<td width=30 align='center' nowrap='nowrap'>$cheking22</td> 
<td width=30 align='center' nowrap='nowrap'>$cheking32</td> 
<td width=30 align='center' nowrap='nowrap'>$cheking42</td></tr>";
$i++;
}
}
echo "</tr></table>";

/*for($x=0;$x<=$posts;$x++)
{

}*/


}
?>