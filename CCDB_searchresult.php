<!DOCTYPE html>
<head>
  <link href="CCDB.css" rel="stylesheet" type="text/css">
    <link href="CCDB_theme.css" rel="stylesheet" type="text/css">
    <link href="CCDB1.css" rel="stylesheet" type="text/css">
    <link href="CCDB_icon.css" rel="stylesheet" type="text/css">
  <style type="text/css">
a:link,a:visited{
 text-decoration:none;color:blue;  /*超链接无下划线*/
}
a:hover{
 text-decoration:underline;  /*鼠标放上去有下划线*/
}
</style>

  <body>
<?php
$con = mysqli_connect("localhost","root","180729");

if (!$con)
  {
  die('Could not connect: ' . mysqli_connect_error());
  }
$sample=$_POST['sample'];
$search=$_POST['search'];
mysqli_select_db($con, "circ");
if ($sample=='All_Sample'){
	if (empty($search))
    $result = mysqli_query($con,"SELECT * FROM sample_circRNA_result ");
  if (!empty($search))
    $result = mysqli_query($con,"SELECT * FROM sample_circRNA_result WHERE circRNA_ID='$search'");}
if ($sample!='All_Sample'){
  if (empty($search))
    $result = mysqli_query($con,"SELECT * FROM sample_circRNA_result WHERE sample_ID='$sample'");
  if (!empty($search))
    $result = mysqli_query($con,"SELECT * FROM sample_circRNA_result WHERE sample_ID='$sample' AND circRNA_ID='$search'");}
?>

<table border="1" cellpadding="0" style="border-collapse:collapse;" >
<tr>
<th style="width:5%;font-size:14px;background-color:#66CCFF" >Type</th>
<th style="width:5%;font-size:14px;background-color:#66CCFF">Sample Source</th>
<th style="width:10%;font-size:14px;background-color:#66CCFF">circRNA ID</th>
<th style="width:10%;font-size:14px;background-color:#66CCFF">circBase ID</th>
<th style="width:5%;font-size:14px;background-color:#66CCFF">circRNA_start</th>
<th style="width:10%;font-size:14px;background-color:#66CCFF">circBase_end</th>
<th style="width:10%;font-size:14px;background-color:#66CCFF">junction_reads</th>
<th style="width:3%;font-size:14px;background-color:#66CCFF">SM_MS_SMS</th>
<th style="width:7%;font-size:14px;background-color:#66CCFF">non_junction_reads</th>
<th style="width:3%;font-size:14px;background-color:#66CCFF">junction_reads_ratio</th>
<th style="width:7%;font-size:14px;background-color:#66CCFF">circRNA_type</th>
<th style="width:20%;font-size:14px;background-color:#66CCFF">gene id</th>
<th style="width:5%;font-size:14px;background-color:#66CCFF">strand</th>
</tr>
<?php
while($row = mysqli_fetch_array($result))
  {
    ?>
  <tr>
  <td style="width:5%;font-size:13px" align="center"><?php echo  $row['disease_ID'];  ?></td>
  <td style="width:5%;font-size:13px" align="center"><?php echo  $row['sample_ID'];  ?></td>
  <td style="width:10%;font-size:13px" align="center"><?php echo $row['circRNA_ID'];  ?></td>
  <td style="width:10%;font-size:13px" align="center"><a href="CCDB_circbase_detail.php?circBase_ID=<?php echo $row['circBase_ID']; ?>"  target="detail"><?php echo  $row['circBase_ID'];  ?>  </td>
  <td style="width:5%;font-size:13px" align="center"><?php echo  $row['circRNA_start'];  ?></td>
  <td style="width:10%;font-size:13px" align="center"><?php echo  $row['circRNA_end'];  ?></td>
  <td style="width:10%;font-size:13px" align="center"><?php echo  $row['junction_reads'];  ?></td>
  <td style="width:3%;font-size:13px" align="center"><?php echo  $row['SM_MS_SMS'];  ?></td>
  <td style="width:7%;font-size:13px" align="center"><?php echo  $row['non_junction_reads'];  ?></td>
  <td style="width:3%;font-size:13px" align="center"><?php echo  $row['junction_reads_ratio'];  ?></td>
  <td style="width:7%;font-size:13px" align="center"><?php echo  $row['circRNA_type'];  ?></td>
  <td style="width:20%;font-size:13px" align="center"><a href="https://www.ncbi.nlm.nih.gov/gene/?term=<?php echo $row['gene_id']; ?>" target="_blank"><?php echo $row['gene_id']; ?></td>
  <td style="width:5%;font-size:13px" align="center"><?php echo  $row['strand'];  ?></td>
  </tr>
 <?php  } ?>
</table>
<?php 
mysqli_close($con)
?>

</body>
</head>