<html>
<head>

    
  <meta name="viewport" content="width=device-width, initial-scale=1">
       
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
	<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	

	
	</head>
<body>

<?php
$l = intval($_GET['l']);

include 'conexao.php';

$sql="Select distinct tre_data
from pessoa, resultados, plano_treino_resultados, plano_treino, treino
where pes_id = res_pes_id
and res_id = pla_tre_res_res_id
and pla_tre_res_pla_tre_id = pla_id
and pla_tre_id = tre_id and pes_id = '".$l."'";

$sql_1= "Select distinct count(tre_data) as total
from pessoa, resultados, plano_treino_resultados, plano_treino, treino
where pes_id = res_pes_id
and res_id = pla_tre_res_res_id
and pla_tre_res_pla_tre_id = pla_id
and pla_tre_id = tre_id and pes_id = '".$l."' group by pes_nome";

$sql_2= "select pes_limitacao,TIMESTAMPDIFF(YEAR,pes_dnsc,CURDATE()) as idade from pessoa where pes_id = '".$l."' ";

$sql_3= "Select med_valor as calc_p from medicoes where med_med_tipo_id='1'  and med_pes_id = '".$l."' order by med_data desc limit 1;";
$sql_4= "Select (((med_valor)/100)*((med_valor)/100)) as calc_h from medicoes where med_med_tipo_id='2'  and med_pes_id = '".$l."' order by med_data desc limit 1;";

$sql_5= "select avg(med_valor) as media_fcm from medicoes where med_med_tipo_id='2' and med_pes_id = '".$l."' ";
$sql_6= "select avg(med_valor) as media_oxi from medicoes where med_med_tipo_id='1' and med_pes_id = '".$l."' ";

$rs = mysql_query($sql) or die(mysql_error());
$rs_1 = mysql_query($sql_1) or die(mysql_error());
$rs_2 = mysql_query($sql_2) or die(mysql_error());
$rs_3 = mysql_query($sql_3) or die(mysql_error());
$rs_4 = mysql_query($sql_4) or die(mysql_error());
$rs_5 = mysql_query($sql_5) or die(mysql_error());
$rs_6 = mysql_query($sql_6) or die(mysql_error());



$data=mysql_fetch_assoc($rs_3);
$data1=mysql_fetch_assoc($rs_4);


echo "<h3>Dados Pessoais</h3>";
echo "<table>";
echo "<tr>";


	echo "<th>Idade </th>";
   echo "<th>Limita??es  </th>";
   echo "<th>IMC  </th>";
echo "</tr>";
echo "<tr>";
while($row_2 = mysql_fetch_array($rs_2)) {
  echo "<td>" . $row_2['idade'] . "</td>";
  echo "<td>" . $row_2['pes_limitacao'] . "</td>";
}  
if (mysql_num_rows($rs_3) > 0 or mysql_num_rows($rs_4) ){
echo "<td>" . $data['calc_p']/$data1['calc_h'] . "</td>";
}
else{
echo "<td> Sem registo </td>";
}
echo "</tr>";
echo "<tr>";



echo "</tr>";
echo "</table>";









echo "<h3>Estatisticas</h3>";
echo "<table>";
echo "<tr>";



  echo "<th>Treinos realizados: </th>";
while($row = mysql_fetch_array($rs)) {

  echo "<td>" . $row['tre_data'] . "</td>";

}  
echo "</tr>";
echo "<tr>";
echo "<th>N? Exer. realizados: </th>";
while($row_1 = mysql_fetch_array($rs_1)) {


  echo "<td>" . $row_1['total'] . "</td>";

}
echo "</tr>";
echo "<tr>";
echo "<th>Media FCMax: </th>";
while($row_5 = mysql_fetch_array($rs_5)) {

if (mysql_num_rows($rs_5) > 0 ){
  echo "<td>" . $row_5['media_fcm'] . "</td>";

}
else{echo "<td>Sem dados de FCMax</td>";}}
echo "</tr>";
echo "<tr>";
echo "<th>Media Oximetria: </th>";
while($row_6 = mysql_fetch_array($rs_6)) {

if (mysql_num_rows($rs_6) > 0 ){
  echo "<td>" . $row_6['media_oxi'] . "</td>";
}
else{echo "<td>Sem dados de Oximetria</td>";}
}

echo "</tr>";
echo "</table>";






include "libchart/classes/libchart.php";


$sql_novo = "select med_data, med_valor from medicoes,pessoa where med_pes_id = pes_id  and med_med_tipo_id='2' and pes_id= '".$l."' order by med_data;";
$rs_novo = mysql_query($sql_novo) or die(mysql_error());


$sql_2 = "select med_data, med_valor from medicoes,pessoa where med_pes_id = pes_id and pes_id= '".$l."' and med_med_tipo_id='1' order by med_data;";
$rs_2 = mysql_query($sql_2) or die(mysql_error());



