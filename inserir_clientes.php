<?php
echo '<head><meta http-equiv="refresh" content="0.1;url=index.php"></head>';
include"conexao.php";
if ($_POST) {
			$nome = $_POST['nome'];
			$banco = $_POST['banco'];
			$agencia = $_POST['agencia'];
			$conta = $_POST['conta'];
			$email = $_POST['email'];
			$fone = $_POST['fone'];

			$sql = "INSERT INTO cliente ( nome, email, banco, agencia, conta, telefone)
					  VALUES ('$nome','$email','$banco','$agencia','$conta','$fone');";
			$result = $mysql->query($sql);
		}
 ?>
