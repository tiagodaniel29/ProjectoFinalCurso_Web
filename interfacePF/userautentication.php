<?PHP
// as variáveis pes_user e senha recebem os dados digitados na página anterior
$pes_user = $_POST['pes_user'];
$pes_password = $_POST['pes_password'];

$host = "localhost";
$user = "root";
$pass = "";
$banco = "projf";

$conexao = mysql_connect($host,$user,$pass) or die (mysql_error());
mysql_select_db($banco) or die(mysql_error());


//Comando SQL de verificação de autenticação
$sql = "SELECT *
FROM pessoa
WHERE pes_user = '$pes_user'
AND pes_password = '$pes_password'
AND pes_pes_tipo_id = '3' 
AND pes_estado = '1' "  ;

$sql_1 = "SELECT *
FROM pessoa
WHERE pes_user = '$pes_user'
AND pes_password = '$pes_password'
AND pes_pes_tipo_id = '2' 
AND pes_estado = '1' "  ;

$sql_2 = "SELECT *
FROM pessoa
WHERE pes_user = '$pes_user'
AND pes_password = '$pes_password'
AND pes_pes_tipo_id = '1' 
AND pes_estado = '1' "  ;
 
$resultado = mysql_query($sql,$conexao) or die ("Erro na seleção da tabela.");
$resultado_1 = mysql_query($sql_1,$conexao) or die ("Erro na seleção da tabela.");
$resultado_2 = mysql_query($sql_2,$conexao) or die ("Erro na seleção da tabela.");
 
//Caso consiga logar cria a sessão
if (mysql_num_rows ($resultado) > 0) {
    // session_start inicia a sessão
    session_start();
    $_SESSION['pes_user'] = $pes_user;
    $_SESSION['pes_password'] = $pes_password;
	header('location:menuTreinador.php');

}
 
else if(mysql_num_rows ($resultado_1) > 0){
    // session_start inicia a sessão
    session_start();
    $_SESSION['pes_user'] = $pes_user;
    $_SESSION['pes_password'] = $pes_password;
	header('location:menuPraticante.php');
}
 
else if(mysql_num_rows ($resultado_2) > 0){
    // session_start inicia a sessão
    session_start();
    $_SESSION['pes_user'] = $pes_user;
    $_SESSION['pes_password'] = $pes_password;
	header('location:menuAdministrador.php');
} 
 
//Caso contrário redireciona para a página de autenticação
else {
    //Destrói
    session_destroy();
 
    //Limpa
    unset ($_SESSION['pes_user']);
    unset ($_SESSION['pes_password']);
 
    //Redireciona para a página de autenticação
    header('location:login.php');

    
}
?>