<?php
session_start();
if (!isset($_SESSION['idparticipante'])) {
    header("Location: index.php");
}
?>