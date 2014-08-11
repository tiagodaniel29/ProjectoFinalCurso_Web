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
        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>

        <!-- 	
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.css" />
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.js"></script>
       


        <script type="text/javascript" src="res/jquery.min.js"></script>
        <script type="text/javascript" src="jquery.timer.js"></script>
        <script type="text/javascript" src="res/demo.js"></script>
 -->	



        <!--	
        <link href="jqeasypanel.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript" src="jquery.jqEasyPanel.min.js"></script>
        
         
                <link rel="stylesheet" type="text/css" href="http://code.jquery.com/mobile/latest/jquery.mobile.min.css" />
                <link rel="stylesheet" type="text/css" href="http://dev.jtsage.com/cdn/datebox/latest/jqm-datebox.min.css" /> 
        
                <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script> 
                <script type="text/javascript" src="http://code.jquery.com/mobile/latest/jquery.mobile.min.js"></script>
        
                <script type="text/javascript" src="http://dev.jtsage.com/cdn/datebox/latest/jqm-datebox.core.min.js"></script>
                <script type="text/javascript" src="http://dev.jtsage.com/cdn/datebox/latest/jqm-datebox.mode.calbox.min.js"></script>
                <script type="text/javascript" src="http://dev.jtsage.com/cdn/datebox/i18n/jquery.mobile.datebox.i18n.en_US.utf8.js"></script>
        --> 






        <script type='text/javascript'>
            var copiescounter = 1;
            $(function() {
                $('a#add_copiesto').click(function() {
                    copiescounter += 1;
                    $('#customcopies').append(
                            '<div>' + ' <table data-role="table" data-mode="columntoggle" class="ui-responsive ui-shadow" data-column-btn-text="Opções" id="myTable"><td><input id="copiestoname_'
                            + copiescounter + '" name="med_pes_id[]' + '" type="text" placeholder="pessoa" > </td> <td> <input id="pla_cla_id'
                            + copiescounter + '" name="med_med_tipo_id[]' + '" type="text" placeholder="tipoMedicao" > </td> <td> <input id="pla_exe_id'
                            + copiescounter + '" name="med_tre_id[]' + '" type="text" placeholder="treino" > </td> <td> <input id="pla_tempo'
                            + copiescounter + '" name="med_valor[]' + '" type="text" placeholder="valor" > </td> <td> <input id="pla_numRepeticoes'
                            + copiescounter + '" name="med_data[]' + '" type="text" placeholder="data" ></td> <td><a class="remove" href="#">Remove</a> <td></table></div>');
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
            $(function() {
                // load up the results initially with AJAX call
                // see http://api.jquery.com/load/
                $('#ajax_results').load('process_form.php');

                //make AJAX GET calls as user types..
                $('#tre_data').keydown(function() {

                    var nme = $(this).val().trim();
                    $('#ajax_results').load('process_form.php?tre_data=' + nme);
                });



            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#jqeasypanel').jqEasyPanel({
                    position: 'bottom'
                });
            });

            $('#create').submit(function() {
                $.post('create.php', $('#create').serialize(), function(data, textStatus) {
                    $('#created').append(data);
                });
                return false;
            });
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
          $('#relogio_crono').click(function(){
                        $( "#footerCustumize" ).load( "cronometro.html" );
            return false;
          });
        });
        </script>
        -->

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



        <script type="text/javascript">
            $(document).ready(function() {
                $('#btnAdd').click(function() {
                    var num = $('.clonedInput').length; // how many "duplicatable" input fields we currently have
                    var newNum = new Number(num + 1);      // the numeric ID of the new input field being added

                    // create the new element via clone(), and manipulate it's ID using newNum value
                    var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);

                    // manipulate the name/id values of the input inside the new element
                    newElem.children(':first').attr('id', 'name' + newNum).attr('name', 'name' + newNum);

                    // insert the new element after the last "duplicatable" input field
                    $('#input' + num).after(newElem);

                    // enable the "remove" button
                    $('#btnDel').attr('disabled', '');

                    // business rule: you can only add 5 names
                    if (newNum == 5)
                        $('#btnAdd').attr('disabled', 'disabled');
                });

                $('#btnDel').click(function() {
                    var num = $('.clonedInput').length; // how many "duplicatable" input fields we currently have
                    $('#input' + num).remove();     // remove the last element

                    // enable the "add" button
                    $('#btnAdd').attr('disabled', '');

                    // if only one element remains, disable the "remove" button
                    if (num - 1 == 1)
                        $('#btnDel').attr('disabled', 'disabled');
                });

                $('#btnDel').attr('disabled', 'disabled');
            });

        </script>






        <style>
            #headerCustumize, #footerCustumize{
                background: rgb(180,221,180); /* Old browsers */
                background: -moz-linear-gradient(top, rgba(180,221,180,1) 0%, rgba(131,199,131,1) 0%, rgba(82,177,82,1) 21%, rgba(0,138,0,1) 67%, rgba(0,87,0,1) 100%); /* FF3.6+ */
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(180,221,180,1)), color-stop(0%,rgba(131,199,131,1)), color-stop(21%,rgba(82,177,82,1)), color-stop(67%,rgba(0,138,0,1)), color-stop(100%,rgba(0,87,0,1))); /* Chrome,Safari4+ */
                background: -webkit-linear-gradient(top, rgba(180,221,180,1) 0%,rgba(131,199,131,1) 0%,rgba(82,177,82,1) 21%,rgba(0,138,0,1) 67%,rgba(0,87,0,1) 100%); /* Chrome10+,Safari5.1+ */
                background: -o-linear-gradient(top, rgba(180,221,180,1) 0%,rgba(131,199,131,1) 0%,rgba(82,177,82,1) 21%,rgba(0,138,0,1) 67%,rgba(0,87,0,1) 100%); /* Opera 11.10+ */
                background: -ms-linear-gradient(top, rgba(180,221,180,1) 0%,rgba(131,199,131,1) 0%,rgba(82,177,82,1) 21%,rgba(0,138,0,1) 67%,rgba(0,87,0,1) 100%); /* IE10+ */
                background: linear-gradient(to bottom, rgba(180,221,180,1) 0%,rgba(131,199,131,1) 0%,rgba(82,177,82,1) 21%,rgba(0,138,0,1) 67%,rgba(0,87,0,1) 100%); /* W3C */
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b4ddb4', endColorstr='#005700',GradientType=0 ); /* IE6-9 */
            }


            #b1{
                background: rgb(180,227,145); /* Old browsers */
                background: -moz-linear-gradient(top, rgba(180,227,145,1) 0%, rgba(97,196,25,1) 50%, rgba(180,227,145,1) 100%); /* FF3.6+ */
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(180,227,145,1)), color-stop(50%,rgba(97,196,25,1)), color-stop(100%,rgba(180,227,145,1))); /* Chrome,Safari4+ */
                background: -webkit-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%); /* Chrome10+,Safari5.1+ */
                background: -o-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%); /* Opera 11.10+ */
                background: -ms-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%); /* IE10+ */
                background: linear-gradient(to bottom, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%); /* W3C */
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b4e391', endColorstr='#b4e391',GradientType=0 ); /* IE6-9 */
            }

            .my-button-treino
            {
                background: rgb(180,227,145); /* Old browsers */
                background: -moz-linear-gradient(top, rgba(180,227,145,1) 0%, rgba(97,196,25,1) 50%, rgba(180,227,145,1) 100%); /* FF3.6+ */
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(180,227,145,1)), color-stop(50%,rgba(97,196,25,1)), color-stop(100%,rgba(180,227,145,1))); /* Chrome,Safari4+ */
                background: -webkit-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%); /* Chrome10+,Safari5.1+ */
                background: -o-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%); /* Opera 11.10+ */
                background: -ms-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%); /* IE10+ */
                background: linear-gradient(to bottom, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%); /* W3C */
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b4e391', endColorstr='#b4e391',GradientType=0 ); /* IE6-9 */
            }


            #formata_tabela{

                border-collapse: collapse;
            }

            #formata_tabela td, #formata_tabela th {
                text-align: center;


            }

            #formata_tabela th {

                text-align: left;

                background-color: rgb(180,227,145);

            }

            #formata_tabela tr.alt td {

                color: #000000;
                background-color: #EAF2D3;
            }
			
			
		#myPanel2{
		 background: url(backgroundverde.jpg);
			background-repeat:repeat-y;
			background-position:center center;
			background-attachment:scroll;
			background-size:100% 100%;
		
		
		}
		#myPanel{
		 background: url(backgroundverde.jpg);
			background-repeat:repeat-y;
			background-position:center center;
			background-attachment:scroll;
			background-size:100% 100%;
		
		
		}

        </style>


    </head>






    <body id="body1">
        <div data-role="page" id="pageone">

            <div data-role="panel" id="myPanel" data-position="right" data-display="overlay" > 
                <h2>Opções</h2>
                <div data-role="collapsible" data-inset="false">


                </div>
                <p>
                    <a data-rel="close" data-role="button">Hide</a>
                </p>	
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
                </table>	
                <a href="#pageAlterarDadosUtilizador2" data-role="button" data-theme="e" >Editar Perfil</a>
                <a data-role="button" href="#pageMedicoesSemTreino" data-theme="e" >Medições Sem Treino</a>

                <a data-role="button" href="logout.php" data-theme="e">Logout</a>



            </div> 

            <div data-role="header" data-theme="b" id="headerCustumize">
                <a href="#myPanel2" id="b1"><img src="icones/profile-icon.png"  width="18" height="18"></a> 
                <h1>Menu praticante</h1> 


                <div data-role="navbar" data-iconpos="top" data-theme="a">
                    <ul>
                        <li><a href="#pageHistoricoTreinos" data-icon="search" data-theme="e">Historico Treinos</a></li>
                        <li><a href="#pageRendimentos" data-icon="search" data-theme="e">Rendimentos </a></li>
                        <li><a href="experiencia5.php" data-icon="search" data-theme="e">Slider Rendimentos </a>
						<li><a href="#page30" data-icon="search" data-theme="e">Procura Exercicios</a></li>

                    </ul>
                </div>

            </div>



            <div data-role="main" class="ui-content">
                <center>            <?php 
			$user = $_SESSION['pes_user'];
			$sql=" select * from pessoa where pes_user= '$user' ";						
			$rs = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_array($rs) ;
			echo "<h2><center>Bem vindo: " . $row["pes_nome"] . "</center></h2>";
            ?></center>
				
                <div data-role="collapsible" data-theme="b" data-content-theme="d" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u">
                    <h1>
                        Treino Anterior 

                    </h1>
                    <?php
                    $sql = "select pes_nome, tre_data 
								from treino,exercicios,plano_treino,pessoa
								where pla_tre_id = tre_id 
								and pla_exe_id = exe_id 
								and tre_pesAutor_id= pes_id 
								and tre_data = (select max(tre_data)
												from treino 
												where tre_data < CURDATE())";

                    $rs = mysql_query($sql) or die(mysql_error());
                    $row = mysql_fetch_array($rs);

                    echo "<b>Treinador:</b>  " . $row['pes_nome'];
                    echo "<br/>";
                    echo "<b>Data : </b> " . $row['tre_data'];

                    mysql_free_result($rs);
                    ?> 
                    <center>

