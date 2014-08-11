<html>
<head></head>
<body>

<?php
include 'conexao.php';
?>


<?php 
$tre_pesAutor_id=$_POST['tre_pesAutor_id'];
$tre_data = $_POST['tre_data'];



$sql = mysql_query("INSERT INTO treino(tre_pesAutor_id,
									   tre_data) 
											VALUES('$tre_pesAutor_id',
											'$tre_data')");
											
echo("<center>Valores inseridos na tabela treino com sucesso</center>");
header("Location: ../menuTreinador.php");

?>

</body>
</html>