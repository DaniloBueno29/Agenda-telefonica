<?php 
	class contatoDAO extends conexao
	{
		function __construct()
		{
			parent:: __construct();
		}
		function inserirContato($contato)
		{
				$sql = "INSERT INTO contatos (nome, telefone, endereco) VALUES(?,?,?)";
				try
				{
					$stm = $this->db->prepare($sql);
					$stm->bindValue(1,$contato->getNome());
					$stm->bindValue(2,$contato->getTelefone());
					$stm->bindValue(3,$contato->getEndereco());
					$ret = $stm->execute();
					$this->db = null;
				}
				catch (PDOException $e)
				{
					die($e->getMessage());
				}
		}//inserirContato
		function buscarTodosContatos()
		{
			$sql = "SELECT * FROM contatos";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->execute();
				$resultado = $stm->fetchAll(PDO::FETCH_OBJ);
				$this->db = null;
				return $resultado;
			}
			catch (PDOException $e)
			{
				die($e->getMessage());
			}
		}//buscarTodosContatos
		function excluirContato($contato)
		{
			$sql = "DELETE FROM contatos WHERE id_contato = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $contato->getId());
				$stm->execute();
				$this->db = null;
			}
			catch (PDOException $e)
			{
				die($e->getMessage());
			}
		}//excluirContato
		function buscarUmContato($contato)
		{
			$sql = "SELECT id_contato, nome, telefone, endereco FROM contatos WHERE id_contato = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1,$contato->getId());
				$stm->execute();
				$resultado = $stm->fetchAll(PDO::FETCH_OBJ);
				$this->db = null;
				return $resultado;
			}
			catch (PDOException $e)
			{
				die($e->getMessage());
			}	
		}//buscarUmContato
		function alterarContato($contato)
			{
			$sql = "UPDATE contatos SET nome = ?, telefone = ?, endereco = ? WHERE id_contato = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1,$contato->getNome());
				$stm->bindValue(2,$contato->getTelefone());
				$stm->bindValue(3,$contato->getEndereco());
				$stm->bindValue(4,$contato->getId());
				$stm->execute();
				$this->db = null;		
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}//alterarContato
	}//class
?>