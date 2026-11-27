
<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$idusuario = $_POST['idusuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if ($senha != "") {

    $senha = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "UPDATE usuario
            SET nome = ?, email = ?, senha = ?
            WHERE idusuario = ?";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, "sssi", $nome, $email, $senha, $idusuario);

} else {

    $sql = "UPDATE usuario
            SET nome = ?, email = ?
            WHERE idusuario = ?";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, "ssi", $nome, $email, $idusuario);

}

mysqli_stmt_execute($comando);

header("Location: listar_usuario.php");
?>
