<?php 

	include 'conexao.php';
	
?>
<?PHP
session_start();
 
//Caso o usuário não esteja autenticado, limpa os dados e redireciona
if ( !isset($_SESSION['pes_user']) and !isset($_SESSION['pes_password']) ) {
    //Destrói
    session_destroy();
 
    //Limpa
    unset ($_SESSION['pes_user']);
    unset ($_SESSION['pes_password']);
     
    //Redireciona para a página de autenticação
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
       <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>

	
<!--
	<script type='text/javascript'>
	$(window).load(function(){
	$(function() {
		$("#button_inserir").click(function() {
			$('#result').load('InserirExercicio.html #divTeste');
		});
	});
	});
	</script>

  <script>
	$(document).bind('pageload',function(evt,data){ 
		 $(document).unbind('pageload');  
		 $(data.page).fadeIn(); 
	});
	$.mobile.loadPage('teste.html',{'pageContainer':$('#result')});

 </script>


 

<script>
function ola()
{
$( "#result" ).load( "InserirExercicio.html #pagethree" );
}
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 


<script>
$(document).ready(function(){
  $('#relogio_crono').click(function(){
		$( "#footerCustumize" ).load( "cronometro.html" );
    return false;
  });
});
</script>
-->

<script>
  $(document).on("swiperight", function(event,ui){
	$("#myPanel2").panel("open");
  });
  
  $(document).on("swipeleft", function(event,ui){
	$("#myPanel").panel("open");
  });
  </script>
  
 <script type="text/javascript">
//<![CDATA[ 

    
var disableField = function () {
  var state = document.getElementById("repeticao").value.length > 0;
  document.getElementById("tempo").disabled = state;
};
//]]>  

var disableField2 = function () {
  var state = document.getElementById("tempo").value.length > 0;
  document.getElementById("repeticao").disabled = state;
};


$(function() {
        var addDiv = $('#addinput');
        var i = $('#addinput p').size() + 1;
        
        $('#addNew').live('click', function() {
                $('<p><input type="text" id="exercicio" size="40" name="exercicio' + i + 
				'" value="" placeholder="Input novo exercicio" /> <input type="text" id="classificacao" size="40" name="classificacao' + i +
				'" value="" placeholder="Input novo classificacao" /> <input type="text" id="tempo" size="40" name="tempo' + i +
				'" value="" onkeyup="disableField2()" placeholder="Input novo tempo" /><input type="text" id="repeticao" size="40" name="repeticao' + i +
				'" value="" disableField2();  placeholder="Input novo repeticao" /><a href="#" id="remNew">Remove</a> </p>').appendTo(addDiv);

                i++;

                return false;
        });
        
        $('#remNew').live('click', function() { 
                if( i > 1 ) {
                        $(this).parents('p').remove();
                        i--;
                }
                return false;
        });
});


</script>
	
	





	<style>
#headerCustumize, #footerCustumize{background: rgb(203,96,179); /* Old browsers */
background: -moz-linear-gradient(top, rgba(203,96,179,1) 0%, rgba(193,70,161,1) 49%, rgba(168,0,119,1) 99%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(203,96,179,1)), color-stop(49%,rgba(193,70,161,1)), color-stop(99%,rgba(168,0,119,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(203,96,179,1) 0%,rgba(193,70,161,1) 49%,rgba(168,0,119,1) 99%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(203,96,179,1) 0%,rgba(193,70,161,1) 49%,rgba(168,0,119,1) 99%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(203,96,179,1) 0%,rgba(193,70,161,1) 49%,rgba(168,0,119,1) 99%); /* IE10+ */
background: linear-gradient(to bottom, rgba(203,96,179,1) 0%,rgba(193,70,161,1) 49%,rgba(168,0,119,1) 99%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cb60b3', endColorstr='#a80077',GradientType=0 ); /* IE6-9 */
}


#b1{
background: rgb(245,246,246); /* Old browsers */
background: -moz-linear-gradient(top, rgba(245,246,246,1) 0%, rgba(219,220,226,1) 21%, rgba(184,186,198,1) 99%, rgba(221,223,227,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(245,246,246,1)), color-stop(21%,rgba(219,220,226,1)), color-stop(99%,rgba(184,186,198,1)), color-stop(100%,rgba(221,223,227,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(245,246,246,1) 0%,rgba(219,220,226,1) 21%,rgba(184,186,198,1) 99%,rgba(221,223,227,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(245,246,246,1) 0%,rgba(219,220,226,1) 21%,rgba(184,186,198,1) 99%,rgba(221,223,227,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(245,246,246,1) 0%,rgba(219,220,226,1) 21%,rgba(184,186,198,1) 99%,rgba(221,223,227,1) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(245,246,246,1) 0%,rgba(219,220,226,1) 21%,rgba(184,186,198,1) 99%,rgba(221,223,227,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f5f6f6', endColorstr='#dddfe3',GradientType=0 ); /* IE6-9 */

}

#myTable{
position:absolute;
align:center;
}

#myTable2 {
    
    border:0px solid #000;
    
	text-align:center;

}

		#myPanel2{
		 background: url(backgroundmagenta.jpg);
			background-repeat:repeat-y;
			background-position:center center;
			background-attachment:scroll;
			background-size:100% 100%;
		
		
		}
		#myPanel{
		 background: url(backgroundmagenta.jpg);
			background-repeat:repeat-y;
			background-position:center center;
			background-attachment:scroll;
			background-size:100% 100%;
		
		
		}
	</style>
	
	
</head>
<body id="body1">




<div data-role="page" id="pageone">

   
 

  <div data-role="header" data-theme="b" id="headerCustumize">
  <a href="#myPanel2" id="b1"><img src="icones/profile-icon.png"  width="18" height="18"></a> 
	<h1>Administrador</h1> 
   
	
	
	<div data-role="navbar" data-iconpos="top" data-theme="a">
		<ul>
		  <li><a href="#pagevalidarAcessos" data-icon="search" data-theme="e">Validar Acessos</a></li>
		  <li><a href="#page8" data-icon="search" data-theme="e">Vizualizar Todos</a></li>

		  
		</ul>
	</div>
  </div>
  
  <div data-role="panel" id="myPanel2" data-position="left" data-display="overlay"> 
    <h2>Perfil</h2>
 
            <?php
            $user = $_SESSION['pes_user'];
            $sql = "SELECT * FROM pessoa where pes_user = '$user'  ";
            $rs = mysql_query($sql) or die(mysql_error());

            $row = mysql_fetch_array($rs);

            echo "<table>";
			echo "<tr>";
            echo "<td>";
			echo '<img height="100" width="100" src="data:image/jpeg;base64,' . base64_encode($row['pes_foto']) . '" />'   ;
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Nome<th>";
            echo "<td>" . $row["pes_nome"] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Idade<th>";
            echo "<td>" . $row["pes_dnsc"] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Sexo<th>";
            echo "<td>" . $row["pes_sexo"] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>User<th>";
            echo "<td>" . $row["pes_user"] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Nivel<th>";
            echo "<td>" . $row["pes_nivel"] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Limitações<th>";
            echo "<td>" . $row["pes_limitacao"] . "</td>";
            echo "</tr>";

            echo "</table>";
            mysql_free_result($rs);
            ?> 
		 <a href="#pageAlterarDadosUtilizador2" data-role="button">Editar Perfil</a>
		<a href="logout.php" data-role="button">Logout</a>
  </div> 
  <div data-role="content"  id="result">
	<center><?php 
			$user = $_SESSION['pes_user'];
			$sql=" select * from pessoa where pes_user= '$user' ";						
			$rs = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_array($rs) ;
			echo "<h2><center>Bem vindo: " . $row["pes_nome"] . "</center></h2>";
            ?>
			
			
                <div data-role="collapsible" data-theme="b" data-content-theme="d" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u">
                    <h1>Ultimos utilizadores inscritos</h1> 


                    <?php
                    $sql = "select * from pessoa order by pes_id DESC limit 5;";

                    $rs = mysql_query($sql) or die(mysql_error());


                    echo "<table >";
                    echo "<tr>";


                    echo "	<th>Foto</th>";
                    echo "	<th>Nome</th>";
					 echo "	<th>Sexo</th>";
                    echo "	<th>Data Nascimento</th>";
					echo "	<th>User</th>";
					echo "	<th>Password</th>";
					echo "	<th>Nivel</th>";
					echo "	<th>Limitação</th>";
                    echo "</tr>";


                    while ($row = mysql_fetch_array($rs)) {
                        echo "<tr>";
						echo "<td>";
						echo '<img height="50" width="50" src="data:image/jpeg;base64,' . base64_encode($row['pes_foto']) . '" />'   ;
                        echo "</td>";
						echo "<td>" . $row['pes_nome'] . "</td>";
						echo "<td>" . $row['pes_sexo'] . "</td>";
						 echo "<td>" . $row['pes_dnsc'] . "</td>";
						  echo "<td>" . $row['pes_user'] . "</td>";
						   echo "<td>" . $row['pes_password'] . "</td>";
						    echo "<td>" . $row['pes_nivel'] . "</td>";
                        echo "<td>" . $row['pes_limitacao'] . "</td>";

                        echo "</tr>";
                    }
                    echo "</table>";


                    mysql_free_result($rs);
                    ?>
                    </center>
                </div>			
			
			
			
	</center>

	
	
  </div>

  <div data-role="footer" data-position="fixed" data-theme="b" id="footerCustumize">
    <h1>Footer Text</h1>
  </div> 
  
</div>


 
<div data-role="page" id="page8">
	  <div data-role="header" data-theme="b" id="headerCustumize">
		<a href="#pageone" data-role="button" data-icon="delete" data-iconpos="notext"></a>
		<h1>Administrador</h1> 
	  </div>

  
  

  <div data-role="content"  id="result">
		
			<?php
					
					$sql = "SELECT * FROM pessoa,pessoa_tipo Where pes_pes_tipo_id = pes_tipo_id   ";
					$rs = mysql_query($sql) or die(mysql_error());
					
					$row = mysql_fetch_array($rs);
			?>
					<table data-role='table' data-mode='columntoggle' class='ui-responsive ui-shadow' data-column-btn-text='Opções' id='myTable'>
					<tr>
					
					<th>Nome</th>
					<th>Função</th>
					<th>Idade</th>
					<th>Sexo</th>
					<th>User</th>
					<th>Password</th>
					<th>Estado</th>
					<th>Nivel</th>
					<th>Limitações</th>
					</tr>
			<?php		
					while($row = mysql_fetch_array($rs)){

					echo "<tr>";
					echo "<td>" . $row["pes_nome"] . "</td>";
					echo "<td>" . $row["pes_tipo_designacao"] . "</td>";
					echo "<td>" . $row["pes_dnsc"] . "</td>";	
					echo "<td>" . $row["pes_sexo"] . "</td>";
					echo "<td>" . $row["pes_user"] . "</td>";
					echo "<td>" . $row["pes_password"] . "</td>";			
					echo "<td>" . $row["pes_estado"] . "</td>";
					echo "<td>" . $row["pes_nivel"] . "</td>";
					echo "<td>" . $row["pes_limitacao"] . "</td>";
					}
					echo "</tr>";	
					echo "</table>";
					mysql_free_result($rs);
					
			?> 
		
		
		
  </div>

  <div data-role="footer" data-position="fixed" data-theme="b" id="footerCustumize">
    <h1>Footer Text</h1>
  </div> 
 </div>

	
   <div data-role="page" id="pagevalidarAcessos">
	  <div data-role="header" data-theme="b" id="headerCustumize">
		<a href="#pageone" data-role="button" data-icon="delete" data-iconpos="notext"></a>
		<h1>Administrador</h1> 
	  </div>

	<div data-role="content"  id="result">
		
				<?php
		
				$sql = "SELECT * FROM pessoa,pessoa_tipo where pes_pes_tipo_id = pes_tipo_id ORDER BY pes_nome";
				 
				$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
				 
				$i = 0;
				
				echo "<form name='form_update' method='post' action='InserirPHP/AlterarAcessoLoginAdmin.php'>\n";
				
				
				echo "<ul data-role='listview' data-filter='true' data-filter-placeholder='Procura por data' data-inset='true'>";
				while ($pessoas = mysql_fetch_array($result)) {
				echo"<div data-role='collapsible' data-mini='true'>";
				echo"<h1>{$pessoas['pes_nome']} <br> {$pessoas['pes_dnsc']}</h1>";
				echo 	    "<table>";
				
				echo 		"<tr>";
				echo 		"<th>Função: </th>";
				echo "<td>{$pessoas['pes_tipo_designacao']}<input type='hidden' name='pes_id[$i]' value='{$pessoas['pes_id']}' /></td>";
				echo 		"</tr>";

				echo 		"<tr>";
				echo 		"<th>Nome: </th>";
				echo "<td><input type='text' size='15' name='pes_nome[$i]' value='{$pessoas['pes_nome']}' /></td>";
				echo 		"</tr>";
				
				echo 		"<tr>";
				echo 		"<th>Data Nascimento: </th>";
				echo "<td><input type='date' size='15' name='pes_dnsc[$i]' value='{$pessoas['pes_dnsc']}' /></td>";
				echo 		"</tr>";
				
				echo 		"<tr>";
				echo 		"<th>User: </th>";
				echo "<td><input type='text' size='15' name='pes_user[$i]' value='{$pessoas['pes_user']}' /></td>";
				echo 		"</tr>";
				
				echo 		"<tr>";
				echo 		"<th>User: </th>";
				echo "<td><input type='text' size='15' name='pes_password[$i]' value='{$pessoas['pes_password']}' /></td>";
				echo 		"</tr>";
				
				echo 		"<tr>";
				echo 		"<th>Nivel: </th>";
				echo "<td><input type='text' size='5' name='pes_nivel[$i]' value='{$pessoas['pes_nivel']}' /></td>";
				echo 		"</tr>";	
					

				echo 		"<tr>";
				echo 		"<th>Estado Login: </th>";
				echo "<td><input type='text' size='5' name='pes_estado[$i]' value='{$pessoas['pes_estado']}' /></td>";
				echo 		"</tr>";
					
					
				echo 		"<tr>";
				echo 		"<th>Limitação: </th>";
				echo "<td><input type='text' size='5' name='pes_limitacao[$i]' value='{$pessoas['pes_limitacao']}' /></td>";
				echo 		"</tr>";
					echo 	    "</table>";
					++$i;
					
					echo"</div>";  
				}
				
				echo"</ul>";
				echo "<input type='submit' value='submit' />";
				
				
				
				
				
				
				echo "</form>";
				?>
							
		
		
		
	</div>

  <div data-role="footer" data-position="fixed" data-theme="b" id="footerCustumize">
    <h1>Footer Text</h1>
  </div> 
 </div>
	
   
   

    <div data-role="page" id="pageAlterarDadosUtilizador2">
      <div data-role="header" data-theme="b">
            <a href="#pageone" data-role="button" data-icon="delete" data-iconpos="notext"></a>
            <h6>alterar dados 2</h6>
        </div>
		
		<div data-role="main" class="ui-content">

						<?php
		
				$user = $_SESSION['pes_user'];
				$sql = "SELECT * FROM pessoa where pes_user = '$user'  ";
				$result = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());
				 
				$i = 0;
				
				echo "<form name='form_update' method='post' action='InserirPHP/AlterarDadosUtilizador2.php'>\n";
				
				
				
				while ($pessoas = mysql_fetch_array($result)) {
				
				
				echo "<input type='hidden' name='pes_id[$i]' value='{$pessoas['pes_id']}' />";

				echo "<input type='text' size='5' name='pes_nome[$i]' value='{$pessoas['pes_nome']}' />";
				
				echo"<label for='pes_dnsc'>Data Nascimento:</label>";
                echo"<input type='date' data-theme='a' data-clear-btn='true' value='{$pessoas['pes_dnsc']}' name='pes_dnsc[$i]' id='pes_dnsc' ><p>";

      //          echo"<fieldset data-role='controlgroup'>";
      //          echo"    <legend>Sexo:</legend>";
       //         echo"    <input type='radio' name='pes_sexo' id='Feminino' value='F'  />";
        //        echo"    <label for='Feminino'>F</label>";

          //      echo"    <input type='radio' name='pes_sexo' id='Masculino' value='M'  />";
            //    echo"    <label for='Masculino'>M</label>	";
              //  echo"</fieldset>";

                echo"<label for='pes_user'>E-mail:</label>";
                echo"<input type='email' name='pes_user[$i]' id='pes_user' value='{$pessoas['pes_user']}' placeholder='123@hotmail.com'>";

                echo"<label for='pes_password'>Password:</label>";
                echo"<input type='password' name='pes_password[$i]' value='{$pessoas['pes_password']}' id='pes_password' >";


                echo"<label for='pes_nivel'>Nivel:</label>";
                echo"<input type='text' name='pes_nivel[$i]' value='{$pessoas['pes_nivel']}' id='pes_nivel'>";

                echo"<label for='pes_limitacao'>Limitação:</label>";
                echo"<input type='text' name='pes_limitacao[$i]' value='{$pessoas['pes_limitacao']}' id='pes_limitacao'>";
					++$i;
					
					 
				}
				
				
				echo "<input type='submit' value='submit' />";
				
				
				
				
				
				
				echo "</form>";
				?>
                
          </div>  	
	  </div>
	  <div data-role="footer" data-position="fixed" data-theme="b">
            <h1>Footer Text</h1>
      </div>
	  
    </div> 
 
  




</body>
</html>


