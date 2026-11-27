
<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$sql = "SELECT * FROM usuario";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Usuários cadastrados</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <h1>Usuários cadastrados</h1>

    <div class="lista">

        <a href="form_usuario.php">Cadastrar usuário</a>
        <a href="home.php">Início</a>

        <br><br>
        <hr>

        <?php
        while ($usuario = mysqli_fetch_array($resultado)) {
        ?>

            Nome: <?php echo $usuario['nome']; ?>
            <br>

            E-mail: <?php echo $usuario['email']; ?>
            <br>

            <a href="editar_usuario.php?idusuario=<?php echo $usuario['idusuario']; ?>">
                Editar
            </a>

            <hr>

        <?php
        }
        ?>

    </div>

</body>

</html>
