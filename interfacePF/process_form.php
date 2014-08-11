<?php
//this is a script to use if we can get mysqli extension..
$mysqli = new mysqli("localhost", "root", "", "projf");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


//Show a people based on first name (or show all)

if(empty($_GET['tre_data'])) { 
	
   $result = $mysqli->query("SELECT * FROM treino,exercicios,plano_treino,pessoa
								WHERE 
								pla_tre_id = tre_id 
								and pla_exe_id = exe_id 
								and tre_pesAutor_id = pes_id", MYSQLI_USE_RESULT);
} else {
	$tre_data = $_GET['tre_data'];
	print "<h3>Treinos da data: $tre_data</h3>";
	$result = $mysqli->query("SELECT * FROM treino,exercicios,plano_treino,pessoa
								WHERE tre_data LIKE '$tre_data%'
								and pla_tre_id = tre_id 
								and pla_exe_id = exe_id 
								and tre_pesAutor_id = pes_id ", MYSQLI_USE_RESULT);
}								
print '<table>
<tr>
<th>Id</th>
<th>Data</th>
<th>Exercicio</th>
<th>Tempo</th>
<th>Repetições</th>
</tr>'; 

while ($row = $result->fetch_array())
{
	echo "<tr>";
	echo "<td>".$row['tre_id']."</td>";
	echo "<td>".$row['tre_data']."</td>";
	echo "<td>".$row['exe_nome']."</td>";
	echo "<td>".$row['pla_tempo']."</td>";
	echo "<td>".$row['pla_numRepeticoes']."</td>";
	print '</tr>';
}
print '</table>';	

$mysqli->close(); 
?>