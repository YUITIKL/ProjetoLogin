<?php
	session_start();
	include 'conexao.php';

	if ($_POST) {
		$login=$_POST["login"];
		$senha=md5($_POST["senha"]);

		$sql="SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
		$resultado = mysqli_query($conexao,$sql);

		if (mysqli_num_rows($resultado)==1) {
			$_SESSION["login"] = $login;
			header("Location:index.php");
		}else{
			echo "<script>alert('Login e/ou Senha incorretos!')</script>";
		}
	}//fim do $_POST
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>LOGIN DO USUÁRIO</title>
		<!-- Meta tags Obrigatórias -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Arquivo CSS Bootstrap -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<!-- Arquivo CSS do projeto -->
		<link rel="stylesheet" href="css/estilo.css" />
		<!-- CSS interno -->
		<style>
			body {
			  display: -ms-flexbox;
			  display: flex;
			  -ms-flex-align: center;
			  align-items: center;
			  padding-top: 40px;
			  padding-bottom: 40px;
			  background-color: #f5f5f5;
			}
		</style>	
	</head>
	<body>
	<div class="container">
	
		<form class="form-signin" action="" method="post">
      	  <h1 class="h3 font-weight-normal mb-5">Login do Usuário</h1>
		  <input type="text" name="login" id="inputLogin" class="form-control mb-2" placeholder="Seu login" required autofocus>
		  <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
		  
		  <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>
		  <div class="semcadastro">
			<p>Não tem acesso?<a href="cadastro.php"> Faça seu cadastro!</a></p>
		  </div>

		  <div class="trocarsenha">
			<p>Esqueceu a senha?<a href="editar.php"> Troque sua senha!</a></p>
		  </div>
		</form>
		
		
		
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