<?php
$sql = "select tre_id, pes_nome, tre_data,exe_nome,pla_tempo,pla_numRepeticoes 
								from treino,exercicios,plano_treino,pessoa
								where pla_tre_id = tre_id 
								and pla_exe_id = exe_id 
								and tre_pesAutor_id= pes_id 
								and tre_data = (select max(tre_data)
												from treino where tre_data < CURDATE());";

$rs = mysql_query($sql) or die(mysql_error());


echo "<table >";
echo "<tr>";



echo "	<th>Exercicio</th>";
echo "	<th>Tempo</th>";
echo "	<th>Repetições</th>";
echo "</tr>";


while ($row = mysql_fetch_array($rs)) {
    echo "<tr>";




    echo "<td>" . $row['exe_nome'] . "</td>";
    echo "<td>" . $row['pla_tempo'] . "</td>";
    echo "<td>" . $row['pla_numRepeticoes'] . "</td>";

    echo "</tr>";
}
echo "</table>";


mysql_free_result($rs);
?> 
                    </center>

                </div>

                <div data-role="collapsible" data-theme="b" data-content-theme="d" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u">
                    <h1>Treino Seguinte</h1> 
<?php
$sql = "select pes_nome, tre_data 
								from treino,exercicios,plano_treino,pessoa
								where pla_tre_id = tre_id 
								and pla_exe_id = exe_id 
								and tre_pesAutor_id= pes_id 
								and tre_data = (select min(tre_data)
												from treino 
												where tre_data > CURDATE())";

