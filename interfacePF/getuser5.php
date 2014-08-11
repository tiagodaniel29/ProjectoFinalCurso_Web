
<?php
$q = intval($_GET['q']);

include 'conexao.php';


$sql= "SELECT * FROM treino where tre_data = '".$q."' "; 
									



$rs = mysql_query($sql) or die(mysql_error());
					

echo "<table >
<tr>

<th>tre_id</th>
<th>tre_pesAutor_id</th>
<th>tre_data</th>

</tr>";

while($row = mysql_fetch_array($rs)) {
  echo "<tr>";
  echo "<td>" . $row['tre_id'] . "</td>";
  echo "<td>" . $row['tre_pesAutor_id'] . "</td>";
  echo "<td>" . $row['tre_data'] . "</td>";
  
  
  echo "</tr>";
}
echo "</table>";


?>