$sql_4 = "select med_data, med_valor from medicoes,pessoa where med_pes_id = pes_id and pes_id= '".$l."' and med_med_tipo_id='4' order by med_data;";
$rs_4 = mysql_query($sql_4) or die(mysql_error());



$sql_5 = "select exe_nome, count(exe_nome) as contagem from  pessoa, resultados, plano_treino_resultados, plano_treino, exercicios
where  pes_id = res_pes_id 
and  res_id = pla_tre_res_res_id
and pla_tre_res_pla_tre_id = pla_id 
and pla_exe_id = exe_id
and pes_id= '".$l."' group by exe_nome;  ";
$rs_5 = mysql_query($sql_5) or die(mysql_error());

$sql_6= "select mus_designacao, count(mus_designacao) as contagem_musculos
from  pessoa, resultados, plano_treino_resultados, plano_treino, exercicios, musculos, exercicios_musculos
where  pes_id = res_pes_id 
and  res_id = pla_tre_res_res_id
and pla_tre_res_pla_tre_id = pla_id 
and pla_exe_id = exe_id 
and exe_mus_exe_id = exe_id
and exe_mus_mus_id = mus_id
and pes_id = '".$l."'  group by mus_designacao order by mus_designacao ;  ";
$rs_6 = mysql_query($sql_6) or die(mysql_error());

$chart = new LineChart();
$chart_line = new VerticalBarChart();

$serie1 = new XYDataSet();
while ($row_novo = mysql_fetch_array($rs_novo)) {
    $serie1->addPoint(new Point($row_novo['med_data'], $row_novo['med_valor']));
}

$serie2 = new XYDataSet();
while ($row_2 = mysql_fetch_array($rs_2)) {
    $serie2->addPoint(new Point($row_2['med_data'], $row_2['med_valor']));
}

$serie4 = new XYDataSet();
while ($row_4 = mysql_fetch_array($rs_4)) {
    $serie4->addPoint(new Point($row_4['med_data'], $row_4['med_valor']));
}

$dataSet_line = new XYDataSet();
while($row_5 = mysql_fetch_array($rs_5)) {
	$dataSet_line->addPoint(new Point($row_5['exe_nome'],$row_5['contagem']));
}

$dataSet_line2 = new XYDataSet();
while($row_6 = mysql_fetch_array($rs_6)) {
	$dataSet_line2->addPoint(new Point($row_6['mus_designacao'],$row_6['contagem_musculos']));
}

$dataSet = new XYSeriesDataSet();
$dataSet->addSerie("Oximetria", $serie2);
$chart->setDataSet($dataSet);
$chart->setTitle("Valor da Oximetria");
$chart->getPlot()->setGraphCaptionRatio(0.62);
$chart->render("graficoOximetria.png");




$dataSet1 = new XYSeriesDataSet();
$dataSet1->addSerie("Fre Card Máx", $serie1);
$chart->setDataSet($dataSet1);
$chart->setTitle("Valor da FCMáx");
$chart->getPlot()->setGraphCaptionRatio(0.62);
$chart->render("graficoFreqCardMax.png");


$dataSet4 = new XYSeriesDataSet();
$dataSet4->addSerie("Peso", $serie4);
$chart->setDataSet($dataSet4);
$chart->setTitle("Variação Peso(Kg)/Tempo(data)");
$chart->getPlot()->setGraphCaptionRatio(0.62);
$chart->render("graficoPeso.png");


$chart_line->setDataSet($dataSet_line);
$chart_line->setTitle("Frequência de Exercicios Realizados");
$chart_line->render("graficoExerciciosMaisFrequentes.png");

$chart_line->setDataSet($dataSet_line2);
$chart_line->setTitle("Musculos mais exercitados");
$chart_line->render("graficoMusculosMaisExercitados.png");


/*
                echo "<img alt='Vertical bars chart' src='graficoOximetria.png' />";
                echo "<p/>";
                echo "<img alt='Vertical bars chart' src='graficoFreqCardMax.png' />";
                echo "<p/>";
                echo "<img alt='Vertical bars chart' src='graficoPeso.png' />";
                echo "<p/>";
                echo "<img alt='' src='graficoExerciciosMaisFrequentes.png' />";
                echo "<p/>";
                echo "<img alt='' src='graficoMusculosMaisExercitados.png' />";
            
*/

?>
				<p/>
                <img alt="Vertical bars chart" src="graficoOximetria.png" />
                <p/>
                <img alt="Vertical bars chart" src="graficoFreqCardMax.png" />
                <p/>
                <img alt="Vertical bars chart" src="graficoPeso.png" />
                <p/>
                <img alt="" src="graficoExerciciosMaisFrequentes.png" />
                <p/>
                <img alt="" src="graficoMusculosMaisExercitados.png" />
            
</body>
</html>