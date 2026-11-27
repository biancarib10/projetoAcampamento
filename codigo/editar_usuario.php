
<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$idusuario = $_GET['idusuario'];

$sql = "SELECT * FROM usuario WHERE idusuario = ?";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "i", $idusuario);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);

$usuario = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar usuário</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <h1>Editar usuário</h1>

    <form action="salvar_edicao_usuario.php" method="POST">

        <input type="hidden" name="idusuario" value="<?php echo $usuario['idusuario']; ?>">

        Nome:
        <br>
        <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>">

        <br><br>

        E-mail:
        <br>
        <input type="email" name="email" value="<?php echo $usuario['email']; ?>">

        <br><br>

        Nova senha:
        <br>
        <input type="password" name="senha">

        <br><br>

        <input type="submit" value="Salvar alterações">

    </form>

    <a href="listar_usuario.php">Voltar</a>

</body>

</html>
