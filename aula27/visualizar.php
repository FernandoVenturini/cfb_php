<?php
// 1. INICIALIZAÇÃO DA SESSÃO
session_start();

// Inicia o buffer de saída
ob_start();

// 2. CONEXÃO COM BANCO DE DADOS
include_once 'conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (empty($id)) {
	$_SESSION['msg'] = "<p style='color:#f00;'>Erro: Usuario nao encontrado!</p>";
	header("Location: demo1.php");
	exit();
}
var_dump($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Celke - Visualizar</title>
</head>

<body>
	<a href="demo1.php">Listar</a>
	<a href="cadastrar.php">Cadastrar</a><br>

	<h1>Visualizar</h1>

	<?php
	// Query SQL
	$query_usuario = "SELECT id, nome, email FROM usuarios WHERE id = $id LIMIT 1"; 
	// Preparar
	$result_usuario = $conn->prepare($query_usuario); 
	// Executar
	$result_usuario->execute(); 

	if (($result_usuario) and ($result_usuario->rowCount() != 0)) { // Verificar se encontrou o usuário
		$row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC); // Buscar os dados do usuário
		//var_dump($rowusuario);
		extract($row_usuario); // Extrair os dados para variáveis
		// echo "ID: " . $row_usuario['id'] . "<br>";
		echo "ID: $id <br>";
		echo "Nome: $nome <br>";
		echo "Email: $email <br>";
	} else {
		$SESSION['msg'] = "<p style='color:#f00;'>Erro: Usuario nao encontrado!</p>";
		header("Location: demo1.php");
	}
	?>
</body>

</html>