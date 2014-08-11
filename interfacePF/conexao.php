<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "projf";
$conexao = mysql_connect($host,$user,$pass) or die (mysql_error());
mysql_select_db($banco) or die(mysql_error());
?>