$rs = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($rs);

echo "<b>Treinador:</b>  " . $row['pes_nome'];
echo "<br/>";
echo "<b>Data : </b> " . $row['tre_data'];

mysql_free_result($rs);
?> 
                    <center>
                    <?php
                    $sql = "select tre_id, pes_nome, tre_data,exe_nome,pla_tempo,pla_numRepeticoes 
								from treino,exercicios,plano_treino,pessoa
								where pla_tre_id = tre_id 
								and pla_exe_id = exe_id 
								and tre_pesAutor_id= pes_id 
								and tre_data = (select min(tre_data)
												from treino where tre_data > CURDATE());";

                    $rs = mysql_query($sql) or die(mysql_error());


                    echo "<table >";
                    echo "<tr>";


                    echo "	<th>Exercicio</th>";
                    echo "	<th>Tempo</th>";
                    echo "	<th>Repetições</th>		";
                    echo "</tr>";


                    while ($row = mysql_fetch_array($rs)) {
                        echo "<tr>";


                        echo "<td>" . $row['exe_nome'] . "</td>";
                        echo "<td>" . $row['pla_tempo'] . "</td>";
                        echo "<td>" . $row['pla_numRepeticoes'] . "</td>";

                        echo "</tr>";
                    }
                    echo "</table>";


                    mysql_free_result($rs);
                    ?>
                    </center>
                </div>

                <center><h3>Treino de hoje</h3>
