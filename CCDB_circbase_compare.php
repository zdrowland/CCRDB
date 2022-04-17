<!DOCTYPE html>
<head>
  <body>
<?php
$con = mysqli_connect("localhost","root","180729");

if (!$con)
  {
  die('Could not connect: ' . mysqli_connect_error());
  }
mysqli_select_db($con, "circ");
$circBase_ID=$_POST['circBase_ID'];



$result = mysqli_query($con,"SELECT * FROM sample_circrna_result WHERE circBase_ID='$circBase_ID'");
?>

<table border="1" cellpadding="0" style="border-collapse:collapse;" >
<tr> 
<th style="width:20%;font-size:14px;background-color:#66CCFF">circBase ID</th>
<th style="width:20%;font-size:14px;background-color:#66CCFF">gene ID</th>
<th style="width:20%;font-size:14px;background-color:#66CCFF">total junction reads</th>
<th style="width:20%;font-size:14px;background-color:#66CCFF">samples</th>

</tr>
<?php
while($row = mysqli_fetch_array($result))
  {
    ?> 
  <tr> 
  <td style="width:20%;font-size:14px;background-color:#FFFFCC" align="center"><?php echo $row['circBase_ID']; ?> </td>
  <td style="width:20%;font-size:14px;background-color:#FFFFCC" align="center"><?php echo $row['gene_id']; ?> </td>
  <td style="width:20%;font-size:14px;background-color:#FFFFCC" align="center"><?php echo $row['junction_reads']; ?> </td>
  <td style="width:20%;font-size:14px;background-color:#FFFFCC" align="center"><?php echo $row['sample_ID']; ?></td>
<?php } ?>
<?php
$result = mysqli_query($con,"SELECT * FROM circbase_all WHERE circID='$circBase_ID'");
while($row = mysqli_fetch_array($result))
  {
    ?> 
  <tr>
  <td style="width:20%;font-size:14px;background-color:#F0F0F0" align="center"><?php echo $row['circID']; ?> </td>
  <td style="width:20%;font-size:14px;background-color:#F0F0F0" align="center"><?php echo $row['gene_symbol']; ?> </td>
  <td style="width:20%;font-size:14px;background-color:#F0F0F0" align="center"><?php echo $row['total_junction_reads']; ?> </td>
  <td style="width:20%;font-size:14px;background-color:#F0F0F0" align="center"><?php echo $row['samples']; ?> </td>
<?php } ?>

</table>
<?php
mysqli_close($con)
?>
</body>
</head>