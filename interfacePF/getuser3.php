
<?php
$k = intval($_GET['k']);

include 'conexao.php';

$sql= "Select exe_nome From exercicios WHERE exe_nome LIKE  '".$k."%' ";



$rs = mysql_query($sql) or die(mysql_error());
					

echo "<table data-role='table' data-mode='columntoggle' class='ui-responsive ui-shadow' id='myTable'>
<tr>

<th>Nome</th>


</tr>";

while($row = mysql_fetch_array($rs)) {
  echo "<tr>";
  echo "<td>" . $row['exe_nome'] . "</td>";

  
  echo "</tr>";
}
echo "</table>";


?>