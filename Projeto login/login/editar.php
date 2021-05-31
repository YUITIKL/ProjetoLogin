<?php
session_start();
	include 'conexao.php';

//codigo de controle de sessão
	
	if (empty($_SESSION["login"])) {
		echo "<script>alert('Faça o login primeiramente!')</script>";
		header("Location:login.php");
	}


	if (isset($_POST["senha_atual"])&&
		isset($_POST["senha_nova"])&&
		isset($_POST["confirma_senha"]))
	{
		$senhaAtual=$_POST["senha_atual"];
		$senhaNova=$_POST["senha_nova"];
		$senhaConfirmada=$_POST["confirma_senha"];
	

	$login = $_SESSION["login"];
	$sql = "SELECT * FROM usuarios WHERE login = '$login'";
	$resultado = mysqli_query($conexao,$sql);
	$vetor = mysqli_fetch_array($resultado);
		$senha_bd = $vetor["senha"];

	if ($senhaConfirmada != $senhaNova) {
		echo "<script>alert('Senhas estão diferentes')</script>";
	}else if ($senha_bd != md5($senhaAtual)) {
		echo "<script>alert('Senha está diferente da cadastrada')</script>";
	}else if ($senha_bd == md5($senhaNova)) {
		echo "<script>alert('Senha nova igual a aniga modifique')</script>";
	}else{
		$senhaNova = md5($senhaNova);
		$sql="UPDATE usuarios SET senha='$senhaNova' WHERE login = '$login'";

	if (mysqli_query($conexao,$sql)) {
		echo "<script>alert('Senha alterada com sucesso')</script>";
		header("Location:index.php");
	}else {
		echo "<script>alert('Erro na alteração da senha')</script>";
	}
	}//fim do else
}//sim do Post
?>





<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>TROCAR A SENHA DO USUÁRIO</title>
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

    <div class="container">
      <div class="py-5 text-center">
        <h2>Troque sua senha</h2>
		<p>Lembrou a senha?<a href="login.php"> Faça login</a></p>
      </div>
	  
	    
      
        <div class="col-md-12 text-center">
          <form class="needs-validation" novalidate method="post" action="">
            
              <div class="col-md-12 mb-3 text-left">
                <label for="nome">Senha antiga</label>
                <input type="password" class="form-control w-50" name="senha_atual" id="senhaAntiga" placeholder="" required>
              </div>          

            <div class="col-md-3 mb-3 text-left">
              <label for="login">Nova senha</label>
                <input type="password" class="form-control" name="senha_nova" id="senhaNova" placeholder="" required>
            </div>
			
			<div class="col-md-3 mb-3 text-left">
              <label for="senha">Confirmar nova senha</label>
                <input type="password" class="form-control" name="confirma_senha" id="senhaConfirmada" placeholder="" required>
            </div>
	  	  </div>
		
          
        <hr class="mb-4">
		<div id="row">
		<div class="col-md-12">
            <button class="col-md-6 btn btn-primary btn-lg btn-block m-auto" type="submit">Cadastrar nova senha</button>
          </form>		  
        </div>	
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