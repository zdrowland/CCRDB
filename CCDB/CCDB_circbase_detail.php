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
$circBase_ID=$_GET['circBase_ID'];
$result = mysqli_query($con,"SELECT * FROM circbase_all WHERE circID='$circBase_ID'");
?>
<div align="left">
  <form method="post" action="CCDB_circbase_compare.php" target="detail">
    <input name="circBase_ID"  type="hidden" value="<?php echo $circBase_ID;?>">
    <input  type="submit" value="Compare" style="width:10%;background-color:orange" >
</form>
</div>

<table border="1" cellpadding="0" style="border-collapse:collapse;" >
<tr>
<th style="font-size:14px;background-color:#66CCFF" align="center">circBase ID</th>
<th style="font-size:14px;background-color:#66CCFF" align="center">gene ID</th>
<th style="font-size:14px;background-color:#66CCFF" align="center">genomic length</th>
<th style="font-size:14px;background-color:#66CCFF" align="center">spliced seq length</th>
<th style="font-size:14px;background-color:#66CCFF" align="center">total junction reads</th>
<th style="font-size:14px;background-color:#66CCFF" align="center">samples</th>
<th style="font-size:14px;background-color:#66CCFF" align="center">repeats</th>
<th style="font-size:14px;background-color:#66CCFF" align="center">annotation</th>
<th style="font-size:14px;background-color:#66CCFF" align="center">best transcript</th>
<th style="font-size:14px;background-color:#66CCFF" align="center">circRNA study</th>
</tr>
<?php
while($row = mysqli_fetch_array($result))
  {
    ?> 
  <tr>
  <td style="font-size:14px;background-color:#F0F0F0" align="center"><?php echo $row['circID']; ?> </td>
  <td style="font-size:14px;background-color:#F0F0F0" align="center"><?php echo $row['gene_symbol']; ?> </td>
  <td style="font-size:14px;background-color:#F0F0F0" align="center"><?php echo $row['genomic_length']; ?> </td>
  <td style="font-size:14px;background-color:#F0F0F0" align="center"><?php echo $row['spliced_seq_length']; ?> </td>
  <td style="font-size:14px;background-color:#F0F0F0" align="center"><?php echo $row['total_junction_reads']; ?> </td>
  <td style="font-size:14px;background-color:#F0F0F0" align="center"><?php echo $row['samples']; ?> </td>
  <td style="font-size:14px;background-color:#F0F0F0" align="center"><?php echo $row['repeats']; ?> </td>
  <td style="font-size:14px;background-color:#F0F0F0" align="center"><?php echo $row['annotation']; ?> </td>
  <td style="font-size:14px;background-color:#F0F0F0" align="center"><?php echo $row['best_transcript']; ?> </td>
  <td style="font-size:14px;background-color:#F0F0F0" align="center"><?php echo $row['circRNA_study']; ?> </td>
</tr>
<?php } ?>
</table>
<?php
mysqli_close($con)
?>
</body>
</head>