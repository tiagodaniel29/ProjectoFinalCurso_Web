
<?php
include 'conexao.php';
?>
<?PHP
session_start();

//Caso o usuário não esteja autenticado, limpa os dados e redireciona
if (!isset($_SESSION['pes_user']) and ! isset($_SESSION['pes_password'])) {
    //Destrói
    session_destroy();

    //Limpa
    unset($_SESSION['pes_user']);
    unset($_SESSION['pes_password']);

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
		
		
    

    <script type='text/javascript'>
        var copiescounter = 1;
        $(function() {
            $('a#add_copiesto').click(function() {
                copiescounter += 1;
                $('#customcopies').append(
                        '<div>' + ' <table data-role="table" data-mode="columntoggle" class="ui-responsive ui-shadow" data-column-btn-text="Opções" id="myTable"><td><input id="copiestoname_'
                        + copiescounter + '" name="pla_tre_id[]' + '" type="text" placeholder="data" > </td> <td> <input id="pla_cla_id'
                        + copiescounter + '" name="pla_cla_id[]' + '" type="text" placeholder="classificacao" > </td> <td> <input id="pla_exe_id'
                        + copiescounter + '" name="pla_exe_id[]' + '" type="text" placeholder="exercicio" > </td> <td> <input id="pla_tempo'
                        + copiescounter + '" name="pla_tempo[]' + '" type="text" placeholder="tempo" > </td> <td> <input id="pla_numRepeticoes'
                        + copiescounter + '" name="pla_numRepeticoes[]' + '" type="text" placeholder="repeticoes" ></td> <td><a class="remove" href="#">Remove</a> <td></table></div>');
                event.preventDefault();
            });
        });

        $(document).on('click', '.remove', function() {
            var $this = $(this);
            $(this).closest('div').remove();
            event.preventDefault();
        })



    </script>

    <script>
        function showUser(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "getuser2.php?q=" + str, true);

            xmlhttp.send();
        }
    </script>

    <script>
        function showExercicio2(str) {
            if (str == "") {
                document.getElementById("txtHint1").innerHTML = "";
                return;
            }
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("txtHint1").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "getuser3.php?k=" + str, true);

            xmlhttp.send();
        }
    </script>


    <script>
        function mostrarRendimentoPraticante(str) {
            if (str == "") {
                document.getElementById("resultadoRendimentoPraticante").innerHTML = "";
                return;
            }
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("resultadoRendimentoPraticante").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "MostrarRendimentoPorPraticante.php?l=" + str, true);

            xmlhttp.send();
        }
    </script>	
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
      $('#button_inserir').click(function(){
                    $( "#result" ).load( "#page4" );
        return false;
      });
    });
    </script>
    
    
    <script>
      $(document).on("swiperight", function(event,ui){
            $("#myPanel2").panel("open");
      });
      
      $(document).on("swipeleft", function(event,ui){
            $("#myPanel").panel("open");
      });
      </script>
    
        <script type="text/javascript">
            $(document).ready(function() {
                $('#btnAdd').click(function() {
                    var num     = $('.clonedInput').length; // how many "duplicatable" input fields we currently have
                    var newNum  = new Number(num + 1);      // the numeric ID of the new input field being added
     
                    // create the new element via clone(), and manipulate it's ID using newNum value
                    var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);
     
                    // manipulate the name/id values of the input inside the new element
                    newElem.children(':first').attr('id', 'name' + newNum).attr('name', 'name' + newNum);
     
                    // insert the new element after the last "duplicatable" input field
                    $('#input' + num).after(newElem);
     
                    // enable the "remove" button
                    $('#btnDel').attr('disabled','');
     
                    // business rule: you can only add 5 names
                    if (newNum == 5)
                        $('#btnAdd').attr('disabled','disabled');
                });
     
                $('#btnDel').click(function() {
                    var num = $('.clonedInput').length; // how many "duplicatable" input fields we currently have
                    $('#input' + num).remove();     // remove the last element
     
                    // enable the "add" button
                    $('#btnAdd').attr('disabled','');
     
                    // if only one element remains, disable the "remove" button
                    if (num-1 == 1)
                        $('#btnDel').attr('disabled','disabled');
                });
     
                $('#btnDel').attr('disabled','disabled');
            });
        </script>
    --> 	

    <script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>

    <script type="text/javascript">
    //<![CDATA[ 


                var disableField = function() {
                    var state = document.getElementById("repeticao").value.length > 0;
                    document.getElementById("tempo").disabled = state;
                };
    //]]>  

                var disableField2 = function() {
                    var state = document.getElementById("tempo").value.length > 0;
                    document.getElementById("repeticao").disabled = state;
                };


                $(function() {
                    var addDiv = $('#addinput');
                    var i = $('#addinput p').size() + 1;
                    // documentacao do 1.3.1
                    // meter um div com a class
                    $('#addNew').live('click', function() {
                        $('<p class="ui-content"><input type="text" id="pla_tre_id" size="40"  name="pla_tre_id' + i +
                                '"  placeholder="Input  treino" > <input type="text" id="pla_cla_id" size="40" name="pla_cla_id' + i +
                                '"  placeholder="Input novo classificacao" > <input type="text" id="pla_exe_id" size="40"  name="pla_exe_id' + i +
                                '"  placeholder="Input  exercicio" > <input type="text" id="pla_tempo" size="40" name="pla_tempo' + i +
                                '"  onkeyup="disableField2()" placeholder="Input novo tempo" ><input type="text" id="pla_numRepeticoes" size="40" name="pla_numRepeticoes' + i +
                                '"  onkeyup="disableField()"  placeholder="Input novo repeticao" ><a href="#" id="remNew">Remove</a> </p>').appendTo(addDiv);

                        i++;

                        return false;
                    });

                    $('#remNew').live('click', function() {
                        if (i > 1) {
                            $(this).parents('p').remove();
                            i--;
                        }
                        return false;
                    });
                });


    </script>



    <style>
        .ui-block-a, 
        .ui-block-b, 
        .ui-block-c,
        .ui-block-d
        {
            font-weight: bold;
            text-align: center;
        }
		
		#myPanel2{
		 background: url(backgroundblue.jpg);
			background-repeat:repeat-y;
			background-position:center center;
			background-attachment:scroll;
			background-size:100% 100%;
		
		
		}
		#myPanel{
		 background: url(backgroundblue.jpg);
			background-repeat:repeat-y;
			background-position:center center;
			background-attachment:scroll;
			background-size:100% 100%;
		
		
		}
    </style>
    <!--
