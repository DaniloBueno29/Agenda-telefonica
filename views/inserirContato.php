<?php
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
            require_once "../models/conexao.class.php";
            require_once "../models/contato.class.php";
            require_once "../models/contatoDAO.class.php";
            $contato = new contato(null, $_POST["nome"], $_POST["telefone"], $_POST["endereco"]);
            $contatoDAO = new contatoDAO();
            $contatoDAO->inserirContato($contato);
            header("Location:../index.php");
        }
    }
?>
<head>
    <title>Inserir Contato</title>
     <link rel="stylesheet" href="../lib/style.css"/>
	</head>
<body>
    <div class="table">
    <form action="#" method="POST">
	<h2>Inserir Contato</h2>
			
    <input type="text" name="nome" placeholder="Nome" required=""> <br> <br>

    <input type="text" name="telefone" placeholder="Telefone" required> <br> <br>

    <input type="text" name="endereco" placeholder="Endereço" required> <br> <br>      
    <input type="submit" value="CADASTRAR">
    </form> 
    </div>
 </body>
