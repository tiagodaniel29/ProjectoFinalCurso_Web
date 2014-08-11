

<?php
include 'conexao.php';
?>
<?PHP
session_start();

//Caso o usuário não esteja autenticado, limpa os dados e redireciona
if (!isset($_SESSION['pes_user']) and ! isset($_SESSION['pes_password'])) {
    //Destrói
    session_destroy();

    //Limpa
    unset($_SESSION['pes_user']);
    unset($_SESSION['pes_password']);

    //Redireciona para a página de autenticação
    header('location:login.php');
}
?>
<!DOCTYPE html> 
<html> 
<head> 
	<title>Page Title</title> 
	

  <meta name="viewport" content="width=device-width, initial-scale=1">
       
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
	<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	
	
	<link rel="stylesheet" href="css/idangerous.swiper.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/gallery-app.css">

</head> 
<body> 
<?php
include "libchart/classes/libchart.php";

$user = $_SESSION['pes_user'];
$sql = "select med_data, med_valor from medicoes,pessoa where med_pes_id = pes_id and pes_user = '$user' and med_med_tipo_id='2' order by med_data;";
$rs = mysql_query($sql) or die(mysql_error());

$user = $_SESSION['pes_user'];
$sql_2 = "select med_data, med_valor from medicoes,pessoa where med_pes_id = pes_id and pes_user = '$user' and med_med_tipo_id='1' order by med_data;";
$rs_2 = mysql_query($sql_2) or die(mysql_error());



$sql_4 = "select med_data, med_valor from medicoes,pessoa where med_pes_id = pes_id and pes_user = '$user' and med_med_tipo_id='4' order by med_data;";
$rs_4 = mysql_query($sql_4) or die(mysql_error());



$sql_5 = "select exe_nome, count(exe_nome) as contagem from  pessoa, resultados, plano_treino_resultados, plano_treino, exercicios
where  pes_id = res_pes_id 
and  res_id = pla_tre_res_res_id
and pla_tre_res_pla_tre_id = pla_id 
and pla_exe_id = exe_id
and pes_user = '$user' group by exe_nome;  ";
$rs_5 = mysql_query($sql_5) or die(mysql_error());

$sql_6= "select mus_designacao, count(mus_designacao) as contagem_musculos
from  pessoa, resultados, plano_treino_resultados, plano_treino, exercicios, musculos, exercicios_musculos
where  pes_id = res_pes_id 
and  res_id = pla_tre_res_res_id
and pla_tre_res_pla_tre_id = pla_id 
and pla_exe_id = exe_id 
and exe_mus_exe_id = exe_id
and exe_mus_mus_id = mus_id
and pes_user = '$user'  group by mus_designacao order by mus_designacao ;  ";
$rs_6 = mysql_query($sql_6) or die(mysql_error());

$chart = new LineChart();
$chart_line = new VerticalBarChart();

$serie1 = new XYDataSet();
while ($row = mysql_fetch_array($rs)) {
    $serie1->addPoint(new Point($row['med_data'], $row['med_valor']));
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



?>

      
<div data-role="header" data-position="fixed" data-theme="b" id="headerCustumize" >
     <a href="menuPraticante.php" data-role="button" data-icon="delete" data-iconpos="notext"></a>
          <h1>Historico de treinos</h1>
     </div> 

            <div data-role="content" data-theme="b" id="resultado" >            



	<div class="swiper-container">
		<div class="pagination"></div>
		<div class="swiper-wrapper" style="width:2424px;">
			<div class="swiper-slide">
				<div class="inner">
					<img src="graficoFreqCardMax.png" alt="">
				</div>
			</div>
			<div class="swiper-slide">
				<div class="inner">
					<img src="graficoOximetria.png" alt="">
				</div>
			</div>
			<div class="swiper-slide">
				<div class="inner">
					<img src="graficoPeso.png" alt="">
				</div>
			</div>
						<div class="swiper-slide">
				<div class="inner">
					<img src="graficoExerciciosMaisFrequentes.png" alt="">
				</div>
			</div>
			<div class="swiper-slide">
				<div class="inner">
					<img src="graficoMusculosMaisExercitados.png" alt="">
				</div>
			</div>
		
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<!-- Don't forget to get the latest Swiper and scrollbar version here-->
	<script src="js/idangerous.swiper-2.0.min.js"></script>
	<script src="js/gallery-app.js"></script>
  
</div>   
  


</body>
</html>