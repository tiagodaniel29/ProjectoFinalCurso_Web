
<?php
$q = intval($_GET['q']);

include 'conexao.php';


$sql= "SELECT distinct * FROM exercicios, exercicios_musculos, musculos, tipo_exercicio
									Where exe_exe_tipo_id = tipo_exe_id
									and mus_id = '".$q."' 
									and exe_mus_exe_id = exe_id 
									and exe_mus_mus_id = mus_id order by exe_nome";



$rs = mysql_query($sql) or die(mysql_error());
					

echo "<table data-role='table' data-mode='columntoggle' class='ui-responsive ui-shadow' id='myTable' style='center'>";


while($row = mysql_fetch_array($rs)) {
  echo "<tr>";
  echo "<th>Nome</th>";
  echo "<td>" . $row['exe_nome'] . "</td>"; 
  echo "</tr>";
  echo "<th>Tipo</th>";
  echo "<td>" . $row['tipo_exe_nome'] . "</td>";
  echo "<tr>";
  echo "<th>Dificuldade</th>";
  echo "<td>" . $row['exe_dificuldade'] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<th>Descrição</th>";
  echo "<td>" . $row['exe_descricao'] . "</td>";
  echo "</tr>";
  echo "<tr>"; 
  echo "<th>Imagem</th>";
  echo "<td>";
 
  echo '<img height="100" width="200" src="data:image/jpeg;base64,' . base64_encode($row['exe_imagem']) . '" />'   ;
  echo "</td>";
  echo "</tr>";
  
  
}
echo "</table>";


?>
