<?php
	//recebemos nosso parâmetro vindo do form
	$parametro = isset($_POST['pesquisaCliente']) ? $_POST['pesquisaCliente'] : null;
	$msg = "";
	//começamos a concatenar nossa tabela
	$msg .="<table class='table table-hover table-bordered table-striped'>";
	$msg .="	<thead>";
	$msg .="		<tr>";
	$msg .="			<th>#</th>";
	$msg .="			<th>Nome:</th>";
	$msg .="			<th>Banco:</th>";
	$msg .="			<th>Agencia:</th>";
	$msg .="			<th>Conta:</th>";
	$msg .="			<th>Telefone:</th>";
	$msg .="		</tr>";
	$msg .="	</thead>";
	$msg .="	<tbody>";

				//requerimos a classe de conexão
				require_once('class/Conexao.class.php');
					try {
						$pdo = new Conexao();
						$resultado = $pdo->select("SELECT idCliente, nome, banco, agencia, conta, telefone, fav
							FROM cliente WHERE nome LIKE '%$parametro%' ORDER BY fav, nome ASC");
						$pdo->desconectar();

						}catch (PDOException $e){
							echo $e->getMessage();
						}
						//resgata os dados na tabela
						if(count($resultado)){
							foreach ($resultado as $res) {

	$msg .="				<tr>";
	$msg .="					<td>".$res['idCliente']."</td>";
	$msg .="					<td>".$res['nome']."</td>";
	$msg .="					<td>".$res['banco']."</td>";
	$msg .="					<td>".$res['agencia']."</td>";
	$msg .="					<td>".$res['conta']."</td>";
	$msg .="					<td>".$res['telefone']."</td>";
	$msg .="				</tr>";
							}
						}else{
							$msg = "";
							$msg .="Nenhum resultado foi encontrado...";
						}
	$msg .="	</tbody>";
	$msg .="</table>";
	//retorna a msg concatenada
	echo $msg;
?>
