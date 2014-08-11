<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "projf";
$conexao = mysql_connect($host,$user,$pass) or die (mysql_error());
mysql_select_db($banco) or die(mysql_error());

	include "../libchart/classes/libchart.php";

	$chart = new PieChart();
	$dataSet = new XYDataSet();
	
	$sql_2= "select pes_sexo , avg(TIMESTAMPDIFF(YEAR,pes_dnsc,CURDATE())) as media_idade_sexo from pessoa where pes_pes_tipo_id='2' group by pes_sexo;";
	$rs_2 = mysql_query($sql_2) or die(mysql_error());

	while($row_2 = mysql_fetch_array($rs_2)) {

   $dataSet->addPoint(new Point($row_2['pes_sexo'],$row_2['media_idade_sexo']));

   }  
	
	

	$chart->setDataSet($dataSet);

	$chart->setTitle("");
	$chart->render("generated/demo3.png");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Libchart pie chart demonstration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
	<img alt="Pie chart"  src="generated/demo3.png"/>
</body>
</html>
