<?php
	class contato
	{
		private $id;
		private $nome;
		private $telefone;
		private $endereco;

		function __construct ($id, $nome, $telefone, $endereco)
		{
			$this->id = $id;
			$this->nome = $nome;
			$this->telefone = $telefone;
			$this->endereco = $endereco;
		}
		//SET
		function getId()
		{
			return $this->id;
		}
		function getNome()
		{
			return $this->nome;
		}
		function getTelefone()
		{
			return $this->telefone;
		}
		function getEndereco()
		{
			return $this->endereco;
		}
	}//class
?>