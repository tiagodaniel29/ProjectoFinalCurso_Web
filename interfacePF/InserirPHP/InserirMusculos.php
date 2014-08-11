<html>
<head></head>
<body>

<?php
include 'conexao.php';
?>


<?php 
$exe_mus_exe_id=$_POST['exe_mus_exe_id'];
$exe_mus_mus_id = $_POST['exe_mus_mus_id'];




$sql = mysql_query("INSERT INTO exercicios_musculos(exe_mus_exe_id,
									   exe_mus_mus_id) 
											VALUES('$exe_mus_exe_id',
											'$exe_mus_mus_id')");
											
echo("<center>Valores inseridos na tabela exercicios_musculos com sucesso</center>");
header("Location: ../menuTreinador.php");
?>

</body>
</html>