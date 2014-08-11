<?php
include 'conexao.php';



 
$size = count($_POST['pes_nome']);
 
$i = 0;
while ($i < $size) {
	$pes_id = $_POST['pes_id'][$i];
	$pes_nome = $_POST['pes_nome'][$i];
	$pes_dnsc = $_POST['pes_dnsc'][$i];
	$pes_user = $_POST['pes_user'][$i];
	$pes_password = $_POST['pes_password'][$i];
	$pes_nivel = $_POST['pes_nivel'][$i];
	$pes_estado = $_POST['pes_estado'][$i];
	$pes_limitacao= $_POST['pes_limitacao'][$i];
	
 
	$query = "UPDATE pessoa 
						SET pes_nome = '$pes_nome',
						pes_dnsc = '$pes_dnsc', 
						pes_user = '$pes_user',
						pes_password = '$pes_password', 
						pes_nivel = '$pes_nivel', 
						pes_estado = '$pes_estado', 
						pes_limitacao = '$pes_limitacao' 
						WHERE pes_id = '$pes_id' LIMIT 1";
	mysql_query($query) or die ("Error in query: $query");
	echo "$pes_estado<br /><br /><em>Updated!</em><br /><br />";
	++$i;
}
	header("Location: ../menuAdministrador.php");

?>