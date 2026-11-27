
<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$idinscricao = $_POST['idinscricao'];
$idparticipante = $_POST['idparticipante'];
$idacampamento = $_POST['idacampamento'];
$idfuncao = $_POST['idfuncao'];

$observacao = $_POST['observacao'] ?? array();

$sql = "UPDATE inscricao
        SET idparticipante = ?, idacampamento = ?, idfuncao = ?
        WHERE idinscricao = ?";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "iiii", $idparticipante, $idacampamento, $idfuncao, $idinscricao);

mysqli_stmt_execute($comando);


// Apagar observações antigas

$sql = "DELETE FROM observacao
        WHERE inscricao_idinscricao = ?";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "i", $idinscricao);

mysqli_stmt_execute($comando);


// Gravar novas observações

if (in_array("Nenhuma", $observacao)) {
    $observacao = array("Nenhuma");
}

foreach ($observacao as $tipo) {

    $sql = "INSERT INTO observacao (tipo, inscricao_idinscricao)
            VALUES (?, ?)";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, "si", $tipo, $idinscricao);

    mysqli_stmt_execute($comando);

}

header("Location: listar_inscricao.php");
?>
