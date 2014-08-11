<?php
include 'conexao.php';
?>

<!DOCTYPE html>
<html>
<head>

	<title>mobileGYManager</title> 
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	
	
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

	<link rel="stylesheet" type="text/css" href="formatacao.css" />
</head>
<body id="body1">

<div data-role="page" id="page1">
    <div data-role="header"   data-theme="b">
        <h6>Bem-Vindo</h6>
    </div>
    <div data-role="content" >
        
        <center><p><a href="#page2" data-transition="flip" data-role="button" data-inline="true" data-theme="c" data-rel="dialog">Login</a></p> </center>	
		<center><p><a href="#page3" data-transition="flip" data-role="button" data-inline="true" data-theme="c" data-rel="dialog">Inscrever-se</a></p> </center>	
    </div>
    <div data-role="footer" data-position="fixed" >
        <h2>PFC - EB/SIS - 090248118 - Tiago Silva</h2>
    </div>
</div>


<div data-role="page" id="page2" >
    <div data-role="header" data-theme="b" >
       
        <h6>Login</h6>
        <a href="#page1" data-role="button" data-icon="delete">Back</a>
    </div>
	
    <div data-role="content" data-theme="b" >
	
		<form name="loginform" method="post" action="userautentication.php" target="_blank">
			
			<label for="pes_user">E-mail:</label>
			<input type="email" name="pes_user" id="pes_user">
			<label for="pes_password">Password:</label>
			<input type="password" name="pes_password" id="pes_password" >

			<input type="submit" value="submit" data-inline="true"  >
			<input type="reset" value="reset"  data-inline="true" >
			<p/>
			<a href="#pagerecuperacaoSenha" data-transition="flip"  data-theme="c" data-rel="dialog"><br>Esqueceste-te da tua palavra-passe?</br></a>
			
		</form>
	
	
	</div>

</div>


<div data-role="page" id="page3" >
    <div data-role="header" data-theme="b">
       
        <h6>Inscrição</h6>
        <a href="#page1" data-role="button" data-icon="delete">Back</a>
    </div>

	
		<div data-role="content"  >
			<form name="signUp" method="post" action="InserirPHP/inserirPessoa.php"> 
			
			    <label for="pes_foto">Foto:</label>
                <input name="pes_foto" type="file" id="pes_foto" />
				
				<label for="pes_nome">Nome:</label>
				<input type="text" name="pes_nome" id="pes_nome">
				
				<?php
				
					$sql = "SELECT * FROM pessoa_tipo";
					$rs = mysql_query($sql) or die(mysql_error());
					echo "<select name='pes_pes_tipo_id'>";
					while($row = mysql_fetch_array($rs)){
					echo "<option value='".$row["pes_tipo_id"]."'>".$row["pes_tipo_designacao"]."</option>";
					}mysql_free_result($rs);
					echo "</select>";
				?> 
				
				
				<label for="pes_dnsc">Data Nascimento:</label>
				<input type="date" data-theme="a" data-clear-btn="true" name="pes_dnsc" id="pes_dnsc" ><p>
				
				<fieldset data-role="controlgroup">
				  <legend>Sexo:</legend>
					<input type="radio" name="pes_sexo" id="Feminino" value="F"  />
					<label for="Feminino">F</label>

					<input type="radio" name="pes_sexo" id="Masculino" value="M"  />
					<label for="Masculino">M</label>	
				</fieldset>
				  
				<label for="pes_user">E-mail:</label>
				<input type="email" name="pes_user" id="pes_user" placeholder="123@hotmail.com">
				
				<label for="pes_password">Password:</label>
				<input type="password" name="pes_password" id="pes_password" >
			

				
				<input type="hidden" name="pes_nivel" id="pes_nivel" value=1>
				
				<label for="pes_limitacao">Limitação:</label>
				<input type="text" name="pes_limitacao" id="pes_limitacao">
				
				<input type="submit" value="submit" data-inline="true"  >
				<input type="reset" value="reset"  data-inline="true" >
			
			</form>
			
			

		</div>
		
		

	
</div>

<div data-role="page" id="pagerecuperacaoSenha" >
    <div data-role="header" data-theme="b">
       
        <h6>Recuperar Senha</h6>
        <a href="#page1" data-role="button" data-icon="delete">Back</a>
    </div>

	
		<div data-role="content"  >

			
			<form action="recuperarSenha.php" method="post" id="passwd" style="">
				<p><input id="email" name="email" type="text" placeholder="Email to get Password"></p>
				<input name="action" type="hidden" value="password"><p></p>
				<p><input type="submit" value="Reset Password"></p>
			  </form>

		</div>
		
		

	
</div>

</body>
</html>