<script type='text/javascript'>//<![CDATA[  
var disableField = function () {
var state = document.getElementById("repeticoes").value.length > 0;
document.getElementById("tempo").disabled = state;
};
//]]>  
</script>

<script type='text/javascript'>//<![CDATA[  
var disableField2 = function () {
var state = document.getElementById("tempo").value.length > 0;
document.getElementById("repeticoes").disabled = state;
};
//]]>  
</script>

    -->

</head>
<body id="body1">




    <div data-role="page" id="pageone">

        <div data-role="panel" id="myPanel" data-position="right" data-display="overlay" > 
            <h2>Opções</h2>
            <div data-role="collapsible" data-inset="false" data-theme="b">
                <h4>Exercicio</h4>				
                <ul data-role="listview">

                    <li><a href="#page4" data-transition="flip"  data-inline="true" data-theme="c" >Inserir</a></li>
                    <li><a href="#page5" data-transition="flip"  data-inline="true" data-theme="c" >Modificar</a></li>	
                    <li><a href="#page8" data-transition="flip"  data-inline="true" data-theme="c" >Musculos</a></li>	

                </ul>
            </div>
            <p></p>
            <div data-role="collapsible"  data-inset="false" data-theme="b">
                <h4>Treino</h4>				
                <ul data-role="listview">
                    <li><a href="#page9" data-transition="flip"  data-inline="true" data-theme="c" >Inserir</a></li>
                    <li><a href="#">Modificar</a></li>

                </ul>

            </div>
      	
        </div> 

        <div data-role="panel" id="myPanel2" data-position="left" data-display="overlay"> 
            <h3><font color="white">Perfil</font></h3>

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


           
            <a href="#pageAlterarDadosUtilizador2" data-role="button" data-theme="b">Editar Perfil</a>
			<a href="logout.php" data-role="button" data-theme="b">Logout</a>


        </div> 

        <div data-role="header" data-theme="b">
            <a href="#myPanel2" id="b1"><img src="icones/profile-icon.png"  width="18" height="18"></a> 
            <h1>Treinador</h1> 
            <a href="#myPanel" id="b1"> <img src="icones/menu-icon.png"  width="18" height="18"></a>

            <div data-role="navbar" data-iconpos="top" data-theme="a">
                <ul>
                    <li><a href="#page10" data-icon="search" data-theme="e">Historico Treinos</a></li>
                    <li><a href="#rendimento" data-icon="search" data-theme="e">Rendimentos </a></li>
                    <!--<li><a href="#pageseven" data-icon="search" data-theme="e">Procura Exercicios</a></li>-->
					<li><a href="#page30" data-icon="search" data-theme="e">Procura Exercicios</a></li>
                </ul>
            </div>
        </div>

        <div data-role="content"  id="result">
            <?php 
			$user = $_SESSION['pes_user'];
			$sql=" select * from pessoa where pes_user= '$user' ";						
			$rs = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_array($rs) ;
			echo "<h2><center>Bem vindo: " . $row["pes_nome"] . "</center></h2>";
            ?>
        </div>

        <div data-role="footer" data-position="fixed" data-theme="b">
            <h1>Footer Text</h1>
        </div> 

    </div>



    <div data-role="page" id="page4" >



        <div data-role="header" data-theme="b" > 
            <h6>Inserir Exericicio</h6>
            <a href="#pageone" data-role="button" data-icon="delete" data-iconpos="notext"></a>
        </div>	
        <div data-role="content" data-theme="b" >
            <form name="signUp" enctype="multipart/form-data" method="post" action="InserirPHP/inserirExercicio.php">




                <label for="Classificacao">Classificacao:</label>
                <?php
                $sql = "SELECT * FROM classificacao_exercicio";
                $rs = mysql_query($sql) or die(mysql_error());
                echo "<select name='exe_cla_exe_id'>";
                while ($row = mysql_fetch_array($rs)) {
                    echo "<option value='" . $row["cla_exe_id"] . "'>" . $row["cla_exe_nome"] . "</option>";
                }mysql_free_result($rs);
                echo "</select>";
                ?> 	

                <label for="Tipo_exercicio">Tipo Exercicio:</label>
                <?php
                $sql = "SELECT * FROM tipo_exercicio";
                $rs = mysql_query($sql) or die(mysql_error());
                echo "<select name='exe_exe_tipo_id'>";
                while ($row = mysql_fetch_array($rs)) {
                    echo "<option value='" . $row["tipo_exe_id"] . "'>" . $row["tipo_exe_nome"] . "</option>";
                }mysql_free_result($rs);
                echo "</select>";
                ?> 

                <label for="exe_nome">Nome:</label>
                <input type="text" name="exe_nome" id="exe_nome">

                
			
				
				<fieldset data-role="controlgroup" data-type="horizontal">
				  <legend>Dificuldade:</legend>
					<input type="radio" name="exe_dificuldade" id="Facil" value="1"  />
					<label for="Facil">Fácil</label>

					<input type="radio" name="exe_dificuldade" id="Intermedio" value="2"  />
					<label for="Intermedio">Intermédio</label>	
					
					<input type="radio" name="exe_dificuldade" id="Dificil" value="3"  />
					<label for="Dificil">Difícil</label>	
				
				</fieldset>
				
                <label for="exe_imagem">Imagem:</label>

                <input name="exe_imagem" type="file" id="exe_imagem" />

             

                <label for="exe_descricao">Descrição:</label>
                <textarea name="exe_descricao" id="exe_descricao"></textarea>


                <input type="submit" data-inline="true" value="Submit">
                <input type="submit" data-inline="true" value="Reset">
            </form>
        </div>

    </div>

    <div data-role="page" id="page8" >
        <div data-role="content" data-theme="b" >
            <form name="as" method="post" action="InserirPHP/inserirMusculos.php">

                <label for="Musculos">Exercicio:</label>
                <?php
                $sql = "SELECT * FROM exercicios order by exe_nome";
                $rs = mysql_query($sql) or die(mysql_error());
                echo "<select name='exe_mus_exe_id'>";
                while ($row = mysql_fetch_array($rs)) {
                    echo "<option value='" . $row["exe_id"] . "'>" . $row["exe_nome"] . "</option>";
                }mysql_free_result($rs);
                echo "</select>";
                ?> 

                <label for="Musculos">Musculos:</label>
                <?php
                $sql = "SELECT * FROM musculos order by mus_designacao";
                $rs = mysql_query($sql) or die(mysql_error());
                echo "<select name='exe_mus_mus_id'>";
                while ($row = mysql_fetch_array($rs)) {
                    echo "<option value='" . $row["mus_id"] . "'>" . $row["mus_designacao"] . "</option>";
                }mysql_free_result($rs);
                echo "</select>";
                ?> 

                <input type="submit" data-inline="true" value="Submit">
                <input type="submit" data-inline="true" value="Reset">
            </form>
        </div>	
    </div> 


    <div data-role="page" id="page9" >
        <div data-role="header" data-theme="b" >
            <a href="#pageone" data-role="button" data-icon="delete" data-iconpos="notext"></a>
            <h6>Inserir Plano-Treino</h6>


        </div>

        <div data-role="content" data-theme="b"  >

            <form name="as" method="post" action="InserirPHP/inserirTreino.php">
                <label for="tre_pesAutor_id">Data:</label>



                <?php
                $user = $_SESSION['pes_user'];
                $sql = "SELECT * FROM pessoa where pes_user = '$user'  ";
                $rs = mysql_query($sql) or die(mysql_error());

                $row = mysql_fetch_array($rs);
                echo "<input type='hidden' name='tre_pesAutor_id' value='" . $row["pes_id"] . "' " . $row["pes_id"] . "/ readonly>";

                mysql_free_result($rs);
                ?> 
                <input type="date" name="tre_data" id="tre_data">
                <input type="submit" data-inline="true" value="Submit">

            </form>


            <form method="post" action="InserirPHP/InserirPlanoTreino.php">

                <div id="customcopies">


                    <table>
                        <tr>
                            <th><label for="Treino">Data do Treino:</label></th>
                            <th><label for="Classificação">Classificação:</label></th>
                            <th><label for="Treino">Exercicio:</label></th>
                            <th><label for="Treino">Tempo:</label></th>
                            <th><label for="Treino">Repetições:</label></th>
                        </tr>
                        <tr>
                            <td>
