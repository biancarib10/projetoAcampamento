
<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$idinscricao = $_GET['idinscricao'];

$sql = "SELECT * FROM inscricao WHERE idinscricao = ?";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "i", $idinscricao);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);

$inscricao = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar inscrição</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <h1>Editar inscrição</h1>

    <form action="salvar_edicao_inscricao.php" method="POST">

        <input type="hidden" name="idinscricao" value="<?php echo $inscricao['idinscricao']; ?>">

        Participante:
        <br>

        <select name="idparticipante">

            <?php
            $sql = "SELECT * FROM participante";

            $comando = mysqli_prepare($conexao, $sql);

            mysqli_stmt_execute($comando);

            $participantes = mysqli_stmt_get_result($comando);

            while ($participante = mysqli_fetch_array($participantes)) {

                $selecionado = "";

                if ($participante['idparticipante'] == $inscricao['idparticipante']) {
                    $selecionado = "selected";
                }

                echo "<option value='" . $participante['idparticipante'] . "' $selecionado>";
                echo $participante['nome'];
                echo "</option>";
            }
            ?>

        </select>

        <br><br>

        Acampamento:
        <br>

        <select name="idacampamento">

            <?php
            $sql = "SELECT * FROM acampamento";

            $comando = mysqli_prepare($conexao, $sql);

            mysqli_stmt_execute($comando);

            $acampamentos = mysqli_stmt_get_result($comando);

            while ($acampamento = mysqli_fetch_array($acampamentos)) {

                $selecionado = "";

                if ($acampamento['idacampamento'] == $inscricao['idacampamento']) {
                    $selecionado = "selected";
                }

                echo "<option value='" . $acampamento['idacampamento'] . "' $selecionado>";
                echo $acampamento['nome'];
                echo "</option>";
            }
            ?>

        </select>

        <br><br>

        Função:
        <br>

        <select name="idfuncao">

            <?php
            $sql = "SELECT * FROM funcao";

            $comando = mysqli_prepare($conexao, $sql);

            mysqli_stmt_execute($comando);

            $funcoes = mysqli_stmt_get_result($comando);

            while ($funcao = mysqli_fetch_array($funcoes)) {

                $selecionado = "";

                if ($funcao['idfuncao'] == $inscricao['idfuncao']) {
                    $selecionado = "selected";
                }

                echo "<option value='" . $funcao['idfuncao'] . "' $selecionado>";
                echo $funcao['tipo'];
                echo "</option>";
            }
            ?>

        </select>

        <br><br>

        Observação:
        <br>

        <?php
        $sql = "SELECT * FROM observacao WHERE inscricao_idinscricao = ?";

        $comando = mysqli_prepare($conexao, $sql);

        mysqli_stmt_bind_param($comando, "i", $idinscricao);

        mysqli_stmt_execute($comando);

        $resultado_observacao = mysqli_stmt_get_result($comando);

        $observacoes = array();

        while ($observacao = mysqli_fetch_array($resultado_observacao)) {
            $observacoes[] = $observacao['tipo'];
        }

        $opcoes = array(
            "Alergia a glutem",
            "intolerante a lactose",
            "remedio de uso continuo",
            "seletividade alimentar",
            "Nenhuma"
        );

        foreach ($opcoes as $opcao) {

            $marcado = "";

            if (in_array($opcao, $observacoes)) {
                $marcado = "checked";
            }

            echo "<input type='checkbox' name='observacao[]' value='$opcao' $marcado>";
            echo $opcao . "<br><br>";
        }
        ?>

        <input type="submit" value="Salvar alterações">

    </form>

    <a href="home.php">Início</a>

</body>

</html>
