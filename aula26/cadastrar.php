<?php
//	[ETAPA 0] Inicia a sessão
session_start();

// [ETAPA 0.1] Inicia o buffer de saída
ob_start();

// [ETAPA 1] Inclui o arquivo de conexão com o banco de dados
include_once 'conexao.php';

// [ETAPA 1.1] Verifica se é um redirecionamento após cadastro bem-sucedido
$mostrar_mensagem_sucesso = false;
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    $mostrar_mensagem_sucesso = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke - aula 6 - Como criar formulario cadastrar no PHP</title>
</head>

<body>
    <h1 style="text-align:center;background:purple;padding:3rem;border-radius:10px;font-size:32px;margin:0 auto;">
        Como criar formulario cadastrar no PHP
    </h1>

	<a href="demo1.php">Listar</a>
	<a href="cadastrar.php">Cadastrar</a>
	<h2>Cadastrar</h2>

    <?php
    // [ETAPA 1.2] Exibe mensagem de sucesso APENAS se veio do redirecionamento
    if ($mostrar_mensagem_sucesso) {
        echo "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
    }
    ?>

    <?php
    // [ETAPA 2] Recebe todos os dados do formulário via método POST
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); 
    
    // [ETAPA 3] Verifica se o botão "CadUsuario" foi clicado no formulário
    if (!empty($dados['CadUsuario'])) {
        
        // [ETAPA 4] Variável booleana para controlar se há campos vazios
        $empty_input = false;
        
        // [ETAPA 5] Variável para armazenar mensagens de erro
        $mensagem_erro = "";

        // [ETAPA 6] Remove espaços em branco no início e final de cada valor
        $dados = array_map('trim', $dados);
        
        // [ETAPA 7] Verifica se existe algum valor vazio no array $dados
        if (in_array("", $dados)) {
            // [ETAPA 8] Se encontrou campo vazio, marca como true
            $empty_input = true;
            // [ETAPA 9] Define a mensagem de erro específica
            $mensagem_erro = "Erro: Necessário preencher todos os campos!";
        } 
        // [ETAPA 10] Verifica se o campo email é válido
        else if (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
            // [ETAPA 11] Se email for inválido, marca como true
            $empty_input = true;
            // [ETAPA 12] Define mensagem de erro específica para email
            $mensagem_erro = "Erro: E-mail inválido!";
        }

        // [ETAPA 13] Se houve algum erro de validação
        if ($empty_input) {
            // [ETAPA 14] Exibe a mensagem de erro em vermelho
            echo "<p style='color:red;'>$mensagem_erro</p>";
        } 
        // [ETAPA 15] Se não houve erro de validação
        else {
            // [ETAPA 16] Bloco try-catch para capturar erros no banco de dados
            try {
                // [ETAPA 17] Query SQL para inserir dados na tabela usuarios
                $query_usuario = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)";
                
                // [ETAPA 18] Prepara a query SQL usando a conexão PDO
                $cad_usuario = $pdo->prepare($query_usuario);
                
                // [ETAPA 19] Associa o valor do campo 'nome' ao placeholder :nome
                $cad_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
                
                // [ETAPA 20] Associa o valor do campo 'email' ao placeholder :email
                $cad_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
                
                // [ETAPA 21] Executa a query preparada com os valores vinculados
                $cad_usuario->execute();
                
                // [ETAPA 22] Verifica se o INSERT foi bem-sucedido
                if ($cad_usuario->rowCount()) {
					// [ETAPA 22.1] Limpa os dados do formulário
					unset($dados); 
					// [ETAPA 22.2] Armazena a mensagem de sucesso na sessão
					$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
                    // [ETAPA 23] REDIRECIONA para a mesma página com parâmetro de sucesso
                    header("Location: demo1.php?status=success");
                    exit(); // [ETAPA 24] PARA A EXECUÇÃO IMEDIATAMENTE
                } else {
                    // [ETAPA 25] Se o INSERT não afetou nenhuma linha
                    echo "<p style='color:red;'>Erro: Usuário não cadastrado!</p>";
                }
            } catch (PDOException $e) {
                // [ETAPA 26] Captura exceções do PDO e exibe a mensagem de erro
                echo "<p style='color:red;'>Erro no banco de dados: " . $e->getMessage() . "</p>";
            }
        }
    }
    ?>

    <br><br>

    <h1>Cadastrar Usuário</h1>
    <!-- [ETAPA 27] Formulário HTML com method POST -->
    <form method="POST" action="" name="CadUsuario" id="CadUsuario">
        <label>Nome:</label>
        <!-- [ETAPA 28] Campo de texto para nome com valor pré-preenchido -->
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome completo" value="<?php 

        // [ETAPA 29] Verifica se o campo nome existe no array $dados
        if (isset($dados['nome'])) {
            // [ETAPA 30] Previne ataques XSS e exibe o valor
            echo htmlspecialchars($dados['nome']);
        }
        ?>"><br><br>

        <label for="">E-mail:</label>
        <!-- [ETAPA 31] Campo de email com valor pré-preenchido -->
        <input type="email" name="email" id="email" placeholder="Digite seu melhor e-mail" value="<?php 

        // [ETAPA 32] Verifica se o campo email existe no array $dados
        if (isset($dados['email'])) {
            // [ETAPA 33] Previne ataques XSS e exibe o valor
            echo htmlspecialchars($dados['email']);
        }
        ?>"><br><br>

        <!-- [ETAPA 34] Botão de submit que envia o formulário -->
        <input type="submit" value="Cadastrar" name="CadUsuario">
    </form>

</body>

</html>