<?php
$sql = "SELECT tre_id, tre_data FROM Treino where tre_data >= curdate() order by tre_data;";
$rs = mysql_query($sql) or die(mysql_error());
echo "<select name='pla_tre_id[]' id='pla_tre_id_1'>";
while ($row = mysql_fetch_array($rs)) {
    echo "<option value='" . $row["tre_id"] . "'>". $row["tre_id"] ." ". $row["tre_data"] . "</option>";
}mysql_free_result($rs);
echo "</select>";
?> 
                            </td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM Classsificacao";
                                $rs = mysql_query($sql) or die(mysql_error());
                                echo "<select name='pla_cla_id[]' id='pla_cla_id_1' >";
                                while ($row = mysql_fetch_array($rs)) {
                                    echo "<option value='" . $row["cla_id"] . "'>" . $row["cla_serie"] . "</option>";
                                }mysql_free_result($rs);
                                echo "</select>";
                                ?> 
                            </td>
                            <td>		
                                <?php
                                $sql = "SELECT * FROM exercicios order by exe_nome";
                                $rs = mysql_query($sql) or die(mysql_error());
                                echo "<select name='pla_exe_id[]' id='pla_exe_id_1'>";
                                while ($row = mysql_fetch_array($rs)) {
                                    echo "<option value='" . $row["exe_id"] . "'>" . $row["exe_nome"] . "</option>";
                                }mysql_free_result($rs);
                                echo "</select>";
                                ?> 
                            </td>
                            <td>		

                                <input type="text"  size="40" name="pla_tempo[]" id="pla_tempo_1" />
                            </td>
                            <td>
                                <input type="text" id="copiestorepeticao_1" size="40" name="pla_numRepeticoes[]" />
                            </td>
                        </tr>
                    </table>


                </div>

                <div style="padding-left:40px;">
                    <a id="add_copiesto" data-role="button" data-inline="true" data-mini="true" href="#">Adicionar +1</a>
                </div>

                <input type="submit"  data-inline="true" name="submit_val" value="Submit" />
            </form>




        </div>

        <div data-role="footer" data-position="fixed" data-theme="b">
            <h1>Footer Text</h1>
        </div> 
    </div> 


    <div data-role="page" id="pageseven"  >

        <div data-role="header" data-theme="b">
            <a href="#pageone" data-role="button" data-icon="delete" data-iconpos="notext"></a>
            <h6>Procurar Exercicio</h6>


        </div>

        <div data-role="main" class="ui-content">
            

            	
        </div>
        <div data-role="footer" data-position="fixed" data-theme="b">
            <h1>Footer Text</h1>



        </div>
    </div>



    <div data-role="tabs" id="rendimento">
        <div data-role="header" data-theme="b">
            <a href="#pageone" data-role="button" data-icon="delete" data-iconpos="notext"></a>
            <h6>Rendimentos</h6>
        </div>


        <div data-role="main" class="ui-content">
            <form>
                <label for="proximoTreino"><b>Pesquisa por praticante</b></label>
                <select name="pes_id" onchange="mostrarRendimentoPraticante(this.value)">

                    <option value="">Selecione uma pessoa</option>
