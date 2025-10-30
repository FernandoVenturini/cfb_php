<?php
// Iniciando a sessao:
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aula 19 - CFB Cursos - Sessions</title>
</head>

<body>
	<h1>Aula 19 - CFB Cursos - Sessions</h1>

	<h2>O que é uma sessão PHP?</h2>
	<p>
		Quando você trabalha com um aplicativo, você o abre, faz algumas alterações e depois o fecha. Isso é muito parecido com uma sessão. O computador sabe quem você é. Ele sabe quando você inicia o aplicativo e quando o encerra. Mas na internet existe um problema: o servidor web não sabe quem você é nem o que você faz, porque o endereço HTTP não mantém estado.

		As variáveis ​​de sessão resolvem esse problema armazenando informações do usuário para serem usadas em várias páginas (por exemplo, nome de usuário, cor favorita etc.). Por padrão, as variáveis ​​de sessão permanecem ativas até que o usuário feche o navegador.

		Assim, as variáveis ​​de sessão armazenam informações sobre um único usuário e estão disponíveis para todas as páginas de um aplicativo.</p>

	<?php
		// Set session variables
		$_SESSION["favcolor"] = "green";
		$_SESSION["favanimal"] = "cat";

		// Echo session variables that were set on previous page
		if (isset($_SESSION["favcolor"]) && isset($_SESSION["favanimal"])) {
			echo "Sua cor favorira e " . $_SESSION["favcolor"] . ".<br>";
		} else {
			echo "As variaveis de sessao nao estao definidas.<br>";
		}

		echo "As variáveis ​​de sessão estão definidas.<br>";
	?>

</body>

</html>