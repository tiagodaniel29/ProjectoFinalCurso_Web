<?php
include 'conexao.php';

$size = count($_POST['med_pes_id']);

	
	  for ($i=0; $i < $size ; $i++ ) {
	  $med_pes_id = mysql_real_escape_string($_POST['med_pes_id'][$i]);
	  $med_med_tipo_id = mysql_real_escape_string($_POST['med_med_tipo_id'][$i]);
	  $med_tre_id = mysql_real_escape_string($_POST['med_tre_id'][$i]);
	  $med_valor = mysql_real_escape_string($_POST['med_valor'][$i]);
	  $med_data = mysql_real_escape_string($_POST['med_data'][$i]);
	  
	  mysql_query("INSERT INTO medicoes (med_pes_id, med_med_tipo_id, med_tre_id,med_valor,med_data) 
					VALUES ('$med_pes_id', '$med_med_tipo_id', '$med_tre_id', '$med_valor', '$med_data')") 
					or die(mysql_error());
	  echo "Completed";
		}
	 
		header("Location: ../menuPraticante.php");
?>