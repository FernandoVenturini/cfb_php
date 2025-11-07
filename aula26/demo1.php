<?php

session_start();
// Conexão com o banco de dados
include_once 'conexao.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke - aula 7 - Como listar registro do banco de dados e como criar a paginacao com PHP e PDO</title>
</head>

<body>
    <h1 style="text-align:center;background:purple;padding:3rem;border-radius:10px;font-size:32px;margin:0 auto;">
	Celke - aula 7 - Como listar registro do banco de dados e como criar a paginacao com PHP e PDO
    </h1>

	<a href="demo1.php">Listar</a>
	<a href="cadastrar.php">Cadastrar</a>
	<h2>Listar</h2>

    <?php
		// Exibir mensagem de sessão, se existir:
		if(isset($_SESSION['msg'])) { // isset() verifica se a variável está definida e não é nula
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		// Receber o numero da página:
		$pagina_atual = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
		// Definir o número da página, caso não seja informado:
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

		// Definir a quantidade de registros por página:
		$qnt_result_pg = 3;

		// Calcular o início da visualização:
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg; // Ex.: (3 * 1) - 3 = 0, (3 * 2) - 3 = 3, (3 * 3) - 3 = 6 ...

		// Consulta SQL para selecionar os dados:
        $query_usuarios = "SELECT id, nome, email FROM usuarios ORDER BY id DESC LIMIT $inicio, $qnt_result_pg"; 

		// Preparar a consulta:
		$result_usuarios = $pdo->prepare($query_usuarios);

		// Executar a consulta:
		$result_usuarios->execute();

		// Verificar se encontrou algum registro:
		if (($result_usuarios) and ($result_usuarios->rowCount() != 0)) { // rowCount() retorna o número de linhas afetadas pela última instrução SQL
			// Loop para listar os dados:
			while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) { // fetch() obtém a próxima linha de um conjunto de resultados
				// Extrair os dados da linha:
				extract($row_usuario);
				// Exibir os dados:
				echo "ID: $id <br>";
				echo "Nome: $nome <br>";
				echo "Email: $email <br>";
				echo "<hr>";
			}

			// Paginação - Contar o total de registros no banco de dados:
			$query_qnt_registros = "SELECT COUNT(id) AS num_result FROM usuarios"; // 
			$result_qnt_registros = $pdo->prepare($query_qnt_registros);
			$result_qnt_registros->execute(); // Executar a consulta
			$row_qtn_registros = $result_qnt_registros->fetch(PDO::FETCH_ASSOC);

			// Quantidade de pagina
			$qnt_pagina = ceil($row_qtn_registros['num_result'] / $qnt_result_pg);

			// Links de navegação:
			$maximo_link = 2;
			echo "<a href='demo1.php?page=1'>Primeira</a> ";
			for ($pagina_anterior = $pagina - $maximo_link; $pagina_anterior <= $pagina - 1; $pagina_anterior++) {
				if ($pagina_anterior >= 1) {
					echo "<a href='demo1.php?page=$pagina_anterior'>$pagina_anterior</a> ";
				}
			}
			
			echo "<a href='#'>$pagina</a> ";
			for ($proxima_pagina = $pagina + 1; $proxima_pagina <= $pagina + $maximo_link; $proxima_pagina++) {
				if ($proxima_pagina <= $qnt_pagina) {
					echo "<a href='demo1.php?page=$proxima_pagina'>$proxima_pagina</a> ";
				}
			}

			echo "<a href='demo1.php?page=$qnt_pagina'>Ultima</a> ";

		} else {
			echo "<p style='color:red;'>Erro: Nenhum usuário encontrado!</p>";
		}
    ?>

</body>

</html>