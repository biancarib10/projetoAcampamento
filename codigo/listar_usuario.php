<?php
require_once "verificar_sessao.php";
require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <h2>Lista de Usuários</h2>

    <div class="usuarios">

        <?php

        $sql = "SELECT * FROM usuario";

        $comando = mysqli_prepare($conexao, $sql);
        mysqli_stmt_execute($comando);
        $usuarios = mysqli_stmt_get_result($comando);

        while ($usuario = mysqli_fetch_array($usuarios)) {

            $idusuario = $usuario['idusuario'];
            $nome = $usuario['nome'];
            $email = $usuario['email'];

            echo "<div class='usuario'>";

            echo "ID: $idusuario";
            echo "<br>";
            echo "Nome: $nome";
            echo "<br>";
            echo "E-mail: $email";
            echo "<br>";

            echo "</div>";
            echo <a href="editar_usuario.php?idusuario=<?php echo $usuario['idusuario']; ?>">Editar</a>
            echo "<hr>";

        }
        ?>

    </div>

    <br>
    <a href="form_usuario.php">Cadastrar usuário</a>
    <br>
    <a href="home.php">Voltar</a>

</body>

</html>