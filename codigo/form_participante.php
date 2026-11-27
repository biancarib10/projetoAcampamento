<?php
require_once "verificar_sessao.php";
require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Participante</title>
    <link rel="stylesheet" href="css.css">
</head>

<body>

    <form action="salvar_participante.php" method="post" enctype="multipart/form-data">

        Nome: <br>
        <input type="text" name="nome"> <br><br>

        Data de nascimento: <br>
        <input type="date" name="data_nascimento"> <br><br>

        Telefone: <br>
        <input type="text" name="telefone"> <br><br>

        Foto: <br>
        <input type="file" name="foto"> <br><br>

        <input type="submit" value="Salvar">

    </form>

</body>
</html>
