<?php
require_once "verificar_sessao.php";
require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Inscrições</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <h2>Lista de Inscrições</h2>

    <div class="inscricoes">

        <?php

        $sql = "SELECT inscricao.*, participante.nome, acampamento.nome AS nome_acampamento, acampamento.ano, funcao.tipo
                FROM inscricao, participante, acampamento, funcao
                WHERE inscricao.idparticipante = participante.idparticipante
                AND inscricao.idacampamento = acampamento.idacampamento
                AND inscricao.idfuncao = funcao.idfuncao";

        $comando = mysqli_prepare($conexao, $sql);
        mysqli_stmt_execute($comando);
        $inscricoes = mysqli_stmt_get_result($comando);

        while ($inscricao = mysqli_fetch_array($inscricoes)) {

            $idinscricao = $inscricao['idinscricao'];
            $nome = $inscricao['nome'];
            $nome_acampamento = $inscricao['nome_acampamento'];
            $ano = $inscricao['ano'];
            $tipo = $inscricao['tipo'];

            echo "<div class='inscricao'>";

            echo "ID: $idinscricao";
            echo "<br>";
            echo "Participante: $nome";
            echo "<br>";
            echo "Acampamento: $nome_acampamento";
            echo "<br>";
            echo "Ano: $ano";
            echo "<br>";
            echo "Função: $tipo";
            echo "<br>";

            echo "</div>";
            echo <a href="cad_inscricao.php?idinscricao=<?php echo $inscricao['idinscricao']; ?>">Editar</a>
            echo "<hr>";

        }
        ?>

    </div>

    <br>
    <a href="cad_inscricao.php">Cadastrar inscrição</a>
    <br>
    <a href="home.php">Voltar</a>

</body>

</html>