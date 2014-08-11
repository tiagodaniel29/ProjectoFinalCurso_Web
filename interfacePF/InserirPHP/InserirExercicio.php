<html>
<head></head>
<body>

<?php
include 'conexao.php';
?>


<?php 
$exe_cla_exe_id=$_POST['exe_cla_exe_id'];
$exe_exe_tipo_id = $_POST['exe_exe_tipo_id'];
$exe_nome=$_POST['exe_nome'];
$exe_dificuldade=$_POST['exe_dificuldade'];
$exe_imagem=$_POST['exe_imagem'];
//$exe_imagem =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
//$exe_imagem = file_get_contents($_FILES['image']['tmp_name']);
$exe_descricao=$_POST['exe_exe_tipo_id'];

$sql = mysql_query("INSERT INTO exercicios(exe_cla_exe_id,
									   exe_exe_tipo_id,
									   exe_nome,
									   exe_dificuldade,
									   exe_imagem,
									   exe_descricao) 
											VALUES('$exe_cla_exe_id',
											'$exe_exe_tipo_id',
											'$exe_nome',
											'$exe_dificuldade',
											'$exe_imagem',
											'$exe_descricao')");
											
echo("<center>Valores inseridos na tabela exercicios com sucesso</center>");
header("Location: ../menuTreinador.php");
?>

</body>
</html>