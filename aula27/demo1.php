<?php
// 1. INICIALIZAÇÃO DA SESSÃO
session_start();
// 2. CONEXÃO COM BANCO DE DADOS
include_once 'conexao.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- 3. CONFIGURAÇÕES BÁSICAS DO HTML -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke - aula 8 - Visualizando os detalhes do registro com PHP salvo no banco  de dados</title>
</head>

<body>
    <!-- 4. CABEÇALHO DA PÁGINA -->
    <h1 style="text-align:center;background:purple;padding:3rem;border-radius:10px;font-size:32px;margin:0 auto;">
	Celke - aula 8 - Visualizando os detalhes do registro com PHP salvo no banco  de dados
    </h1>

	<!-- 5. MENU DE NAVEGAÇÃO -->
	<a href="demo1.php">Listar</a>
	<a href="cadastrar.php">Cadastrar</a>
	<h2>Listar</h2>

    <?php
		// 6. EXIBIR MENSAGENS DE SESSÃO (SE EXISTIREM)
		if(isset($_SESSION['msg'])) { // Verifica se existe mensagem na sessão
			echo $_SESSION['msg'];    // Exibe a mensagem
			unset($_SESSION['msg']);  // Remove a mensagem da sessão após exibir
		}
		
		// 7. CONFIGURAÇÃO DA PAGINAÇÃO
		
		// 7.1 - Receber o número da página via GET e sanitizar
		$pagina_atual = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
		
		// 7.2 - Definir página atual (se não informada, usa página 1)
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

		// 7.3 - Definir quantos registros mostrar por página
		$qnt_result_pg = 3;

		// 7.4 - Calcular onde começar a buscar no banco
		// Fórmula: (quantidade_por_pagina * pagina_atual) - quantidade_por_pagina
		// Exemplo: (3 * 1) - 3 = 0, (3 * 2) - 3 = 3, (3 * 3) - 3 = 6
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

		// 8. CONSULTA DOS DADOS NO BANCO
		
		// 8.1 - Criar a query SQL com LIMIT para paginação
        $query_usuarios = "SELECT id, nome, email FROM usuarios ORDER BY id DESC LIMIT $inicio, $qnt_result_pg"; 

		// 8.2 - Preparar a consulta (evita SQL injection)
		$result_usuarios = $pdo->prepare($query_usuarios);

		// 8.3 - Executar a consulta no banco
		$result_usuarios->execute();

		// 9. VERIFICAR SE ENCONTROU REGISTROS
		if (($result_usuarios) and ($result_usuarios->rowCount() != 0)) {
			// 10. LOOP PARA EXIBIR CADA REGISTRO
			while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
				// 10.1 - Extrair variáveis do array (cria $id, $nome, $email)
				extract($row_usuario);
				
				// 10.2 - Exibir os dados na tela
				echo "ID: $id <br>";
				echo "Nome: $nome <br>";
				echo "Email: $email <br>";
				echo "<a href='visualizar.php?id=$id'</a>Visualizar</a><br>";
				echo "<hr>";
			}

			// 11. CÁLCULO DA PAGINAÇÃO
			
			// 11.1 - Contar total de registros no banco
			$query_qnt_registros = "SELECT COUNT(id) AS num_result FROM usuarios";
			
			// 11.2 - Preparar e executar consulta de contagem
			$result_qnt_registros = $pdo->prepare($query_qnt_registros);
			$result_qnt_registros->execute();
			
			// 11.3 - Buscar resultado da contagem
			$row_qtn_registros = $result_qnt_registros->fetch(PDO::FETCH_ASSOC);

			// 11.4 - Calcular total de páginas
			// ceil() arredonda para cima: total_registros / registros_por_pagina
			$qnt_pagina = ceil($row_qtn_registros['num_result'] / $qnt_result_pg);

			// 12. LINKS DE NAVEGAÇÃO (PAGINAÇÃO)
			
			// 12.1 - Definir quantos links mostrar antes/depois da página atual
			$maximo_link = 2;
			
			// 12.2 - Link para primeira página
			echo "<a href='demo1.php?page=1'>Primeira</a> ";
			
			// 12.3 - Links das páginas ANTERIORES à atual
			for ($pagina_anterior = $pagina - $maximo_link; $pagina_anterior <= $pagina - 1; $pagina_anterior++) {
				if ($pagina_anterior >= 1) { // Só mostra páginas válidas (≥ 1)
					echo "<a href='demo1.php?page=$pagina_anterior'>$pagina_anterior</a> ";
				}
			}
			
			// 12.4 - Link da página ATUAL (sem link clicável)
			echo "<a href='#'>$pagina</a> ";
			
			// 12.5 - Links das páginas POSTERIORES à atual
			for ($proxima_pagina = $pagina + 1; $proxima_pagina <= $pagina + $maximo_link; $proxima_pagina++) {
				if ($proxima_pagina <= $qnt_pagina) { // Só mostra páginas válidas (≤ total)
					echo "<a href='demo1.php?page=$proxima_pagina'>$proxima_pagina</a> ";
				}
			}

			// 12.6 - Link para última página
			echo "<a href='demo1.php?page=$qnt_pagina'>Ultima</a> ";

		} else {
			// 13. MENSAGEM DE ERRO SE NÃO ENCONTRAR REGISTROS
			echo "<p style='color:red;'>Erro: Nenhum usuário encontrado!</p>";
		}
    ?>

</body>
</html>