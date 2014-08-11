<html>
<head>



</head>
<body>

<?php
include 'conexao.php';
?>


<?php 
$pes_foto = file_get_contents($_FILES['image']['tmp_name']);
//$pes_foto=$_POST['pes_foto'];
$pes_nome=$_POST['pes_nome'];
$pes_pes_tipo_id = $_POST['pes_pes_tipo_id'];
$pes_dnsc=$_POST['pes_dnsc'];
$pes_sexo=$_POST['pes_sexo'];
$pes_user=$_POST['pes_user'];
$pes_password=$_POST['pes_password'];

$pes_nivel=$_POST['pes_nivel'];
$pes_limitacao=$_POST['pes_limitacao'];


$sql = mysql_query("INSERT INTO pessoa(pes_foto,pes_nome,
									   pes_pes_tipo_id,
									   pes_dnsc,
									   pes_sexo,
									   pes_user,
									   pes_password,
									   pes_nivel,
									   pes_limitacao) 
											VALUES('$pes_foto','$pes_nome',
											'$pes_pes_tipo_id',
											'$pes_dnsc',
											'$pes_sexo',
											'$pes_user',
											'$pes_password',
											'$pes_nivel',
											'$pes_limitacao')");
											
header("Location: ../login.php");
	
?>
	
</body>
</html>