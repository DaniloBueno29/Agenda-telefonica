<?php
	if($_GET)
	{
		require_once "../models/conexao.class.php";
		require_once "../models/contato.class.php";
		require_once "../models/contatoDAO.class.php";
		//excluir cliente
		$contato = new contato($_GET["id"], null, null, null);
		$contatoDAO = new contatoDAO();
		$contatoDAO->excluirContato($contato);
		header("Location:../index.php");
	}
?>