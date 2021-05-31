<?php
	//codigo de controle de sessão
	session_start();
	if (empty($_SESSION["login"])) {
		echo "<script>alert('Faça o login primeiramente!')</script>";
		header("Location:login.php");
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Seja Bem-vindo</title>
		<!-- Meta tags Obrigatórias -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Arquivo CSS Bootstrap -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<!-- Arquivo CSS do projeto -->
		<link rel="stylesheet" href="css/estilo.css" />
		<!-- CSS interno -->
		<style>
		.container {
			max-width: 960px;
		}
		body {
			background-color: #f5f5f5;
		}
		

		</style>
  </head>

  <body>

    <div class="container-fluid">
	
	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">Sistema - Seja Bem - Vindo:<?php echo $_SESSION["login"];?></h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Meu cadastro</a>
      </nav>
      <a class="btn btn-outline-primary" href="logout.php">SAIR</a>
    </div>
	
	
	
	
	
	
	
	
	
      	  

	      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; Etec Dr. Demétrio Azevedo Jr. - Técnico em Desenvolvimento de Sistemas</p>
      </footer>
  	</div><!-- fim class container -->	
	<!-- documentos javascript -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
  </body>
</html>