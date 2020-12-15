<?php
	require_once "../models/conexao.class.php";
	require_once "../models/contato.class.php";
	require_once "../models/contatoDAO.class.php";
	
	if($_GET)
	{
		$contato = new contato($_GET["id"], null, null, null, null);
		$contatoDAO = new contatoDAO();
		$retorno = $contatoDAO->buscarUmContato($contato);
	}
	if($_POST)
   	{
        if($_POST["nome"] == "")
        {
            echo "<script>alert('Preencha o nome')</script>";
        }
        if($_POST["telefone"] == "")
        {
            echo "<script>alert('Preencha o telefone')</script>";
        }
        if($_POST["endereco"] == "")
        {
            echo "<script>alert('Preencha o endereço')</script>";
        }
     
		else
        {
            $contato = new contato($_POST["id"] , $_POST["nome"], $_POST["telefone"], $_POST["endereco"]);
            $contatoDAO = new contatoDAO();
            $contatoDAO->alterarContato($contato);
            header("Location:../index.php");
        }
	}
?>

<html>
	<head>
		<title>Alterar Contato</title>
		<link rel="stylesheet" href="../lib/style.css">
	</head>
	<body>
		<div class="table">
		<h2>Alterar Contato</h2>
		<form action="#" method="POST">
			<input type="hidden" name="id" value="<?php echo $retorno[0]->id_contato; ?>">
			<p>
				<label>Nome:</label>
				<input type="text" name="nome" value="<?php echo $retorno[0]->nome; ?>" required>
			</p>
			<p>
				<label>Telefone:</label>
				<input type="text" name="telefone" value="<?php echo $retorno[0]->telefone; ?>" required>
			</p>
			<p>
				<label>Endereço:</label>
				<input type="text" name="endereco" value="<?php echo $retorno[0]->endereco; ?>" required>
			</p>
		
			<br><input type="submit" value="Alterar">
		</form>
	</div>
	</body>
</html>
