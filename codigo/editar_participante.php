
<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$idparticipante = $_GET['idparticipante'];

$sql = "SELECT * FROM participante WHERE idparticipante = ?";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "i", $idparticipante);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);

$participante = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar participante</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <h1>Editar participante</h1>

    <form action="salvar_edicao_participante.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="idparticipante" value="<?php echo $participante['idparticipante']; ?>">

        Nome:
        <br>
        <input type="text" name="nome" value="<?php echo $participante['nome']; ?>">

        <br><br>

        Data de nascimento:
        <br>
        <input type="date" name="data_nascimento" value="<?php echo $participante['data_nascimento']; ?>">

        <br><br>

        Telefone:
        <br>
        <input type="text" name="telefone" value="<?php echo $participante['telefone']; ?>">

        <br><br>

        Foto atual:
        <br>
        <img src="foto_participante/<?php echo $participante['foto']; ?>" width="100">

        <br><br>

        Nova foto:
        <br>
        <input type="file" name="foto">

        <br><br>

        <input type="submit" value="Salvar alterações">

    </form>

    <a href="index.php">Início</a>

</body>

</html>
