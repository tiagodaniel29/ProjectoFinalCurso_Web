
<?php




define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'projf');
$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


if($_POST['action']=="password")
{
    $email      = mysqli_real_escape_string($connection,$_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
    {
        $message =  "Invalid email address please type a valid email!!";
    }
    else
    {
        $query = "SELECT * FROM pessoa where pes_user='".$email."'";
        $result = mysqli_query($connection,$query);
        $Results = mysqli_fetch_array($result);
 
        if(count($Results)>=1)
        {
            $encrypt = md5(1290*3+$Results['pes_id']);
            $message = "Your password reset link send to your e-mail address.";
            $to=$email;
            $subject="Forget Password";
            $from = 'info@phpgang.com';
            
            $headers = "From: " . strip_tags($from) . "\r\n";
            $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
 
            mail($to,$subject,$body,$headers);
        }
        else
        {
            $message = "Account not found please signup now!!";
        }
    }
}















 /*
mysql_connect{"localhost","root","",} or die(mysql_error());

mysql_select_db("projf") or die(mysql_error());
	$email = $_POST['email'];
	$sql = mysql_query("select * from pessoa where pes_user = '$email' ;") or die ("erro");
	$p = mysql_num_rows($sql);
	
	if ($p > 0){
	
	$resultado = mysql_fetch_assoc($sql);
	
	$nome = $resultado["pes_nome"];
	$email = $resultado["pes_user"];
	$senha = $resultado["pes_password"];
	
		$destinatario = $email;
		$assunto = "Recuperação de Senha mobileGYManager";
		$corpo = "Recuperar dados: \n..";
		$corpo .= "O seu login =" . $email . "\n..";
		$corpo .= "Senha de acesso =" . $senha . "\n..";
		$corpo .= "Não responder a este email. Email automático";
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= "From: mobileGYManager";
		$headers .= "X-Priority:1\n..";
		
		if(mail($destinatario,$assunto,$corpo,$headers)){
		
			echo "Email enviado com sucesso";
		
		}
		else{
		
			echo "Email não enviado.";
		}
		
	
	
	}
	else{
	
		echo "Não existe esse email na base de dados";
	}
	*/
	?>