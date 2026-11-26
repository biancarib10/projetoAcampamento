<?php
require_once "conexao.php";

$idparticipante= $_POST['idparticipante'];
$idacampamento = $_POST['idacampamento'];
$idfuncao = $_POST['idfuncao'];
$idobservacao = $_POST['idobservacao'];

$sql = "INSERT INTO inscricao (idparticipante, idacampamento, idfuncao, idobservacao) VALUES (?, ?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($comando, "iiii", $idparticipante, $idacampamento, $idfuncao, $idobservacao);
mysqli_stmt_execute($comando);

header("Location: cad_inscricao.php");