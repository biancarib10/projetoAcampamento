
<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$sql = "SELECT inscricao.*, participante.nome, acampamento.nome AS nome_acampamento, funcao.tipo
        FROM inscricao, participante, acampamento, funcao
        WHERE inscricao.idparticipante = participante.idparticipante
        AND inscricao.idacampamento = acampamento.idacampamento
        AND inscricao.idfuncao = funcao.idfuncao";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Inscrições cadastradas</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <h1>Inscrições cadastradas</h1>

    <div class="lista">

        <a href="form_inscricao.php">Cadastrar inscrição</a>
        <a href="home.php">Início</a>

        <br><br>
        <hr>

        <?php
        while ($inscricao = mysqli_fetch_array($resultado)) {
        ?>

            Participante: <?php echo $inscricao['nome']; ?>
            <br>

            Acampamento: <?php echo $inscricao['nome_acampamento']; ?>
            <br>

            Ano: <?php echo $inscricao['ano']; ?>
            <br>

            Função: <?php echo $inscricao['tipo']; ?>

            <hr>

        <?php
        }
        ?>

    </div>

</body>

</html>
