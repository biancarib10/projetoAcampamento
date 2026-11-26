<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de alunos</title>
</head>

<body>
    <form action="salvar_inscricao.php" method="post" enctype="multipart/form-data">

        participante: <br>
        <select name="idparticipante">
            <?php
            require_once "conexao.php";

            $sql = "SELECT * FROM participante";

            $comando = mysqli_prepare($conexao, $sql);
            mysqli_stmt_execute($comando);
            $resultado = mysqli_stmt_get_result($comando);

            while ($linha = mysqli_fetch_array($resultado)) {
                $idparticipante = $linha['idparticipante'];
                $nome = $linha['nome'];

                echo "<option value='$idparticipante'>$nome</option>";
            }
            ?>
        </select> <br><br>


        Acampamento: <br>
        <select name="idacampamento">
            <?php
            require_once "conexao.php";

            $sql = "SELECT * FROM acampamento";

            $comando = mysqli_prepare($conexao, $sql);
            mysqli_stmt_execute($comando);
            $resultado = mysqli_stmt_get_result($comando);

            while ($linha = mysqli_fetch_array($resultado)) {
                $idacampamento = $linha['idacampamento'];
                $nome = $linha['nome'];

                echo "<option value='$idacampamento'>$nome</option>";
            }
            ?>
        </select> <br><br>

        Função: <br>
        <select name="idfuncao">
            <?php
            require_once "conexao.php";

            $sql = "SELECT * FROM funcao";

            $comando = mysqli_prepare($conexao, $sql);
            mysqli_stmt_execute($comando);
            $resultado = mysqli_stmt_get_result($comando);

            while ($linha = mysqli_fetch_array($resultado)) {
                $idfuncao = $linha['idfuncao'];
                $tipo = $linha['tipo'];

                echo "<option value='$idfuncao'>$tipo</option>";
            }
            ?>
        </select> <br><br>

        Observação: <br>
        <select name="idobservacao">
            <?php
            require_once "conexao.php";

            $sql = "SELECT * FROM observacao";

            $comando = mysqli_prepare($conexao, $sql);
            mysqli_stmt_execute($comando);
            $resultado = mysqli_stmt_get_result($comando);

            while ($linha = mysqli_fetch_array($resultado)) {
                $idobservacao = $linha['idobservacao'];
                $tipo = $linha['tipo'];

                echo "<option value='$idobservacao'>$tipo</option>";
            }
            ?>
        </select> <br><br>

        <input type="submit" value="Salvar">

    </form>
</body>

</html>