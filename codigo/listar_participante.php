<?php
require_once "verificar_sessao.php";
require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Participantes</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <h2>Lista de Participantes</h2>

    <div class="participantes">

        <?php
        require_once "conexao.php";

        $sql = "SELECT * FROM participante";

        $comando = mysqli_prepare($conexao, $sql);
        mysqli_stmt_execute($comando);
        $participantes = mysqli_stmt_get_result($comando);

        while ($participante = mysqli_fetch_array($participantes)) {

            $idparticipante = $participante['idparticipante'];
            $nome = $participante['nome'];
            $data_nascimento = $participante['data_nascimento'];
            $telefone = $participante['telefone'];
            $foto = $participante['foto'];

            echo "<div class='participante'>";

            echo "<img src='foto_participante/$foto' width='100'>";
            echo "<br>";
            echo "ID: $idparticipante";
            echo "<br>";
            echo "Nome: $nome";
            echo "<br>";
            echo "Data de nascimento: $data_nascimento";
            echo "<br>";
            echo "Telefone: $telefone";

            echo "</div>";
            echo <a href="editar_participante.php?idparticipante=<?php echo $participante['idparticipante']; ?>">Editar</a>
        }
        ?>

    </div>

    <br>
    <a href="index.php">Voltar</a>

</body>

</html>