<?php
$sql = "select * from pessoa, pessoa_tipo where pes_tipo_id = pes_pes_tipo_id and pes_tipo_designacao = 'Praticante'";
$rs = mysql_query($sql) or die(mysql_error());
while ($row = mysql_fetch_array($rs)) {
    echo "<option value='" . $row["pes_id"] . "'>" . $row["pes_nome"] . "</option>";
}mysql_free_result($rs);
?>	

                </select>
            </form>

            <div id="resultadoRendimentoPraticante">
                <b>Resultado</b>
            </div>	

        </div>

        <div data-role="footer" data-position="fixed" data-theme="b">
            <h1>Footer Text</h1>
        </div>
    </div>   




    <div data-role="page" id="page10">
      <div data-role="header" data-theme="b">
            <a href="#pageone" data-role="button" data-icon="delete" data-iconpos="notext"></a>
            <h6>Historico Treinos</h6>
        </div>
		
		<div data-role="main" class="ui-content">
		
		<?php 
		$user = $_SESSION['pes_user'];
		$sql=" select tre_data from pessoa, treino where tre_pesAutor_id=pes_id and pes_user= '$user' order by tre_data;";						
		$rs = mysql_query($sql) or die(mysql_error());
		
	
		$sql2= " select tre_data,exe_nome from treino,exercicios,plano_treino,pessoa
										WHERE pes_user= '$user'
										and pla_tre_id = tre_id 
										and pla_exe_id = exe_id 
										and tre_pesAutor_id=pes_id";						
		$rs2 = mysql_query($sql2) or die(mysql_error());
		
		
		echo"<div data-role='collapsible'>";
		echo"	  <h1>Os meus treinos</h1>";
		echo "<ul data-role='listview' data-filter='true' data-filter-placeholder='Procura por data' data-inset='true'>";
		while ($row = mysql_fetch_array($rs)) 
			{	
				  
				echo"	  <div data-role='collapsible' data-mini='true'>";	
				echo"		<h1>".$row['tre_data']."</h1>";
				echo"		<p></p>";
						
						
						
				
				echo"	  </div>";	
			}
			
		echo"	</ul>";
		echo"	</div>";
		
		$sql3=" select tre_data from pessoa, treino where tre_pesAutor_id=pes_id and pes_user != '$user' order by tre_data";						
		$rs3 = mysql_query($sql3) or die(mysql_error());
		
	
		
		
		
		echo"<div data-role='collapsible'>";
		echo"	  <h1>Os outros treinos de outros treinadores</h1>";
		echo "<ul data-role='listview' data-filter='true' data-filter-placeholder='Procura por data' data-inset='true'>";
			while ($row3 = mysql_fetch_array($rs3)) {	  
			
				echo"	  <div data-role='collapsible' data-mini='true'>";
				echo"		<h1>".$row3['tre_data']."</h1>";
				
				
					
				
				
				
				
				echo"		<p> </p>";
				echo"	  </div>";
			}
			
		echo"	</ul>";
		echo"	</div>";
			
		?>
	  </div>
	  <div data-role="footer" data-position="fixed" data-theme="b">
            <h1>Footer Text</h1>
      </div>
	  
    </div> 

	
	
	
	
	
	
	
	
	
	

	

    <div data-role="page" id="page30">
      <div data-role="header" data-theme="b">
            <a href="#pageone" data-role="button" data-icon="delete" data-iconpos="notext"></a>
            <h6>Procura Exercicios</h6>
        </div>
		
		<div data-role="main" class="ui-content">
		
		<?php 
		
		$sql=" SELECT  * FROM exercicios, tipo_exercicio Where exe_exe_tipo_id = tipo_exe_id order by exe_nome";						
		$rs = mysql_query($sql) or die(mysql_error());
		
	
		
		
		
		echo"<div data-role='collapsible' data-content-theme='c'>";
		echo"	  <h1>Pesquisa por nome </h1>";
		echo "<ul data-role='listview' data-filter='true' data-filter-placeholder='Insira o nome' data-inset='true'>";
		while ($row = mysql_fetch_array($rs)) 
			{	
				  
				echo"	  <div data-role='collapsible' data-mini='true'>";	
				
				echo"		<h1>".$row['exe_nome']."</h1>";
				
				echo 	    "<table>";
				echo 		"<tr>";
				echo 		"<th>Tipo</th>";
				echo		"<td>"  .$row['tipo_exe_nome']."<td>"  ;
				echo 		"</tr>";
				echo 		"<tr>";
				echo 		"<th>Dificuldade</th>";
				echo		 "<td>".$row['exe_dificuldade']."<td>"  ;
				echo 		"</tr>";
				echo 		"<tr>";
				echo 		"<th>Descrição</th>";
				echo		"<td>" .$row['exe_descricao']. "<td>" ; 
				echo 		"</tr>";
				

				
				echo 		"<tr>";
				
				echo 		"<th>Imagem</th>";
				
			    echo		"<td>";
			    echo '<img height="100" width="200" src="data:image/jpeg;base64,' . base64_encode($row['exe_imagem']) . '" />'   ;
			    echo		"</td>";
						
				echo 		"</tr>";
				echo 	    "</table>";
				echo"	  </div>";	
			}
			
		echo"	</ul>";
		echo"	</div>";
		
		$sql3=" select tre_data from pessoa, treino where tre_pesAutor_id=pes_id and pes_user != '$user' order by tre_data";						
		$rs3 = mysql_query($sql3) or die(mysql_error());
		
	
		
		
		

			
		?>
		
		
		
		<div data-role='collapsible' data-content-theme="c" >
		<h1>Pesquisa por musculos</h1>
		<form>
            
                <select name="users" onchange="showUser(this.value)">

                <option value="">Musculo</option>
				<?php
				$sql = "select * from musculos;";
				$rs = mysql_query($sql) or die(mysql_error());
				while ($row = mysql_fetch_array($rs)) {
					echo "<option value='" . $row["mus_id"] . "'>" . $row["mus_designacao"] . "</option>";
				}mysql_free_result($rs);
				?>	

                </select>
         </form>

         <div id="txtHint">
            <b>Resultado</b>
         </div>	
                
                
          </div>  	
	  </div>
	  <div data-role="footer" data-position="fixed" data-theme="b">
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
