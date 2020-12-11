<?php 
	abstract class conexao
	{
		protected $db;
		
		function __construct()
		{
			$par = "mysql:host=localhost;dbname=agenda;charset=utf8mb4";
			try
			{
				$this->db = new PDO($par, "root", "");
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch (PDOException $e)
			{
				die("Erro ao abrir conexão");
			}
		}//constructor
	}//class
?>