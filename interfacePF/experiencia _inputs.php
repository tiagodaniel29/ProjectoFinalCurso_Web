<?php
include 'conexao.php';
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>





<script>

 
 
$(document).ready(function() {
             
   
    $('#btnAdd').click( function() {
         
        $('#btnDel').removeAttr('disabled').button('enable');	// enable the "del" button
        
        // how many "duplicatable" input fields we currently have
        var num = $('.clonedInput').length;	
        
        // the numeric ID of the new input field being added	
        var newNum	= new Number(num + 1);		
        var newElem = $('#input' + num ).clone().attr('id', 'input' + newNum);
                                 
        newElem.children(':first').attr( 'id', 'name' + newNum ).attr('name', 'name_label[]');
        $('#input' + num).after(newElem);
        
        
        // business rule: limit the number of fields to 5
        if (newNum == 5) {
             $('#btnAdd' ).attr('disabled', 'disabled').button('disable');
             $('#btnAdd').parent().find('.ui-btn-text').text('maximum fields reached');
        }                        
    });
 
    $( '#btnDel' ).click( function() {
        // how many "duplicatable" input fields we currently have           
        var num = $( '.clonedInput' ).length;	
        
        // remove the last element	
        $('#input' + num ).remove();
        
        // enable the "add" button, since we've removed one				
        $('#btnAdd').removeAttr('disabled').button('enable');	
        $('#btnAdd').parent().find('.ui-btn-text').text('add another name');
        
        // if only one element remains, disable the "remove" button
        if ( num-1 == 1 )
        $('#btnDel' ).attr('disabled', 'disabled').button('disable');
 
    });  
   
});           
</script>  
 </head>
 
<!-- Here is the form -->
 
  <form method="post" action="InserirPHP/InserirPlanoTreino.php">
          <div id="input1" class="clonedInput" style="margin-bottom: 4px;">
		  <table>
		  <tr>
		  <th><label for="field_name" class="ui-hidden-accessible">Name:</label></th>
		  <th><label for="field_valor" class="ui-hidden-accessible">Valor:</label></th>
		  <th></th>
		  <th></th>
		  <th></th>
		  </tr>
		  <tr>
		  	  <td>
			  

			<?php
			$sql = "SELECT * FROM Treino";
			$rs = mysql_query($sql) or die(mysql_error());
			echo "<select name='pla_tre_id[]' id='pla_tre_id_1'>";
			while ($row = mysql_fetch_array($rs)) {
				echo "<option value='" . $row["tre_id"] . "'>" . $row["tre_data"] . "</option>";
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
                            
	
<td>
                                <input type="text"  size="40" name="pla_tempo[]" id="pla_tempo_1" placeholder="tempo"/>
                            </td>
                            <td>
                                <input type="text" id="copiestorepeticao_1" size="40" name="pla_numRepeticoes[]" placeholder="nº repetições" />
                            </td>
			  

			  
			 
		  </tr>
		  </table>
		  </div>
		  
             
          
          <div>
              <input id="btnAdd" type="button" value="Adionar +1" data-inline="true">
              <input id="btnDel" type="button" value="Remover Ultimo" disabled="disabled" data-inline="true">
          </div>
		  <input type="submit"  data-inline="true" name="submit_val" value="Submit" />
 </form>
</html>
