<?php
	session_start();
	if (isset($_SESSION["login"])) {
		session_destroy();
	}
	//redirecionamento da pagina
	header("Location:login.php");
?>