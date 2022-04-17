<?php // content="text/plain; charset=utf-8"
include("D:/jpgraph-4.2.2/src/jpgraph.php");
include("D:/jpgraph-4.2.2/src/jpgraph_bar.php");
$con = mysqli_connect("localhost","root","180729");
 
if (!$con)
  {
  die('Could not connect: ' . mysqli_connect_error());
  }
  $file = "sqlcache.txt";
$result = unserialize(file_get_contents($file));
$search1=$_GET['search1'];
$search2=$_GET['search2'];
mysqli_select_db($con, "circ");
$result1 = mysqli_query($con,"SELECT * FROM vs WHERE sample_ID1 in (SELECT sample_ID1 FROM $result) AND sample_ID2 in (SELECT sample_ID2 FROM $result)  ");
        
foreach($result as $id=>$row){
    $Ratio[$i]=$row['log2Ratio'];
    $gene[$i]=$row['geneID'];
}
$graph=new Graph(1015,870);
$graph->cleartheme();
$graph->SetScale("textlin");
$graph->yaxis->scale->SetGrace(20);
$graph->SetShadow();
$graph->img->SetMargin(40,30,20,40);
$bplot=new BarPlot($Ratio);
$bplot->SetFillColor('orange');
$bplot->value->Show();
$graph->Add($bplot);
$graph->SetMarginColor("lightblue");
$graph->xaxis->title->Set("gene id");
$graph->yaxis->title->Set("log2Ratio");
$graph->xaxis->SetTickLabels($gene);
$graph->xaxis->SetLabelAngle(60); 
$graph->title->Setfont(FF_SIMSUN);
$graph->xaxis->Setfont(FF_SIMSUN);
$graph->Stroke();
mysqli_close($con);
?>

