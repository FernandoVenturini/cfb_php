<?php
// Inclui a conexão com o banco de dados
include_once 'conexao.php';

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

    <?php
    // Receber os dados do formulário
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); 
    
    // Verificar se o usuário clicou no botão cadastrar:
    if (!empty($dados['CadUsuario'])) {
        $empty_input = false; // Variável para verificar se há campos vazios
        $mensagem_erro = ""; // Variável para armazenar mensagens de erro

        $dados = array_map('trim', $dados); // Remove espaços em branco
        
        // Verifica se algum campo está vazio
        if (in_array("", $dados)) {
            $empty_input = true;
            $mensagem_erro = "Erro: Necessário preencher todos os campos!";
        } 
        // Verifica se o e-mail é válido
        else if (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
            $empty_input = true;
            $mensagem_erro = "Erro: E-mail inválido!";
        }

        // Se houver erro, exibe a mensagem
        if ($empty_input) {
            echo "<p style='color:red;'>$mensagem_erro</p>";
        } 
        // Se não houver erro, prossegue com o cadastro
        else {
            var_dump($dados); // Apenas para ver os dados recebidos do formulário

            try {
                // Criar a query de insert
                $query_usuario = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)";
                $cad_usuario = $pdo->prepare($query_usuario); // CORREÇÃO: $conn para $pdo
                
                // Bind dos parâmetros - CORREÇÃO: removi parênteses extras
                $cad_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
                $cad_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
                
                // Executa a query
                $cad_usuario->execute();
                
                // Verificar se o usuário foi cadastrado com sucesso
                if ($cad_usuario->rowCount()) {
                    echo "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
                    // Limpa os dados do formulário após cadastro bem-sucedido
                    $dados = [];
                } else {
                    echo "<p style='color:red;'>Erro: Usuário não cadastrado!</p>";
                }
            } catch (PDOException $e) {
                echo "<p style='color:red;'>Erro no banco de dados: " . $e->getMessage() . "</p>";
            }
        }
    }
    ?>

    <br><br>

    <h1>Cadastrar Usuário</h1>
    <form method="POST" action="" name="CadUsuario" id="CadUsuario">
        <label>Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome completo" value="<?php 
        if (isset($dados['nome'])) {
            echo htmlspecialchars($dados['nome']);
        }
        ?>"><br><br>

        <label for="">E-mail:</label>
        <input type="email" name="email" id="email" placeholder="Digite seu melhor e-mail" value="<?php 
        if (isset($dados['email'])) {
            echo htmlspecialchars($dados['email']);
        }
        ?>"><br><br>

        <input type="submit" value="Cadastrar" name="CadUsuario">
    </form>

</body>

</html>