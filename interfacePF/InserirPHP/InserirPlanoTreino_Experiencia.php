<?php
include 'conexao.php';

$size = count($_POST['pla_tre_id']);

	
	  for ($i=0; $i < $size ; $i++ ) {
	  $pla_tre_id = mysql_real_escape_string($_POST['pla_tre_id'][$i]);
	  $pla_cla_id = mysql_real_escape_string($_POST['pla_cla_id'][$i]);
	  $pla_exe_id = mysql_real_escape_string($_POST['pla_exe_id'][$i]);
	  $pla_tempo = mysql_real_escape_string($_POST['pla_tempo'][$i]);
	  $pla_numRepeticoes = mysql_real_escape_string($_POST['pla_numRepeticoes'][$i]);
	  
	  mysql_query("INSERT INTO plano_treino (pla_tre_id, pla_cla_id, pla_exe_id,pla_tempo,pla_numRepeticoes) 
					VALUES ('$pla_tre_id', '$pla_cla_id', '$pla_exe_id', '$pla_tempo', '$pla_numRepeticoes')") 
					or die(mysql_error());
	  echo "Completed";
		}
	 header("Location: ../menuTreinador.php");

?>