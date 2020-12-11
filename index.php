<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agenda Telefônica</title>
	<link rel="stylesheet" href="lib/style.css" />
</head>
<body>
    
<div class="table">
	<h1>Agenda Telefônica</h1>
    <table border="2">
    <tr>
    <th>Nome</th>
    <th>Telefone</th>
    <th>Endereço</th>
    <th>Ações</th>
    </tr>
    <?php
	require_once "models/conexao.class.php";
	require_once "models/contatoDAO.class.php";
	//buscar contatos na bd
	$contatoDAO = new contatoDAO();
	$retorno = $contatoDAO->buscarTodosContatos();
	if(count($retorno) > 0)
		{
			foreach($retorno as $dado)
				{
					echo "<tr>";
					echo "<td>{$dado->nome}</td>";
					echo "<td>{$dado->telefone}</td>";
					echo "<td>{$dado->endereco}</td>";
					echo "<td><a href='views/alterarContato.php?id={$dado->id_contato}'><button style='background-color:#87CEEB'>Alterar</button></a>&nbsp;";
					echo "<a href='views/excluirContato.php?id={$dado->id_contato}'><button style='background-color:#EE3B3B'>Excluir</button></a>&nbsp;</td>";
					echo "</tr>";
				}
		}
			?>
	</table>
	<div class="bot">
	<br><a href="views/inserirContato.php"><h3>Novo Contato</h3></a>
	</div>
</div>
</body>
</html>