<?php
$sql = "select pes_nome, tre_data 
								from treino,exercicios,plano_treino,pessoa
								WHERE tre_data = CURDATE()
								and pla_tre_id = tre_id 
								and pla_exe_id = exe_id 
								and tre_pesAutor_id=pes_id";

$rs = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($rs);

echo "<center><b>Treinador:</b>  " . $row['pes_nome'] . "</center>";
echo "<center><b>Data : </b> " . $row['tre_data'] . "</center>";
echo "<br/>";
mysql_free_result($rs);
?> 

                    <?php
                    $sql = "SELECT exe_nome,pla_tempo,pla_numRepeticoes FROM treino,exercicios,plano_treino,pessoa 
								WHERE tre_data = CURDATE()
								and pla_tre_id = tre_id 
								and pla_exe_id = exe_id 
								and tre_pesAutor_id=pes_id";

                    $rs = mysql_query($sql) or die(mysql_error());

                    if (mysql_num_rows($rs) > 0) {
                        echo "<table id=formata_tabela>";
                        echo "<tr>";


                        echo "	<th>Exercicio</th>";
                        echo "	<th>Tempo</th>";
                        echo "	<th>Repetições</th>		";
                        echo "</tr>";


                        while ($row = mysql_fetch_array($rs)) {
                            echo "<tr>";
                            echo "<td>" . $row['exe_nome'] . "</td>";
                            echo "<td>" . $row['pla_tempo'] . "</td>";
                            echo "<td>" . $row['pla_numRepeticoes'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";

                        echo "<table>
						<tr>
						<td>
						<a data-role='button' class='my-button-treino' href='#pagetreino'>Realizar Treino</a>
					
						<a data-role='button'  class='my-button-treino' href='#pageMedicoesTreino'>Medicoes Treino</a>
						</td>
						</tr>
						
						</table>";
                    } else {
                        echo "Sem treinos para a data de hoje ";
                    }

                    mysql_free_result($rs);
                    ?>

            </div>

            <div data-role="footer" data-position="fixed" data-theme="b" id="footerCustumize">
                <h1>Footer Text</h1>
            </div> 

        </div>


        <div data-role="page" id="pagetreino">

            <div data-role="header" data-theme="b" id="headerCustumize">
                <a href="#pageone" data-role="button" data-icon="delete" data-iconpos="notext"></a>
                <h1>Realizar Treino</h1> 
            </div>

            <div data-role="content"  id="result">

<?php
$user = $_SESSION['pes_user'];
$sql = "SELECT * FROM treino,exercicios,plano_treino,pessoa
								WHERE tre_data = CURDATE()
								and pla_tre_id = tre_id 
								and pla_exe_id = exe_id 
								and tre_pesAutor_id = pes_id";


$result = mysql_query($sql) or die($sql . "<br/><br/>" . mysql_error());

$i = 0;


echo "<form name='jjj' method='post' action='InserirPHP/InserirResultadosTreino.php'>\n";


while ($treinos = mysql_fetch_array($result)) {
    echo "<div data-role='collapsible' data-content-theme='d'>";
    echo "<h1>{$treinos['exe_nome']}</h1>";
    echo "<table id=formata_tabela>";

    /*
      echo "<div data-role='popup' id='exemplificarExercicioJanela'>";
      echo	"<div data-role='header'>";
      echo		"<h1>ExemplificarExercicio</h1>";
      echo	"</div>";

      echo	"<div data-role='main' class='ui-content'>";
      echo		"<p>Mostrar Imagem</p>";



      echo '<img src="data:image/jpeg;base64,'.base64_encode($treinos['exe_imagem']).'" />';

      echo	"</div>";


      echo "</div>";

     */

	 
    echo '<img height="200" width="300" src="data:image/jpeg;base64,' . base64_encode($treinos['exe_imagem']) . '" />';
	

    echo "<th><a href='#exemplificarExercicioJanela' data-rel='popup' data-position-to='window' data-transition='fade'>ID</a></th>";
    echo "<td>
				<input name='pla_tre_res_pla_tre_id[]' value='{$treinos['pla_id']}' readonly /></td>";
    echo "</tr>";

    echo "<tr>";

    echo "<th>Tempo</th>";
    echo "<td>{$treinos['pla_tempo']}</td>";
    echo "</tr>";
    echo "<tr>";

    echo "<th>Repetições</th>";
    echo "<td>{$treinos['pla_numRepeticoes']}</td>";
    echo "</tr>";
    echo "<tr>";

    echo "<th>Crono</th>";
    echo "<td><a href='#myPopupDialog' data-rel='popup' data-position-to='window' data-transition='fade'><img src='icones/Actions-chronometer-icon.png' id='relogio_crono_1' width='30' height='30'></a></td>";
    echo "</tr>";
    echo "<tr>";

    echo "<th>res_pes_id</th>";

    $user = $_SESSION['pes_user'];
    $sql_1 = "SELECT * FROM pessoa where pes_user = '$user'  ";
    $rs_1 = mysql_query($sql_1) or die(mysql_error());

    $row_1 = mysql_fetch_array($rs_1);
    echo "<td><input name='res_pes_id[]' value='" . $row_1["pes_id"] . "' " . $row_1["pes_id"] . "/ readonly></td>";
    echo "</tr>";
    echo "<tr>";

    echo "<th>Valor</th>";
    echo "<td><input type='text'  name='res_valorExercicio[]'  /></td>";
    echo "</tr>";
    echo "<tr>";

    echo "<th>Estado</th>";
    echo "<td><input type='text'  name='res_estado[]'   /></td>";

    echo '</tr>';

    ++$i;

    echo '</table>';
    echo "</div>";
}
echo "<td><input type='submit' value='submit' data-theme='b' /></td>";

echo "</form>";
?>


                <!--
                <table id="myTable2">
                <tr>
                <td><a href="#" class="open"><img src="icones/Actions-chronometer-icon.png" id="relogio_crono_1" width="25" height="25"></a><td>	 
                </tr>
                </table>
                -->



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

		
		
		
		
		
		
		
		
		
		
		
		


        <div data-role="page" id="pageHistoricoTreinos" >
            <div data-role="header" data-position="fixed" data-theme="b" id="headerCustumize" >
                <a href="#pageone" data-role="button" data-icon="delete" data-iconpos="notext"></a>
                <h1>Historico de treinos</h1>
            </div> 

            <div data-role="content" data-theme="b" id="resultado" >

                <form action="process_form.php" method="get">
                    <center>
                        <table>
                            <tr>
                                <th><label for="tre_data">Data</label> </th>
                                <td><input type="text" name="tre_data" id="tre_data" /> </td>
                            </tr>
                        </table>
                    </center>

                </form>

                <div data-role="content" id="error"></div>
                <div data-role="content" id="ajax_results"></div>		







            </div>

            <div data-role="footer" data-position="fixed" data-theme="b" id="footerCustumize">
                <h1>Footer Text</h1>
            </div> 
        </div>	


        <div data-role="page" id="pageMedicoesTreino" >
            <div data-role="header" data-position="fixed" data-theme="b" id="headerCustumize" >
                <a href="#pageone" data-role="button" data-icon="delete" data-iconpos="notext"></a>
                <h1>Medições</h1>
            </div> 

            <div data-role="content" data-theme="b" id="resultado" >

                <form method="post" action="InserirPHP/InserirMedicoes.php">

                    <div id="customcopies">


                        <table>
                            <tr>
                                <th><label for="Pessoa">Pessoa:</label></th>
                                <th><label for="Tipo_Medição">Tipo Medição</label></th>
                                <th><label for="Treino">Treino:</label></th>
                                <th><label for="Valor">Valor:</label></th>
                                <th><label for="Data">Data:</label></th>
                            </tr>
                            <tr>
                                <td>		
<?php
$user = $_SESSION['pes_user'];
$sql = "SELECT * FROM pessoa where pes_user = '$user'  ";
$rs = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($rs);
echo "<input name='med_pes_id[]' value='" . $row["pes_id"] . "' " . $row["pes_id"] . "/ readonly>";
mysql_free_result($rs);
?> 
                                </td>	

                                <td>		
<?php
$sql = "select * from medicoes_tipo";

$rs = mysql_query($sql) or die(mysql_error());
echo "<select name='med_med_tipo_id[]' id='med_med_tipo_id'>";
while ($row = mysql_fetch_array($rs)) {
    echo "<option value='" . $row["med_tipo_id"] . "'>" . $row["med_tipo_nome"] . "</option>";
}mysql_free_result($rs);
echo "</select>";
?> 
                                </td>
                                <td>		
                                    <?php
                                    $sql = "select tre_id, tre_data from treino where tre_data = curdate()";
                                    $rs = mysql_query($sql) or die(mysql_error());
                                    $row = mysql_fetch_array($rs);
                                    echo "<input name='med_tre_id[]' value='" . $row["tre_id"] . "' " . $row["tre_id"] . "/ readonly>";
                                    mysql_free_result($rs);
                                    ?> 
                                </td>

                                <td>		

                                    <input type="text"  size="40" name="med_valor[]" id="med_valor_1" />
                                </td>

                                <td>		
                                    <?php
                                    $sql = "select tre_id, tre_data from treino where tre_data = curdate()";
                                    $rs = mysql_query($sql) or die(mysql_error());
                                    $row = mysql_fetch_array($rs);
                                    echo "<input name='med_data[]' value='" . $row["tre_data"] . "' " . $row["tre_data"] . "/ readonly>";
                                    mysql_free_result($rs);
                                    ?> 
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

            <div data-role="footer" data-position="fixed" data-theme="b" id="footerCustumize">
                <h1>Footer Text</h1>
            </div> 
        </div>	


        <div data-role="page" id="pageMedicoesSemTreino" >
            <div data-role="header" data-position="fixed" data-theme="b" id="headerCustumize" >
                <a href="#pageone" data-role="button" data-icon="delete" data-iconpos="notext"></a>
                <h1>Medições Sem treino</h1>
            </div> 

            <div data-role="content" data-theme="b" id="resultado" >

                <form method="post" action="InserirPHP/InserirMedicoes.php">

                    <div id="customcopies">


                        <table>
                            <tr>
                                <th><label for="Treino">Pessoa:</label></th>
                                <th><label for="Classificação">Tipo Medição</label></th>
                                <th><label for="Treino">Valor:</label></th>
                                <th><label for="Treino">Data:</label></th>
                            </tr>
                            <tr>
                                <td>		
<?php
$user = $_SESSION['pes_user'];
$sql = "SELECT * FROM pessoa where pes_user = '$user'  ";
$rs = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($rs);
echo "<input name='med_pes_id[]' value='" . $row["pes_id"] . "' " . $row["pes_id"] . "/ readonly>";
mysql_free_result($rs);
?> 
                                </td>	

                                <td>		
<?php
$sql = "SELECT * FROM medicoes_tipo";
$rs = mysql_query($sql) or die(mysql_error());
echo "<select name='med_med_tipo_id[]' id='med_med_tipo_id'>";
while ($row = mysql_fetch_array($rs)) {
    echo "<option value='" . $row["med_tipo_id"] . "'>" . $row["med_tipo_nome"] . "</option>";
}mysql_free_result($rs);
echo "</select>";
?> 
                                </td>


                                <td>		

                                    <input type="text"  size="40" name="med_valor[]" id="med_valor_1" />
                                </td>
                                <td>		

                                    <input type="date"  size="40" name="med_data[]" id="med_valor_1" />
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

            <div data-role="footer" data-position="fixed" data-theme="b" id="footerCustumize">
                <h1>Footer Text</h1>
            </div> 
        </div>	

        <div data-role="page" id="pageRendimentos" >
            <div data-role="header" data-position="fixed" data-theme="b" id="headerCustumize" >
                <a href="#pageone" data-role="button" data-icon="delete" data-iconpos="notext"></a>
                <h1>Rendimentos</h1>
            </div> 

            <div data-role="content" data-theme="b" id="resultado" >

<?php
include "libchart/classes/libchart.php";

$user = $_SESSION['pes_user'];
$sql = "select med_data, med_valor from medicoes,pessoa where med_pes_id = pes_id and pes_user = '$user' and med_med_tipo_id='2' order by med_data;";
$rs = mysql_query($sql) or die(mysql_error());

$user = $_SESSION['pes_user'];
$sql_2 = "select med_data, med_valor from medicoes,pessoa where med_pes_id = pes_id and pes_user = '$user' and med_med_tipo_id='1' order by med_data;";
$rs_2 = mysql_query($sql_2) or die(mysql_error());



$sql_4 = "select med_data, med_valor from medicoes,pessoa where med_pes_id = pes_id and pes_user = '$user' and med_med_tipo_id='4' order by med_data;";
$rs_4 = mysql_query($sql_4) or die(mysql_error());



$sql_5 = "select exe_nome, count(exe_nome) as contagem from  pessoa, resultados, plano_treino_resultados, plano_treino, exercicios
where  pes_id = res_pes_id 
and  res_id = pla_tre_res_res_id
and pla_tre_res_pla_tre_id = pla_id 
and pla_exe_id = exe_id
and pes_user = '$user' group by exe_nome;  ";
$rs_5 = mysql_query($sql_5) or die(mysql_error());

$sql_6= "select mus_designacao, count(mus_designacao) as contagem_musculos
from  pessoa, resultados, plano_treino_resultados, plano_treino, exercicios, musculos, exercicios_musculos
where  pes_id = res_pes_id 
and  res_id = pla_tre_res_res_id
and pla_tre_res_pla_tre_id = pla_id 
and pla_exe_id = exe_id 
and exe_mus_exe_id = exe_id
and exe_mus_mus_id = mus_id
and pes_user = '$user'  group by mus_designacao order by mus_designacao ;  ";
$rs_6 = mysql_query($sql_6) or die(mysql_error());

$chart = new LineChart();
$chart_line = new VerticalBarChart();

$serie1 = new XYDataSet();
while ($row = mysql_fetch_array($rs)) {
    $serie1->addPoint(new Point($row['med_data'], $row['med_valor']));
}

$serie2 = new XYDataSet();
while ($row_2 = mysql_fetch_array($rs_2)) {
    $serie2->addPoint(new Point($row_2['med_data'], $row_2['med_valor']));
}

$serie4 = new XYDataSet();
while ($row_4 = mysql_fetch_array($rs_4)) {
    $serie4->addPoint(new Point($row_4['med_data'], $row_4['med_valor']));
}

$dataSet_line = new XYDataSet();
while($row_5 = mysql_fetch_array($rs_5)) {
	$dataSet_line->addPoint(new Point($row_5['exe_nome'],$row_5['contagem']));
}

$dataSet_line2 = new XYDataSet();
while($row_6 = mysql_fetch_array($rs_6)) {
	$dataSet_line2->addPoint(new Point($row_6['mus_designacao'],$row_6['contagem_musculos']));
}

$dataSet = new XYSeriesDataSet();
$dataSet->addSerie("Oximetria", $serie2);
$chart->setDataSet($dataSet);
$chart->setTitle("Valor da Oximetria");
$chart->getPlot()->setGraphCaptionRatio(0.62);
$chart->render("graficoOximetria.png");




$dataSet1 = new XYSeriesDataSet();
$dataSet1->addSerie("Fre Card Máx", $serie1);
$chart->setDataSet($dataSet1);
$chart->setTitle("Valor da FCMáx");
$chart->getPlot()->setGraphCaptionRatio(0.62);
$chart->render("graficoFreqCardMax.png");


$dataSet4 = new XYSeriesDataSet();
$dataSet4->addSerie("Peso", $serie4);
$chart->setDataSet($dataSet4);
$chart->setTitle("Variação Peso(Kg)/Tempo(data)");
$chart->getPlot()->setGraphCaptionRatio(0.62);
$chart->render("graficoPeso.png");


$chart_line->setDataSet($dataSet_line);
$chart_line->setTitle("Frequência de Exercicios Realizados");
$chart_line->render("graficoExerciciosMaisFrequentes.png");

$chart_line->setDataSet($dataSet_line2);
$chart_line->setTitle("Musculos mais exercitados");
$chart_line->render("graficoMusculosMaisExercitados.png");



?>

                <img alt="Vertical bars chart" src="graficoOximetria.png" />
                <p/>
                <img alt="Vertical bars chart" src="graficoFreqCardMax.png" />
                <p/>
                <img alt="Vertical bars chart" src="graficoPeso.png" />
                <p/>
                <img alt="" src="graficoExerciciosMaisFrequentes.png" />
                <p/>
                <img alt="" src="graficoMusculosMaisExercitados.png" />
            
			</div>

            <div data-role="footer" data-position="fixed" data-theme="b" id="footerCustumize">
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
    </body>
</html>


