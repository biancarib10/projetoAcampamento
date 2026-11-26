<?php
require_once "conexao.php";

$idparticipante= $_POST['idparticipante'];
$idacampamento = $_POST['idacampamento'];
$idfuncao = $_POST['idfuncao'];

$sql = "INSERT INTO inscricao (idparticipante, idacampamento, idfuncao) VALUES (?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($comando, "iii", $idparticipante, $idacampamento, $idfuncao);
mysqli_stmt_execute($comando);

$idinscricao = mysqli_insert_id($conexao);

$observacao = $_POST['observacao'];


//gravar o grupo
require_once "conexao.php";

foreach ($observacao as $a) {
    $sql = "INSERT INTO inscricao_observacao (idinscricao, idobservacao) VALUES (?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, "ii", $a, $idobservacao);
    mysqli_stmt_execute($comando);
}
