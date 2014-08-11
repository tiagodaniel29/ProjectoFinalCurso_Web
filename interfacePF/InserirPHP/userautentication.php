<?php
include 'conexao.php';
?>
<html>
<head>



</head>
<body>

<?php 
$pes_id=$_POST['pes_id'];
$pes_user=$_POST['pes_user'];
$pes_password=$_POST['pes_password'];
$pes_pes_tipo_id = $_POST['pes_pes_tipo_id'];



$sql = mysql_query("Select * from pessoa where pes_user = '$pes_user' 
and pes_password = '$pes_password' 
and pes_pes_tipo_id = '3' 
and pes_estado = '1' ; ") or die (mysql_error());


$sql_1 = mysql_query("Select * from pessoa where pes_user = '$pes_user' 
and pes_password = '$pes_password' and pes_pes_tipo_id = '2' and pes_estado = '1' ;") or die (mysql_error());

$sql_2 = mysql_query("Select * from pessoa where pes_user = '$pes_user' 
and pes_password = '$pes_password' and pes_pes_tipo_id = '1' and pes_estado = '1' ;") or die (mysql_error());


$row = mysql_num_rows($sql);
$row_1 = mysql_num_rows($sql_1);
$row_2 = mysql_num_rows($sql_2);

if ($row > 0){
	session_start();
	$_SESSION['pes_id']=$_POST['pes_id'];
	$_SESSION['pes_user']=$_POST['pes_user'];
	$_SESSION['pes_user']=$_POST['pes_user'];
	$_SESSION['pes_password']=$_POST['pes_password'];
	header("Location:menuTreinador.php");
}
else if($row_1 > 0){
	session_start();
	$_SESSION['pes_user']=$_POST['pes_user'];
	$_SESSION['pes_password']=$_POST['pes_password'];
	header("Location:menuPraticante.php");
} 
else if($row_2 > 0){
	session_start();
	$_SESSION['pes_user']=$_POST['pes_user'];
	$_SESSION['pes_password']=$_POST['pes_password'];
	header("Location:menuAdministrador.php");

} 
else{
	echo "Nome ou senha invalidos";
	header("Location:login.php");
}



?>
</body>
</html>