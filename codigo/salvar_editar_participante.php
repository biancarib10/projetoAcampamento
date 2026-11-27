
<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$idparticipante = $_POST['idparticipante'];
$nome = $_POST['nome'];
$data_nascimento = $_POST['data_nascimento'];
$telefone = $_POST['telefone'];

$nome_arquivo = $_FILES['foto']['name'];

if ($nome_arquivo != "") {

    $caminho_temporario = $_FILES['foto']['tmp_name'];

    $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

    $novo_nome = uniqid() . "." . $extensao;

    $caminho_destino = "foto_participante/" . $novo_nome;

    move_uploaded_file($caminho_temporario, $caminho_destino);

    $sql = "UPDATE participante
            SET nome = ?, data_nascimento = ?, telefone = ?, foto = ?
            WHERE idparticipante = ?";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, "ssssi", $nome, $data_nascimento, $telefone, $novo_nome, $idparticipante);

} else {

    $sql = "UPDATE participante
            SET nome = ?, data_nascimento = ?, telefone = ?
            WHERE idparticipante = ?";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, "sssi", $nome, $data_nascimento, $telefone, $idparticipante);

}

mysqli_stmt_execute($comando);

header("Location: listar_participante.php");
?>
