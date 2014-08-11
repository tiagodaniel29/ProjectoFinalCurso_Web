<?php
include 'conexao.php';

$size = count($_POST['res_pes_id']);

	
	  for ($i=0; $i < $size ; $i++ ) {
	  

	  $res_pes_id = mysql_real_escape_string($_POST['res_pes_id'][$i]);
	  $res_valorExercicio = mysql_real_escape_string($_POST['res_valorExercicio'][$i]);
	  $res_estado = mysql_real_escape_string($_POST['res_estado'][$i]);

	  
	  mysql_query("INSERT INTO resultados (res_pes_id, res_valorExercicio, res_estado) 
					VALUES ('$res_pes_id', '$res_valorExercicio', '$res_estado')") 
					or die(mysql_error());
	  
					
					$result=mysql_query("SELECT MAX( res_id ) as total FROM resultados");
					$data=mysql_fetch_assoc($result);
					echo $data['total'];
					
					
					
				

				   $pla_tre_res_res_id = mysql_real_escape_string($data['total']);
				   $pla_tre_res_pla_tre_id = mysql_real_escape_string($_POST['pla_tre_res_pla_tre_id'][$i]);
				
				  mysql_query("INSERT INTO plano_treino_resultados (pla_tre_res_res_id, pla_tre_res_pla_tre_id) 
					VALUES ('$pla_tre_res_res_id', '$pla_tre_res_pla_tre_id')") 
					or die(mysql_error());
				
				
				
	  }
	    
	header("Location: ../menuPraticante.php");
	 
?> 
