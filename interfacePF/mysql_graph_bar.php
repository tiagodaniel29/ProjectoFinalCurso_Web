<?php
include 'conexao.php';
include("phpgraphlib.php");
$graph=new PHPGraphLib(550,350); 


     
mysql_select_db('projf') or die('Could not select database');
  
$dataArray=array();
  
//get data from database

$sql="select med_pes_id, avg(med_valor) as 'media' from medicoes group by med_pes_id;";
$result = mysql_query($sql) or die('Query failed: ' . mysql_error());

if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
      $med_pes_id=$row["med_pes_id"];
      $media=$row["media"];
      //add to data areray
      $dataArray[$med_pes_id]=$media;
  }
}
  
//configure graph
$graph->addData($dataArray);
$graph->setTitle("Media peso");
$graph->setGradient("lime", "green");
$graph->setBarOutlineColor("black");
$graph->createGraph();
?>