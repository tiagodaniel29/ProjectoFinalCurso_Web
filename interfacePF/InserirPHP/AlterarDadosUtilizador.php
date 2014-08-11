<html>
<head></head>
<body>

<?php
include 'conexao.php';
?>



<?php 
$variavel=$_POST['variavel'];
$pes_nome=$_POST['pes_nome'];
$pes_pes_tipo_id=$_POST['pes_pes_tipo_id'];
$pes_dnsc=$_POST['pes_dnsc'];
$pes_sexo=$_POST['pes_sexo'];
$pes_user=$_POST['pes_user'];
$pes_password=$_POST['pes_password'];
$pes_estado=$_POST['pes_estado'];
$pes_nivel=$_POST['pes_nivel'];
$pes_limitacao=$_POST['pes_limitacao'];



$sql = mysql_query("UPDATE Pessoa SET pes_nome = '$pes_nome',
						pes_pes_tipo_id = '$pes_pes_tipo_id',
						pes_dnsc = '$pes_dnsc',
						pes_sexo = '$pes_sexo',
						pes_user = '$pes_user',
						pes_password = '$pes_password',
						pes_estado = '$pes_estado',
						pes_nivel = '$pes_nivel',
						pes_limitacao = '$pes_limitacao'
						WHERE pes_id = '$variavel'; ");
											
echo("<center>Valores alerados na tabela com sucesso</center>");
$rs = mysql_query($sql) or die(mysql_error());
mysql_free_result($rs);


?>

</body>
</html>