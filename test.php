<?php 
include "function/config.php";

$talaba = mysqli_query($baseyip,"SELECT COUNT(*) as total FROM guruh_users WHERE gId = 1");
$data=mysqli_fetch_assoc($talaba);
$talabasoni=$data['total'];



$datacount = mysqli_query($baseyip,"Select COUNT(*) as total from `2`where gId=1 and kun in (19,24)  ORDER BY kun,para");
$data1=mysqli_fetch_assoc($datacount);
$datacountnum=$data1['total'];



echo $datacountnum/$talabasoni;


/*

$newmy1 = mysqli_query($baseyip,"select userid,chek from `2`where gId=1 and in values (19,20)  ORDER BY userid");



$a=100;
$b=25;

$r=$a/$b;

for ($i=1;$i<=$r;$i++)
{
echo $i;
}
echo "<table width='100%' border='1' align='center' cellpadding='1' cellspacing='1'>
<tr><td align='center'colspan='1'></td><td align='center'colspan='4'>19.09.2014</td>
";

echo "<td align='center'colspan='4'>22.09.2014</td>";

echo "</tr>";

if " <td align='center'colspan='5'>22.09.2014</td></tr>

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



*/
?>