<?php
$db_banco ="pesquisa";
$db_user = "root";
$db_pass = "";
$host = "localhost";

$mysql = new mysqli($host,$db_user,$db_pass,$db_banco);
$mysql->set_charset('utf8');
			if (!$mysql) {
					die ("Imposs?vel conectar ao MySQL " . mysql_error());
					} else
							echo '';
?>
