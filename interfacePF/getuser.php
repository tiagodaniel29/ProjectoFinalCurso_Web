<?php
$q = intval($_GET['q']);

include 'conexao.php';

$sql="SELECT * FROM treino,exercicios,plano_treino,pessoa 
WHERE tre_id = '".$q."' 
and pla_tre_id = tre_id 
and pla_exe_id = exe_id 
and tre_pesAutor_id=pes_id";

$rs = mysql_query($sql) or die(mysql_error());
					

echo "<table data-role='table' data-mode='columntoggle' class='ui-responsive ui-shadow' id='myTable'>
<tr>
<th>Treino ID</th>
<th>Autor</th>
<th>Data</th>
<th>Exercicio</th>
<th>Tempo</th>
<th>Repetições</th>
</tr>";

while($row = mysql_fetch_array($rs)) {
  echo "<tr>";
  echo "<td>" . $row['tre_id'] . "</td>";
  echo "<td>" . $row['pes_nome'] . "</td>";
  echo "<td>" . $row['tre_data'] . "</td>";
  echo "<td>" . $row['exe_nome'] . "</td>";
  echo "<td>" . $row['pla_tempo'] . "</td>";
  echo "<td>" . $row['pla_numRepeticoes'] . "</td>";
 
  echo "</tr>";
}
echo "</table>";


?>